<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Uuid\Uuid;

class Chat extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'account_id',
        'user_id',
        'site_name',
        'site_url',
        'status',
        'name',
        'language',
        'agent_name',
        'initial_message',
    ];

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->uuid = (string) Uuid::uuid4();
            $model->user_id = auth()->id();
        });
    }

    /**
     * Definição do relacionamento com a conta.
     */
    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    /**
     * Summary of organization
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    /**
     * Definição do relacionamento com o usuário.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
