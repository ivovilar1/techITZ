<?php

namespace App\Livewire\Company;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    public bool $drawer = false;
    public function render(): View
    {
        return view('livewire.company.create');
    }

    #[On('company::create')]
    public function openDrawer(): void
    {
        $this->drawer = true;
    }
}
