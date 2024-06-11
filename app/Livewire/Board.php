<?php

namespace App\Livewire;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

/** @property-read LengthAwarePaginator|Company[] $companies */
class Board extends Component
{
    use WithPagination;
    public ?string $search = null;

    public function render(): View
    {
        return view('livewire.board');
    }
    public function search(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function companies(): LengthAwarePaginator
    {
        return Company::query()
            ->when($this->search, function (Builder $query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);
    }
}
