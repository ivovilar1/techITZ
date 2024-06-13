<div>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-8 w-auto">
                <h1 class="text-2xl font-bold bg-gradient-to-r from-purple-200 to-fuchsia-400 bg-clip-text text-transparent">techITZ</h1>
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
                <div class="w-full">
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
                    <h2 class="text-xl font-semibold text-gray-900">{{ $this->companies()->total() }} empresas</h2>
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
    <footer class="py-8 text-gray-600 text-center">
        <p>&copy; {{ now()->year }} TechITZ. Desenvolvido por
            <a href="https://www.linkedin.com/in/ivo-vilar/"
               class="cursor-pointer font-semibold text-gray-900"
            >
                devI
            </a>
        </p>
    </footer>
    {{ $this->companies()->links(data: ['scrollTo' => false]) }}
</div>
