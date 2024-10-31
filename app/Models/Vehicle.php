<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account_id',
        'user_id',
        'type',
        'make',
        'model',
        'condition',
        'year',
        'color',
        'vin',
        'license_plate',
        'mileage',
        'engine',
        'fuel_type',
        'transmission',
        'number_of_doors',
        'body_type',
        'drivetrain',
        'features',
        'price',
        'status',
        'description',
        'location',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos específicos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'year' => 'integer',
        'mileage' => 'integer',
        'price' => 'decimal:2',
    ];

    /**
     * Obtém a conta associada ao veículo.
     */
    public function account():BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
