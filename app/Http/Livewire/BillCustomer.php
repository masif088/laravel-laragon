<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;

class BillCustomer extends Component
{
    public $dataId;
    public $transaction;
    public $user;

    public function mount(){
        $this->transaction = Transaction::where('user_id','=',$this->dataId)->orderByDesc('id')->first();
        $this->user = User::find($this->dataId);
    }
    public function render()
    {
        return view('livewire.bill-customer');
    }
}
