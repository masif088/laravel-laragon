<?php

namespace App\Http\Livewire\Form;


use App\Repository\Form\User;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Transaction extends Component
{
    use LivewireAlert;

    public $data;
    public $dataId;
    public $model;
    public $action;

    public function mount()
    {
        $this->model = \App\Repository\Form\Transaction::class;
        $this->data = form_model($this->model, $this->dataId);
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        $user = User::find($this->data['user_id']);
        if ($user->user_status_id != 1) {
            $startDate = Carbon::now();
            $user->update([
                'user_status_id'=>1
            ]);
        } else {
            $startDate = Carbon::parse($user->payment_deadline);
        }
        $this->data['date_start'] = $startDate;
        $this->data['date_end'] = $startDate->addMonth();
        $this->data['transaction_status_id'] = 2;
        $this->data['no_invoice'] = \App\Repository\Form\Transaction::getCode();
        $this->model::create($this->data);
        $user = User::find($this->data['user_id']);
        $user->update([
            'payment_deadline' => $startDate->addMonth()
        ]);
        $this->alert('success', 'Bermasil menambahkan pembayaran baru');
        $this->emit('redirect', route('admin.transaction.payment-history'));
    }

    public function render()
    {
        return view('livewire.form.transaction');
    }

    protected function getRules()
    {
        return $this->model::formRules();
    }
}
