<?php

use App\Livewire\Company\Index;
use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;
use function Pest\Laravel\get;
use Livewire\Livewire;

it('should be able to render component', function () {
    get(route('home'))
        ->assertOk();
});

it('should be able to list all companies', function () {
    $companies = Company::factory()->count(10)->create();
    $lw = Livewire::test(Index::class);

    $lw->assertSet('companies', function ($companies) {
        expect($companies)->toHaveCount(10);
        return true;
    });
    foreach ($companies as $company) {
        $lw->assertSee($company->name);
    }
});

it('should be able to filter by name', function () {
    Company::factory()->create(['name' => 'Itadori']);
    Company::factory()->create(['name' => 'Sukuna']);

    Livewire::test(Index::class)
        ->assertSet('companies', function ($companies) {
            expect($companies)
                ->toHaveCount(2);
            return true;
    })
        ->set('search', 'ita')
        ->assertSet('companies', function ($companies) {
            expect($companies)
                ->toHaveCount(1)
                ->first()->name
                ->toBe('Itadori');
            return true;
        });
});

it('should be able to paginate the result', function () {
    Company::factory()->count(30)->create();

    Livewire::test(Index::class)
        ->assertSet('companies', function (LengthAwarePaginator $companies) {
            expect($companies)
                ->toHaveCount(10);
            return true;
    });
});
