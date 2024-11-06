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
                'name' => 'Plano Básico Mensal',
                'slug' => 'plano-basico-mensal',
                'price' => 9900, // R$99,00
                'description' => 'Ideal para iniciantes, com recursos limitados de criação de chatbots.',
                'stripe_type' => 'plano-basico',
                'stripe_price' => 'price_1QHF6wJhbkDaayMYhkrwNQZA',
            ],
            [
                'name' => 'Plano Básico Anual',
                'slug' => 'plano-basico-anual',
                'price' => 99900, // R$999,00
                'description' => 'Ideal para iniciantes, com recursos limitados de criação de chatbots.',
                'stripe_type' => 'plano-basico',
                'stripe_price' => 'price_1QHF7jJhbkDaayMYztqRjgH8',
            ],
            [
                'name' => 'Plano Profissional Mensal',
                'slug' => 'plano-profissional-mensal',
                'price' => 29900, // R$299,00
                'description' => 'Perfeito para empresas, com recursos avançados e suporte técnico.',
                'stripe_type' => 'plano-profissional',
                'stripe_price' => 'price_1QHFDHJhbkDaayMYT7nDXNhg',
            ],
            [
                'name' => 'Plano Profissional Anual',
                'slug' => 'plano-profissional-anual',
                'price' => 299900, // R$2.999,00
                'description' => 'Perfeito para empresas, com recursos avançados e suporte técnico.',
                'stripe_type' => 'plano-profissional',
                'stripe_price' => 'price_1QHFDfJhbkDaayMYZTdLlRon',
            ],
        ];

        foreach ($plans as $plan) {
            $plan['uuid'] = Str::uuid();
            Plan::updateOrCreate(['slug' => $plan['slug']], $plan);
        }
    }
}
