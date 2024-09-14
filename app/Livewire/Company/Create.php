<?php

namespace App\Livewire\Company;

use App\Services\SearchCnpj;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    public bool $drawer = false;
    public ?string $cnpj = null;
    public ?string $name = null;
    public $logo = null;
    public ?string $description = null;
    public ?array $tags = null;

    public function render(): View
    {
        return view('livewire.company.create');
    }

    #[On('company::create')]
    public function openDrawer(): void
    {
        $this->reset();
        $this->drawer = true;
    }

    public function searchCNPJ(): void
    {
        $data = SearchCnpj::execute($this->cnpj);
        $this->name = $data['name'];
        $this->description = $data['description'];
    }
}
