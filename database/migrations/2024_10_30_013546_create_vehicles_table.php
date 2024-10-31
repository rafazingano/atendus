<?php

use App\Enums\DrivetrainType;
use App\Enums\FuelType;
use App\Enums\TransmissionType;
use App\Enums\VehicleBodyType;
use App\Enums\VehicleCondition;
use App\Enums\VehicleStatus;
use App\Enums\VehicleType;
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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained()->cascadeOnDelete()->comment('ID da conta do usuário');
            $table->foreignId('organization_id')->nullable()->constrained()->nullOnDelete()->comment('ID da empresa à qual o veículo pertence');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete()->comment('ID do usuário que cadastrou o veículo');
            $table->enum('type', array_column(VehicleType::cases(), 'value'))->default(VehicleType::cases()[0]->value)->comment('Tipo de veículo. Carro, Moto, Caminhão, etc.');
            $table->string('make')->comment('Fabricante do veículo, como Ford, Toyota, etc.');
            $table->string('model')->comment('Modelo do veículo');
            $table->enum('condition', array_column(VehicleCondition::cases(), 'value'))->nullable()->default(VehicleCondition::cases()[0]->value)->comment('Condição do veículo. Novo, Usado, etc.');
            $table->year('year')->nullable()->comment('Ano de fabricação');
            $table->string('color')->nullable()->comment('Cor do veículo');
            $table->string('vin')->nullable()->unique()->comment('Número de Identificação do Veículo (VIN)');
            $table->string('license_plate')->unique()->nullable()->comment('Placa do veículo');
            $table->integer('mileage')->nullable()->comment('Quilometragem do veículo');
            $table->string('engine')->nullable()->comment('Tipo de motor, como 1.8L, V6, etc.');
            $table->enum('fuel_type', array_column(FuelType::cases(), 'value'))->nullable()->comment('Tipo de combustível');
            $table->enum('transmission', array_column(TransmissionType::cases(), 'value'))->nullable()->comment('Tipo de transmissão');
            $table->integer('number_of_doors')->nullable()->comment('Número de portas do veículo');
            $table->enum('body_type', array_column(VehicleBodyType::cases(), 'value'))->nullable()->comment('Tipo de carroceria, como Sedan, SUV, Hatch, etc.');
            $table->enum('drivetrain', array_column(DrivetrainType::cases(), 'value'))->nullable()->comment('Tipo de tração');
            $table->text('features')->nullable()->comment('Lista de características e extras, como Ar-condicionado, Airbags, ABS');
            $table->decimal('price', 10, 2)->nullable()->comment('Preço do carro para revenda');
            $table->enum('status', array_column(VehicleStatus::cases(), 'value'))->nullable()->default(VehicleStatus::cases()[0]->value)->comment('Status atual do veículo. Disponível, Vendido, Em manutenção, etc.');
            $table->text('description')->nullable()->comment('Descrição detalhada do carro, incluindo condições e históricos');
            $table->string('location')->nullable()->comment('Localização do veículo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }

    private function getTypes()
    {
        return [
            'Carro',         // Automóveis convencionais
            'Moto',          // Motocicletas
            'Barco',         // Barcos e lanchas
            'Caminhão',      // Caminhões de transporte
            'Ônibus',        // Ônibus e transporte coletivo
            'Trailer',       // Trailers e motorhomes
            'Avião',         // Aeronaves
            'Helicóptero',   // Helicópteros
            'Bicicleta',     // Bicicletas e e-bikes
            'Quadriciclo',   // Quadriciclos
            'Trator',        // Veículos agrícolas
            'Scooter',       // Scooters elétricos e convencionais
            'Outro'          // Categoria genérica para qualquer veículo não listado
        ];
    }
};
