<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtém um plano existente (por exemplo, o primeiro plano cadastrado)
        $plan = Plan::first();

        // Obtém o usuário Rafael Zingano
        $user = User::where('email', 'confrariaweb@gmail.com')->first();

        // Cria uma conta associada ao plano e vincula ao usuário Rafael Zingano
        $account = Account::create([
            'uuid' => Str::uuid(),
            'name' => 'Confraria Web',
            'avatar_url' => NULL,
            'plan_id' => $plan->id,
        ]);

        // Relaciona o usuário com a conta criada
        $account->users()->attach($user->id);
    }
}
