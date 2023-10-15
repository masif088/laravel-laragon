<?php

namespace App\Http\Livewire\User;

use App\Models\Transaction;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class RecapTransaction extends Component
{
    use LivewireAlert;

    public $transaction;
    public $transactions;
    public function mount(){
        $now=Carbon::now();

        $this->transaction = Transaction::where('user_id','=',auth()->user()->id)
            ->whereDate('date_start','<',$now)
            ->whereDate('date_end','>',$now)
            ->first();
        $this->transactions = Transaction::where('user_id','=',auth()->user()->id)
            ->orderByDesc('id')
            ->get();
    }

    public function render()
    {
        return view('livewire.user.recap-transaction');
    }
}
