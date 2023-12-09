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
        $this->data['year']=Carbon::now()->year;
        $this->data['month']=Carbon::now()->month;
    }

    public function create()
    {

        $this->validate();
        $this->resetErrorBag();
        $user = User::find($this->data['user_id']);
        if ($user->user_status_id != 1) {
            $user->update([
                'user_status_id'=>1
            ]);
        }
        $this->data['transaction_status_id'] = 2;
        $this->data['no_invoice'] = \App\Repository\Form\Transaction::getCode();
        $this->data['money']=\App\Models\Package::find($this->data['package_id'])->price;

        $this->model::create($this->data);

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
