<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Payment extends Component
{
    public $payments;
    public function mount(){
        $this->payments=\App\Models\Payment::get();
    }
    public function render()
    {
        return view('livewire.user.payment');
    }
}
