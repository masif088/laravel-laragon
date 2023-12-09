<?php

namespace App\Http\Livewire\User;

use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;

class DataUser extends Component
{
    public $transaction;
    public function mount(){
        $now=Carbon::now();
        $this->transaction = Transaction::where('user_id','=',auth()->user()->id)
            ->orderByDesc('id')
            ->first();
    }
    public function render()
    {
        return view('livewire.user.data-user');
    }
}
