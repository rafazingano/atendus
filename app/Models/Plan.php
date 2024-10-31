<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Plan extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'uuid',
        'name',
        'slug',
        'price',
        'description',
    ];

    protected static function booted(): void
    {
        static::creating(function ($model) {
            $model->uuid = (string) Uuid::uuid4();
        });
    }

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
