<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Header extends Component
{
    public $user = [];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.components.header');
    }
}
