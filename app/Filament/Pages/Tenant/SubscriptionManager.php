<?php

namespace App\Filament\Pages\Tenant;

use App\Models\Plan;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Support\Exceptions\Halt;
use Illuminate\Http\Request;

class SubscriptionManager extends Page implements HasForms
{
    use InteractsWithForms;
    protected static string $view = 'filament.pages.tenant.subscription-manager';
    protected static ?string $navigationIcon = 'heroicon-o-credit-card';
    protected static ?string $navigationGroup = 'Assinatura';
    protected static ?string $slug = 'subscription-manager';
    protected static ?int $navigationSort = 10;
    public ?array $data = [];
    public ?string $plan_id = null;

    public function mount(): void
    {
        $this->form->fill();

        $tenant = filament()->getTenant();

        $this->data['tenant'] = $tenant;
        $this->data['subscriptionStatus'] = $tenant->subscribed('default');
        $this->data['planDetails'] = $tenant->subscription('default')?->asStripeSubscription();
    }


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Plano')
                    ->schema([
                        Forms\Components\Select::make('plan_id')
                            ->label('Name')
                            ->options(options: Plan::all()->pluck('name', 'id'))
                            ->required(),
                    ]),
            ]);
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function submit()
    {
        try {
            $data = $this->form->getState();

            $plan = Plan::find($data['plan_id']);

            return Filament::getTenant()
                ->newSubscription($plan->stripe_type, $plan->stripe_price)
                ->trialDays(15)
                ->allowPromotionCodes()
                ->checkout([
                    'success_url' => route('filament.admin.pages.subscription-success', ['tenant' => Filament::getTenant()]),
                    'cancel_url' => route('filament.admin.pages.subscription-cancel', ['tenant' => Filament::getTenant()]),
                ]);
        } catch (Halt $exception) {
            return;
        }
    }

    public function getTitle(): string
    {
        return 'Subscription Management';
    }
}
