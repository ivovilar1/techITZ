<?php

use App\Livewire\CompanyBoard;
use Illuminate\Support\Facades\Route;

Route::get('/', CompanyBoard::class)->name('home');
