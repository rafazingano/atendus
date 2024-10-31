<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\Account;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $account = Account::first(); // Captura o primeiro registro da tabela Account
        $user = User::first();       // Captura o primeiro registro da tabela User

        Organization::create([
            'uuid' => Str::uuid(),
            'account_id' => $account->id ?? null, // Usa o ID do primeiro registro de Account, ou null se não existir
            'user_id' => $user->id ?? null,       // Usa o ID do primeiro registro de User, ou null se não existir
            'slug' => 'revenda-exemplo',
            'logo' => 'https://example.com/logo.png',
            'banner' => 'https://example.com/banner.png',
            'website' => 'https://revendaexemplo.com',
            'name' => 'Revenda Exemplo',
            'cnpj_cpf' => '12345678000100',
            'address' => 'Rua Exemplo, 123',
            'city' => 'São Paulo',
            'state' => 'SP',
            'zip_code' => '12345-678',
            'phone' => '(11) 98765-4321',
            'whatsapp' => '(11) 91234-5678',
            'email' => 'contato@revendaexemplo.com',
            'business_type' => 'Dealership',
            'vehicle_types' => 'Carro, Moto',
            'preferred_brands' => 'Toyota, Honda',
            'price_range' => 'R$20,000 - R$100,000',
            'working_hours' => 'Seg-Sex, 08h-18h',
            'payment_methods' => 'Cartão de crédito, Financiamento, Transferência bancária',
            'current_offers' => 'Descontos de até 10% para carros seminovos.',
            'warranty_policy' => 'Garantia de 1 ano para veículos seminovos.',
            'additional_services' => 'Financiamento, Seguro e IPVA grátis.',
            'target_audience' => 'Público jovem e famílias',
            'faq' => 'Como posso financiar meu veículo? Qual é a documentação necessária?',
            'sales_process' => 'Passo a passo de venda, incluindo avaliação e documentação.',
            'success_stories' => 'Vendemos mais de 500 veículos com satisfação total dos clientes.',
        ]);
    }
}
