<?php

use App\Livewire\{CategoryIndex, CategoryForm};
use Illuminate\Support\Facades\Route;

Route::get('/', CategoryIndex::class)->name('categories.index');
Route::get('/categories/create', CategoryForm::class)->name('categories.create');
Route::get('/categories/edit/{id}', CategoryForm::class)->name('categories.edit');
