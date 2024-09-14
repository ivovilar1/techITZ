<x-drawer wire:model="drawer" class="w-11/12 lg:w-1/3 min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-purple-800 to-black" right>
    <form wire:submit.prevent="saveCompany">
        <div class="mb-6">
            <label for="CNPJ" class="block text-white font-medium mb-2">CNPJ</label>
            <x-input
                wire:model.lazy="cnpj"
                type="text"
                id="cnpj"
                placeholder="Digite o CNPJ"
                class="w-full p-3 border border-purple-500 rounded-lg bg-gray-800 text-white focus:outline-none focus:border-purple-700"
            >
                <x-slot:append>
                    <x-button
                        icon="o-magnifying-glass"
                        class="p-3 border border-purple-500 rounded-lg bg-gray-800 focus:outline-none focus:border-purple-700 rounded"
                        wire:click="searchCNPJ"
                        spinner="searchCNPJ"
                    />
                </x-slot:append>
            </x-input>
            @error('cnpj')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label for="name" class="block text-white font-medium mb-2">Nome da Empresa</label>
            <x-input
                wire:model.lazy="name"
                type="text"
                id="name"
                placeholder="Digite o nome da empresa"
                class="w-full p-3 border border-purple-500 rounded-lg bg-gray-800 text-white focus:outline-none focus:border-purple-700"
            />
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label for="logo" class="block text-white font-medium mb-2">Logo da Empresa</label>
            <x-file
                wire:model="logo"
                id="logo"
                class="w-full p-3 border border-purple-500 rounded-lg bg-gray-800 text-white focus:outline-none focus:border-purple-700"
                hint="Apenas imagens no formato: pnj, jpeg, jpg"
                accept="image"
            />
            @error('logo')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label for="description" class="block text-white font-medium mb-2">Descrição</label>
            <x-textarea
                wire:model.lazy="description"
                id="description"
                rows="4"
                placeholder="Digite uma breve descrição da empresa"
                class="w-full p-3 border border-purple-500 rounded-lg bg-gray-800 text-white focus:outline-none focus:border-purple-700"
            />
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label for="tags" class="block text-white font-medium mb-2">Tecnologias</label>
            <x-tags
                class="w-full p-3 border border-purple-500 rounded-lg bg-gray-800 text-white focus:outline-none focus:border-purple-700"
                wire:model.lazy="tags"
                icon="o-tag"
                hint="Aperte enter para adicionar uma nova tecnologia"
            />
            @error('tags')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="text-center">
            <x-button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 mb-4 rounded-lg transition duration-300" @click="$wire.drawer = false">
                Voltar
            </x-button>
            <x-button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 rounded-lg transition duration-300">
                Cadastrar Empresa
            </x-button>
        </div>
    </form>
</x-drawer>
