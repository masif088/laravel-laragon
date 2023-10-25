<?php

namespace App\Http\Livewire\User;

use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class RecapTransaction extends Component
{
    use LivewireAlert;

    public $user;
    public $userId;
    public $transaction;
    public $transactions;
    public function mount(){
        $now=Carbon::now();
        $this->user=User::find($this->userId);
        $this->transaction = Transaction::where('user_id','=',$this->userId)
            ->orderByDesc('id')
            ->first();
        $this->transactions = Transaction::where('user_id','=',$this->userId)
            ->orderByDesc('id')
            ->get();
    }

    public function render()
    {
        return view('livewire.user.recap-transaction');
    }
}
