<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class TransactionDetail extends Component
{
    use LivewireAlert;

    public $dataId;
    public $transaction;

    public function mount()
    {
        $this->transaction = Transaction::find($this->dataId);
    }

    public function setConfirmation($status)
    {
        $transaction = Transaction::find($this->dataId);
        if ($status != 2) {
            User::find($transaction->user_id)->update([
                'payment_deadline' => $transaction->date_end
            ]);
        }
        $transaction->update(['transaction_status_id' => $status]);
        $this->alert('success', 'Bermasil mengubah pembayaran');
        $this->emit('redirect', route('admin.transaction.confirmation-payment'));
    }

    public function render()
    {
        return view('livewire.transaction-detail');
    }
}
