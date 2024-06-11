<?php

namespace App\Livewire;

use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

/** @property-read LengthAwarePaginator|Company[] $companies */
class Board extends Component
{
    use WithPagination;

    public function render(): View
    {
        $countCompanies = Company::query()->count();
        return view('livewire.board', [
            'totalCompanies' => $countCompanies,
        ]);
    }

    public function companies(): LengthAwarePaginator
    {
        return Company::query()->paginate(10);
    }
}
