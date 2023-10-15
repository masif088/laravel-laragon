<?php

namespace App\Http\Livewire\User;

use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;

class Cards extends Component
{
    public $transaction;
    public function mount(){
        $now=Carbon::now();
        $this->transaction = Transaction::where('user_id','=',auth()->user()->id)
            ->whereDate('date_start','<',$now)
            ->whereDate('date_end','>',$now)
            ->first();
    }
    public function render()
    {
        return view('livewire.user.cards');
    }
}
