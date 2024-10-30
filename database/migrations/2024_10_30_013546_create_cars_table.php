<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('make')->comment('Fabricante do veículo, como Ford, Toyota, etc.');
            $table->string('model')->comment('Modelo do veículo');
            $table->year('year')->comment('Ano de fabricação');
            $table->string('color')->comment('Cor do veículo');
            $table->string('vin')->unique()->comment('Número de Identificação do Veículo (VIN)');
            $table->string('license_plate')->unique()->comment('Placa do veículo');
            $table->integer('mileage')->comment('Quilometragem do veículo');
            $table->string('engine')->comment('Tipo de motor, como 1.8L, V6, etc.');
            $table->enum('fuel_type', ['Gasolina', 'Diesel', 'Elétrico', 'Flex', 'Álcool'])->comment('Tipo de combustível');
            $table->enum('transmission', ['Manual', 'Automático'])->comment('Tipo de transmissão');
            $table->integer('number_of_doors')->comment('Número de portas do veículo');
            $table->string('body_type')->comment('Tipo de carroceria, como Sedan, SUV, Hatch, etc.');
            $table->enum('drivetrain', ['4x2', '4x4'])->comment('Tipo de tração');
            $table->text('features')->nullable()->comment('Lista de características e extras, como Ar-condicionado, Airbags, ABS');
            $table->decimal('price', 10, 2)->comment('Preço do carro para revenda');
            $table->date('purchase_date')->nullable()->comment('Data de aquisição do veículo');
            $table->decimal('purchase_price', 10, 2)->nullable()->comment('Preço de compra do carro');
            $table->date('sale_date')->nullable()->comment('Data de venda do veículo, se já foi vendido');
            $table->decimal('sale_price', 10, 2)->nullable()->comment('Preço de venda do veículo');
            $table->enum('status', ['Disponível', 'Vendido', 'Em manutenção'])->default('Disponível')->comment('Status atual do veículo');
            $table->integer('previous_owners')->default(0)->comment('Número de proprietários anteriores');
            $table->text('description')->nullable()->comment('Descrição detalhada do carro, incluindo condições e históricos');
            $table->string('location')->comment('Localização do veículo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
