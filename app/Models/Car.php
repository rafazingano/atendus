<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'make',
        'model',
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
        'purchase_date',
        'purchase_price',
        'sale_date',
        'sale_price',
        'status',
        'previous_owners',
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
        'purchase_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'purchase_date' => 'date',
        'sale_date' => 'date',
    ];
}
