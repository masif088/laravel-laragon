<?php

namespace App\Http\Livewire\Form;

use App\Repository\Form\Transaction;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CancelTransaction extends Component
{
    use LivewireAlert;
    public $repo;
    public $data;
    public $optionTransaction;

    public function mount()
    {
        $this->data['package_status_id'] = null;
        $this->optionTransaction = [];
        $transactions = \App\Models\Transaction::whereIn('transaction_status_id',[1,2])->orderByDesc('id')->get();
        foreach ($transactions as $transaction) {
            $this->optionTransaction[] = ['title' => $transaction->no_invoice . '-' . $transaction->package->title . " (Rp." . thousand_format($transaction->money) . " )", 'value' => $transaction->id];
        }
        $this->repo = ['title' => 'Pilih transaksi', 'type' => 'select', 'model' => 'package_status_id', 'options' => $this->optionTransaction, 'required' => true,];
    }


    public function submit()
    {
        $this->validate();
        $transaction = Transaction::find($this->data['package_status_id']);
        $transaction->update(['transaction_status_id' => 3]);
        $this->alert('success', 'Bermasil membatalkan transaksi');
        $this->emit('redirect', route('admin.transaction.payment-history'));

    }

    public function render()
    {
        return view('livewire.form.cancel-transaction');
    }

    protected function getRules()
    {
        return ['data.package_status_id' => 'required'];
    }
}
