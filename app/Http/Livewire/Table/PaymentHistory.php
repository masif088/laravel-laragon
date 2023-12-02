<?php

namespace App\Http\Livewire\Table;

use App\Repository\Form\Transaction;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PaymentHistory extends Main
{
    use LivewireAlert;
    public function setCancelPayment($id,$status){
        $transaction = Transaction::find($id);
        $transaction->update(['transaction_status_id'=>$status]);
        $this->alert('success', 'Bermasil mengubah paket baru');
    }

}
