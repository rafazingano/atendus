<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Plano Básico',
                'slug' => 'plano-basico',
                'price' => 9900, // R$99,00
                'description' => 'Ideal para iniciantes, com recursos limitados de criação de chatbots.',
            ],
            [
                'name' => 'Plano Profissional',
                'slug' => 'plano-profissional',
                'price' => 29900, // R$299,00
                'description' => 'Perfeito para empresas, com recursos avançados e suporte técnico.',
            ],
            [
                'name' => 'Plano Corporativo',
                'slug' => 'plano-corporativo',
                'price' => 59900, // R$599,00
                'description' => 'Solução completa para grandes empresas, com suporte premium e integração customizada.',
            ],
        ];

        foreach ($plans as $plan) {
            Plan::create([
                'uuid' => Str::uuid(),
                'name' => $plan['name'],
                'slug' => $plan['slug'],
                'price' => $plan['price'],
                'description' => $plan['description'],
            ]);
        }
    }
}
