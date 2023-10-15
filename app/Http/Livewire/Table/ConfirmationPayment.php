<?php

namespace App\Http\Livewire\Table;

use App\Repository\Form\Transaction;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ConfirmationPayment extends Main
{
    use LivewireAlert;
    public function setConfirmation($id,$status){
        $transaction = Transaction::find($id);
        $transaction->update(['transaction_status_id'=>$status]);
        $this->alert('success', 'Bermasil mengubah paket baru');

    }

}
