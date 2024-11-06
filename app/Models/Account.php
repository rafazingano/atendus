<?php

namespace App\Models;

use Filament\Facades\Filament;
use Filament\Models\Contracts\HasAvatar;
use Filament\Models\Contracts\HasCurrentTenantLabel;
use Filament\Models\Contracts\HasName;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Uuid\Uuid;

class Account extends Model implements HasCurrentTenantLabel, HasAvatar, HasName
{
    use HasApiTokens, HasFactory, SoftDeletes, Billable;

    protected $fillable = [
        'uuid',
        'plan_id',
        'avatar_url',
        'name',
    ];

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->uuid = (string) Uuid::uuid4();
        });
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url?? '';
    }

    public function getFilamentName(): string
    {
        return $this->name?? '';
    }

    public function getCurrentTenantLabel(): string
    {
        return $this->plan->name?? '';
    }

    public function chats(): HasMany
    {
        return $this->hasMany(Chat::class);
    }

    public function vehicles(): HasMany
    {
        return $this->hasMany(Vehicle::class);
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }

    public function organizations(): HasMany
    {
        return $this->hasMany(Organization::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
