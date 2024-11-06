<x-filament-panels::page>
    <x-filament::section>
        <div class="text-center">
            <div class="inline-flex items-center justify-center rounded-full bg-green-100 p-4">
                <x-heroicon-o-check class="h-8 w-8 text-green-600" />
            </div>
            
            <h2 class="mt-4 text-2xl font-bold">Assinatura Ativada!</h2>
            <p class="mt-2">Obrigado por se inscrever. Agora você tem acesso a todos os recursos.</p>
            
            <x-filament::button
                
                class="mt-6"
                :href="route('filament.admin.tenant')"
            >
                Ir para o Dashboard
            </x-filament::button>
        </div>
    </x-filament::section>
</x-filament-panels::page>
