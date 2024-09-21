<?php

namespace App\Livewire\Company;

use App\Models\Company;
use App\Services\SearchCnpj;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class Create extends Component
{
    use WithFileUploads;
    use Toast;
    public bool $drawer = false;
    #[Validate]
    public ?string $cnpj = null;
    #[Validate]
    public ?string $email = null;
    #[Validate]
    public ?string $name = null;
    #[Validate]
    public $logo = null;
    #[Validate]
    public ?string $description = null;
    #[Validate]
    public ?string $linkedin = null;
    #[Validate]
    public ?string $twitter = null;
    #[Validate]
    public ?string $instagram = null;
    #[Validate]
    public array $tags = [];

    public function render(): View
    {
        return view('livewire.company.create');
    }

    public function rules(): array
    {
        return [
            'cnpj' => 'string|max:14|min:14|required|unique:companies,cnpj',
            'email' => 'required|email|email:rfc,filter|max:200|unique:companies,email',
            'name' => 'string|required|max:100|min:3',
            'description' => 'string|nullable|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'linkedin' => 'nullable|url:https,linkedin|max:255',
            'twitter' => 'nullable|url:https,twitter|max:255',
            'instagram' => 'nullable|url:https,instagram|max:255',
            'tags' => 'required',
        ];
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

    public function storeCompany(): void
    {
        $data = $this->validate();
        if ($this->logo) {
            $data['logo'] = $this->logo->store('company', 'public');
        }
        Company::query()->create($data);
        $this->drawer = false;

        $this->success('Empresa cadastrada com sucesso!');

        $this->dispatch('company::reload')->to('company.index');
    }
}
