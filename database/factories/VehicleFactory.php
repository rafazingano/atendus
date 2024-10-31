<?php

namespace Database\Factories;

use App\Models\Account;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\VehicleType;
use App\Enums\VehicleCondition;
use App\Enums\FuelType;
use App\Enums\TransmissionType;
use App\Enums\DrivetrainType;
use App\Enums\VehicleBodyType;
use App\Enums\VehicleStatus;

class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'account_id' => Account::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'type' => $this->faker->randomElement(VehicleType::cases())->value,
            'make' => $this->faker->randomElement(['Toyota', 'Honda', 'Ford', 'Chevrolet', 'Volkswagen', 'Nissan', 'Hyundai', 'Fiat']),
            'model' => $this->faker->randomElement([
                'Corolla', 'Civic', 'Accord', 'Camry', 'Fusion', 'Focus', 'Mustang', 'Cruze', 'Onix', 'S10', 'Golf', 
                'Polo', 'Jetta', 'Passat', 'Tiguan', 'Hilux', 'Yaris', 'Sentra', 'Versa', 'Altima', 'Frontier', 
                'HB20', 'Creta', 'Tucson', 'Kicks', 'Duster', 'Captur', 'Sandero', 'Clio', 'Celta', 'Uno', 
                'Palio', 'Argo', 'Toro', 'Compass', 'Renegade', 'Wrangler', 'Cherokee', 'Outlander', 'ASX', 
                'Lancer', 'C3', 'C4', 'C5', 'Picasso', 'Ka', 'EcoSport', 'Ranger', 'Fit', 'HR-V', 'BR-V',
                'Tracker', 'Equinox', 'Spin', 'Trailblazer', 'Cobalt', 'Voyage', 'Up', 'Gol', 'Saveiro', 
                'Mobi', 'Cronos', 'Strada', 'Doblo', 'Pajero', 'Vitara', 'Swift', 'Baleno', 'Jimny', 
                'Sorento', 'Sportage', 'Cerato', 'Picanto', 'Rio', 'Optima', 'Elantra', 'Santa Fe', 
                'CX-3', 'CX-5', 'CX-9', 'Mazda3', 'Mazda6', 'Q3', 'Q5', 'Q7', 'A3', 'A4', 'A6', 'TT', 
                'X1', 'X3', 'X5', '320i', '328i', '530i', 'M3', 'M5', 'GLE', 'GLA', 'GLC', 'GLK', 
                'Class A', 'Class C', 'Class E', 'Classe S', 'Defender', 'Discovery', 'Evoque', 
                'Range Rover', 'Macan', 'Cayenne', 'Panamera'
            ]),
            'condition' => $this->faker->randomElement(VehicleCondition::cases())->value,
            'year' => $this->faker->year,
            'color' => $this->faker->randomElement([
                'Preto', 'Branco', 'Cinza', 'Prata', 'Vermelho', 'Azul', 'Verde', 'Amarelo', 'Marrom', 
                'Bege', 'Roxo', 'Laranja', 'Dourado', 'Prata Metálico', 'Bronze', 'Vinho', 'Turquesa', 
                'Rosa', 'Champanhe', 'Grafite', 'Cobre', 'Verde Escuro', 'Azul Claro', 'Azul Marinho', 
                'Cinza Escuro', 'Verde Limão', 'Preto Fosco', 'Branco Pérola', 'Cinza Chumbo', 'Bege Areia'
            ]),
            'vin' => strtoupper($this->faker->bothify('1HGCM82633A0#####')),
            'license_plate' => strtoupper($this->faker->bothify('???-####')),
            'mileage' => $this->faker->numberBetween(10000, 150000),
            'engine' => $this->faker->randomElement(['1.0L', '1.5L', '1.8L', '2.0L', '3.0L']),
            'fuel_type' => $this->faker->randomElement(FuelType::cases())->value,
            'transmission' => $this->faker->randomElement(TransmissionType::cases())->value,
            'number_of_doors' => $this->faker->numberBetween(2, 5),
            'body_type' => $this->faker->randomElement(VehicleBodyType::cases())->value,
            'drivetrain' => $this->faker->randomElement(DrivetrainType::cases())->value,
            'features' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 20000, 200000),
            'status' => $this->faker->randomElement(VehicleStatus::cases())->value,
            'description' => $this->faker->paragraph,
            'location' => $this->faker->randomElement([
                'Porto Alegre', 'Caxias do Sul', 'Pelotas', 'Canoas', 'Santa Maria',
                'Viamão', 'Novo Hamburgo', 'São Leopoldo', 'Rio Grande', 
                'Alvorada', 'Passo Fundo', 'Sapucaia do Sul', 'Uruguaiana',
                'Santa Cruz do Sul', 'Bagé', 'Gravataí', 'Cachoeira do Sul',
                'Bento Gonçalves', 'Erechim', 'Guaíba', 'Ijuí', 'Cachoeirinha',
                'Santana do Livramento', 'Esteio', 'Farroupilha', 'Carazinho',
                'Lajeado', 'Venâncio Aires', 'Sapiranga', 'Campo Bom', 'Taquara',
            ]),
        ];
    }
}
