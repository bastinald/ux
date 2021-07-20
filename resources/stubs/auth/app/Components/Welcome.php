<?php

namespace App\Components;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Welcome extends Component
{
    public function route()
    {
        return Route::get('/', static::class)
            ->name('welcome');
    }

    public function render()
    {
        return view('welcome');
    }
}
