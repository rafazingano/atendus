<?php

namespace App\Models;

use Filament\Facades\Filament;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class Organization extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'organizations';

    /**
     * Os atributos que são atribuíveis em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'account_id',
        'user_id',
        'slug',
        'logo',
        'banner',
        'website',
        'name',
        'cnpj_cpf',
        'address',
        'city',
        'state',
        'zip_code',
        'phone',
        'whatsapp',
        'email',
        'business_type',
        'vehicle_types',
        'preferred_brands',
        'price_range',
        'working_hours',
        'payment_methods',
        'current_offers',
        'warranty_policy',
        'additional_services',
        'target_audience',
        'faq',
        'sales_process',
        'success_stories',
    ];

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->uuid = (string) $model->uuid ?? Uuid::uuid4();
            $model->slug = $model->slug ?? Str::slug($model->name);
            $model->user_id = $model->user_id ?? auth()->id();
            $model->account_id = $model->account_id ?? Filament::getTenant()->id;
        });
    }

    /**
     * Relacionamento com a conta (Account).
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    /**
     * Relacionamento com o usuário (User) que criou a organização.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
