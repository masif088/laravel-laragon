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
    public $waNumber;

    public function mount(){
        $this->transaction = Transaction::where('user_id','=',$this->dataId)->orderByDesc('id')->first();
        $this->user = User::find($this->dataId);
        if ($this->user->no_phone!=null){
            if ($this->user->no_phone[0]==0){

                $originalNumber = $this->user->no_phone;
                $countryCode = '62'; // Replace with known country code of user.
                $internationalNumber = preg_replace('/^0/', $countryCode, $originalNumber);
                $this->waNumber=$internationalNumber;
            }
        }
    }
    public function render()
    {
        return view('livewire.bill-customer');
    }
}
