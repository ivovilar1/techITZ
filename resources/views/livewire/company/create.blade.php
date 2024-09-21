<x-modal wire:model="modal" box-class="max-w-7xl w-full bg-gradient-to-br from-gray-900 via-purple-800 to-black">
    <form wire:submit.prevent="storeCompany">
        <div class="grid grid-cols-2 space-x-2">
            <div class="mb-6">
                <label for="CNPJ" class="block text-white font-medium mb-2">
                    CNPJ
                    <span class="text-red-500">
                    *
                </span>
                </label>
                <x-input
                    wire:model.lazy="cnpj"
                    type="text"
                    id="cnpj"
                    placeholder="Digite o CNPJ"
                    class="w-full p-3 border border-purple-500 rounded-lg bg-gray-800 text-white focus:outline-none focus:border-purple-700"
                    required
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
                <label for="email" class="block text-white font-medium mb-2">
                    Email
                    <span class="text-red-500">
                    *
                </span>
                </label>
                <x-input
                    wire:model="email"
                    type="email"
                    id="email"
                    placeholder="Digite o email da empresa"
                    class="w-full p-3 border border-purple-500 rounded-lg bg-gray-800 text-white focus:outline-none focus:border-purple-700"
                    required
                />
                @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-6">
            <label for="name" class="block text-white font-medium mb-2">
                Nome da Empresa
                <span class="text-red-500">
                    *
                </span>
            </label>
            <x-input
                wire:model="name"
                type="text"
                id="name"
                placeholder="Digite o nome da empresa"
                class="w-full p-3 border border-purple-500 rounded-lg bg-gray-800 text-white focus:outline-none focus:border-purple-700"
                required
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
                hint="Apenas imagens com no máximo 1MB e no formato: pnj, jpeg, jpg"
                accept="image"
            />
            @error('logo')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label for="description" class="block text-white font-medium mb-2">Descrição</label>
            <x-textarea
                wire:model="description"
                id="description"
                rows="4"
                placeholder="Digite uma breve descrição da empresa"
                class="w-full p-3 border border-purple-500 rounded-lg bg-gray-800 text-white focus:outline-none focus:border-purple-700"
            />
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="grid grid-cols-3 space-x-2">
            <div class="mb-6">
                <label for="linkedin" class="block text-white font-medium mb-2">Linkedin</label>
                <x-input
                    wire:model="linkedin"
                    type="text"
                    id="linkedin"
                    placeholder="Copie a url do linkedin da empresa"
                    class="w-full p-3 border border-purple-500 rounded-lg bg-gray-800 text-white focus:outline-none focus:border-purple-700"
                />
                @error('linkedin')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="twitter" class="block text-white font-medium mb-2">X</label>
                <x-input
                    wire:model="twitter"
                    type="text"
                    id="twitter"
                    placeholder="Copie a url do X da empresa"
                    class="w-full p-3 border border-purple-500 rounded-lg bg-gray-800 text-white focus:outline-none focus:border-purple-700"
                />
                @error('twitter')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-6">
                <label for="instagram" class="block text-white font-medium mb-2">Instagram</label>
                <x-input
                    wire:model="instagram"
                    type="text"
                    id="instagram"
                    placeholder="Copie a url do instagram da empresa"
                    class="w-full p-3 border border-purple-500 rounded-lg bg-gray-800 text-white focus:outline-none focus:border-purple-700"
                />
                @error('instagram')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mb-6">
            <label for="tags" class="block text-white font-medium mb-2">Tecnologias</label>
            <x-tags
                class="w-full p-3 border border-purple-500 rounded-lg bg-gray-800 text-white focus:outline-none focus:border-purple-700"
                wire:model="tags"
                icon="o-tag"
                hint="Aperte enter para adicionar uma nova tecnologia"
            />
            @error('tags')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="grid grid-cols-2 space-x-2">
            <x-button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 mb-4 rounded-lg transition duration-300" @click="$wire.modal = false">
                Voltar
            </x-button>
            <x-button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 rounded-lg transition duration-300">
                Cadastrar Empresa
            </x-button>
        </div>
    </form>
</x-modal>
