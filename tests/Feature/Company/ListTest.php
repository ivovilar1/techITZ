<?php

use App\Livewire\CompanyBoard;
use App\Models\Company;
use function Pest\Laravel\get;

it('should be able to render component', function () {
    get(route('home'))
        ->assertOk();
});

test('should be able to list all companies', function () {
    $companies = Company::factory()->count(10)->create();
    $lw = Livewire::test(CompanyBoard::class);

    $lw->assertSet('companies', function ($companies) {
        expect($companies)->toHaveCount(10);
        return true;
    });
    foreach ($companies as $company) {
        $lw->assertSee($company->name);
    }
});
