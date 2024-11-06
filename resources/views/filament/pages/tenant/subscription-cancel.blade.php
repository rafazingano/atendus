<x-filament-panels::page>
    <x-filament::section>
        <div class="text-center">
            <div class="inline-flex items-center justify-center rounded-full bg-red-100 p-4">
                <x-heroicon-o-check class="h-8 w-8 text-red-600" />
            </div>
            
            <h2 class="mt-4 text-2xl font-bold">Assinatura cancelada!</h2>
            <p class="mt-2">Sua assinatura foi cancelada com sucesso. Sentiremos sua falta!</p>
            
            <x-filament::button
                class="mt-6"
                :href="route('filament.admin.tenant')"
            >
                Ir para o Dashboard
            </x-filament::button>
        </div>
    </x-filament::section>
</x-filament-panels::page>
