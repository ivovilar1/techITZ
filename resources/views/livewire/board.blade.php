<div>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="path/to/logo.png" alt="Logo" class="h-8 w-auto">
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" class="bg-purple-600 text-white py-2 px-4 rounded">Publicar uma empresa</a>
            </div>
        </div>
    </header>
    <main>
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900">Empresas Tech ITZ</h1>
                <p class="mt-4 text-gray-600">Painel de empresas de tecnologia da cidade de Imperatriz-MA.</p>
            </div>
            <div class="mt-8 flex justify-center">
                <div class="flex space-x-4">
                    <x-input
                        wire:model.live="search"
                        placeholder="Pesquisar"
                        icon="o-magnifying-glass"
                        hint="Pesquise pelo nome da empresa"
                        class="border rounded-md py-2 px-4 w-96"
                    />
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900">{{ $totalCompanies }} empresas</h2>
                </div>
            </div>
            <div class="mt-8 space-y-8">
                @foreach($this->companies() as $company)
                <div class="bg-white shadow-md rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <img src="{{ $company->logo }}" alt="Company Logo" class="rounded-full mr-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $company->name }}</h3>
                        <p class="text-gray-600">{{ $company->description ?? 'Nenhuma descrição informada'}}</p>
                        <div class="mt-4 space-x-2">
                            @foreach($company->tags as $tag)
                                <span class="bg-gray-100 text-gray-600 py-1 px-2 rounded-full text-sm">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
    {{ $this->companies()->links(data: ['scrollTo' => false]) }}
</div>
