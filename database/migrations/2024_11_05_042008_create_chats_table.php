<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();            
            $table->uuid('uuid')->unique()->comment('UUID do chat para identificação única');
            $table->foreignId('account_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete()->comment('ID da conta à qual o chat pertence');
            $table->foreignId('organization_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete()->comment('ID da organização à qual o chat pertence');
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnUpdate()->nullOnDelete()->comment('ID do usuário que criou o chat');
            $table->string('name')->nullable()->comment('Nome do chat para identificação');
            $table->string('language')->default('pt_BR')->comment('Idioma configurado para o chat');
            $table->string('agent_name')->nullable()->comment('Nome do agente do chat, escolhido pelo usuário');
            $table->string('site_name')->nullable()->comment('Nome do site onde o chat será utilizado');
            $table->string('site_url')->comment('URL do site onde o chat será inserido');
            $table->boolean('status')->default(true)->comment('Status do chat: ativo ou inativo');
            $table->text('initial_message')->nullable()->comment('Mensagem inicial configurada para o chat');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
