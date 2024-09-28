<?php

namespace App\Livewire\Company;

use App\Models\Company;
use App\Rules\CnpjValidation;
use App\Services\CnpjService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\RequestException;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class Create extends Component
{
    use WithFileUploads;
    use Toast;
    public bool $modal = false;
    public ?string $cnpj = null;
    public ?string $email = null;
    public ?string $name = null;
    public $logo = null;
    public ?string $description = null;
    public ?string $linkedin = null;
    public ?string $twitter = null;
    public ?string $instagram = null;
    public array $tags = [];

    public function render(): View
    {
        return view('livewire.company.create');
    }

    public function rules(): array
    {
        return [
            'cnpj' => ['string','required','unique:companies,cnpj', new CnpjValidation],
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
    public function openModal(): void
    {
        $this->reset();
        $this->resetValidation();
        $this->modal = true;
    }

    public function searchCNPJ(CnpjService $cnpjService): void
    {
        try {
            if (!$this->cnpj) {
                $this->addError('cnpj', 'Você esqueceu de informar o CNPJ');
                return;
            }
            $data = $cnpjService->search($this->cnpj);
            $this->name = $data['nome_fantasia'];
            $this->description = $data['cnae_fiscal_descricao'];
        } catch (RequestException $e) {
            $error = $e->response->json();
            $message = $error['message'] ?? 'Algo inesperado aconteceu';
            $this->addError('cnpj', $message);
        }
    }

    public function storeCompany(): void
    {
        $data = $this->validate();
        if ($this->logo) {
            $data['logo'] = $this->logo->store('company', 'public');
        }
        Company::query()->create($data);
        $this->modal = false;

        $this->success('Empresa cadastrada com sucesso!');

        $this->dispatch('company::reload')->to('company.index');
    }
    public function updatedCnpj(): void
    {
        $this->resetErrorBag('cnpj');
    }
}
