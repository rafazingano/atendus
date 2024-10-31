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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->comment('UUID da empresa');
            $table->foreignId('account_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete()->comment('ID da conta à qual a empresa pertence');
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete()->comment('ID do usuário que criou a empresa');
            $table->string('slug')->unique()->comment('Slug para URL amigável');
            $table->string('logo')->nullable()->comment('URL do logotipo da empresa');
            $table->string('banner')->nullable()->comment('URL da imagem de capa da empresa');
            $table->string('website')->nullable()->comment('URL do site da empresa');
            $table->string('name')->comment('Nome da empresa');
            $table->string('cnpj_cpf')->nullable()->unique()->comment('CNPJ ou CPF se for pessoa física');
            $table->string('address')->nullable()->comment('Endereço completo da empresa');
            $table->string('city')->nullable()->comment('Cidade da empresa');
            $table->string('state')->nullable()->comment('Estado da empresa');
            $table->string('zip_code')->nullable()->comment('CEP da empresa');
            $table->string('phone')->nullable()->comment('Telefone de contato');
            $table->string('whatsapp')->nullable()->comment('Número do WhatsApp');
            $table->string('email')->nullable()->unique()->comment('E-mail de contato');
            $table->string('business_type')->nullable()->comment('Tipo de empresa, como Concessionária ou Revenda Independente');
            $table->string('price_range')->nullable()->comment('Faixa de preço média dos veículos. Ex: R$20,000 - R$100,000');
            $table->string('working_hours')->nullable()->comment('Horário de atendimento. Ex: Seg-S');
            $table->string('target_audience')->nullable()->comment('Público-alvo ou perfil de cliente típico. Ex: Jovens, Famílias, Empresas');
            $table->text('vehicle_types')->nullable()->comment('Tipos de veículos comercializados, como Carros, Motos, Caminhões, Barcos');
            $table->text('preferred_brands')->nullable()->comment('Marcas preferenciais com as quais trabalham. Ex: Toyota, Honda');
            $table->text('payment_methods')->nullable()->comment('Formas de pagamento aceitas. Ex: Cartão de crédito, Financiamento');
            $table->text('current_offers')->nullable()->comment('Ofertas e promoções atuais');
            $table->text('warranty_policy')->nullable()->comment('Política de garantias e assistência oferecida');
            $table->text('additional_services')->nullable()->comment('Serviços extras como seguro, financiamento, IPVA pago, revisões incluídas');
            $table->text('faq')->nullable()->comment('Perguntas frequentes. Ex: Como financiar um veículo?');
            $table->text('sales_process')->nullable()->comment('Informações sobre o processo de venda. Ex: Avaliação, Documentação');
            $table->text('success_stories')->nullable()->comment('Histórico de vendas e casos de sucesso. Ex: Mais de 500 veículos vendidos');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
