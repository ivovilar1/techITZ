<?php

use App\Livewire\Company;
use Illuminate\Support\Facades\Route;

Route::get('/', Company\Index::class)->name('home');
