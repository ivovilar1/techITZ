<div>
    <header class="shadow bg-[#1C1C2E]">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-8 w-auto">
                <h1 class="text-2xl font-bold bg-gradient-to-r from-purple-200 to-fuchsia-400 bg-clip-text text-transparent">techITZ</h1>
            </div>
            <div class="flex items-center space-x-4">
                <x-button
                    class="bg-[#7F3F98] hover:bg-[#9D50BB] text-white py-2 px-4 rounded"
                    @click="$dispatch('company::create')"
                >
                    Publicar uma empresa
                </x-button>
            </div>
        </div>
    </header>
    <main class="bg-[#1C1C2E] text-[#B3A1C2]">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-[#FFFFFF]">Empresas Tech ITZ</h1>
                <p class="mt-4 text-[#B3A1C2]">Painel de empresas de tecnologia da cidade de Imperatriz-MA.</p>
            </div>
            <div class="mt-8 flex justify-center">
                <div class="w-full">
                    <x-input
                        wire:model.live="search"
                        placeholder="Pesquisar"
                        icon="o-magnifying-glass"
                        hint="Pesquise pelo nome da empresa"
                        class="border border-[#7F3F98] rounded-md py-2 px-4 w-96 bg-[#2F1A4E] text-[#FFFFFF]"
                    />
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xl font-semibold text-[#FFFFFF]">{{ $this->companies()->total() }} empresas</h2>
                </div>
            </div>
            <div class="mt-8 space-y-8">
                @foreach($this->companies() as $company)
                    <div class="shadow-md rounded-lg p-6 flex items-center justify-between bg-[#2F1A4E] text-[#FFFFFF]">
                        <div class="flex items-center">
                            <img src="{{ asset('/storage/' . $company->logo ?? null) }}" alt="Company Logo" class="rounded-full mr-4 h-20 w-20 bg-gray-200">
                            <div>
                                <h3 class="text-lg font-semibold">{{ $company->name }}</h3>
                                <p>{{ $company->description ?? 'Nenhuma descrição informada' }}</p>
                                <p class="text-sm mt-2"><i class="fas fa-envelope"></i> {{ $company->email ?? 'Email não informado' }}</p>
                                <div class="mt-4 space-x-2">
                                    @if($company->linkedin)
                                        <a href="{{ $company->linkedin }}" target="_blank" class="text-blue-600">
                                            <x-icon name="fab.linkedin" />
                                        </a>
                                    @endif
                                    @if($company->twitter)
                                        <a href="{{ $company->twitter }}" target="_blank" class="text-black-400">
                                            <x-icon name="fab.x-twitter" />
                                        </a>
                                    @endif
                                    @if($company->instagram)
                                        <a href="{{ $company->instagram }}" target="_blank" class="text-pink-500">
                                            <x-icon name="fab.instagram" />
                                        </a>
                                    @endif
                                </div>

                                <div class="mt-4 space-x-2">
                                    @foreach($company->tags as $tag)
                                        <span class="bg-[#6A0DAD] text-[#FFFFFF] py-1 px-2 rounded-full text-sm">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
    {{ $this->companies()->links(data: ['scrollTo' => false]) }}
    <livewire:company.create />
</div>
