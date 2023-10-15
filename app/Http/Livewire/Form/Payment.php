<?php

namespace App\Http\Livewire\Form;


use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Payment extends Component
{
    use LivewireAlert;
    public $data;
    public $dataId;
    public $action;
    public $model;
    public function mount(){
        $this->model=\App\Repository\Form\Payment::class;
        $this->data=form_model($this->model,$this->dataId);
    }
    protected function getRules()
    {
        return $this->model::formRules();
    }
    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        $this->model::create($this->data);
        $this->alert('success', 'Bermasil menambahkan metode pembayaran');
        $this->emit('redirect', route('admin.payment.index'));
    }
    public function update()
    {
        $this->validate();
        $this->resetErrorBag();
        $this->model::find($this->dataId)->update($this->data);
        $this->alert('success', 'Bermasil mengubah metode pembayaran');
        $this->emit('redirect', route('admin.payment.index'));
    }


    public function render()
    {
        return view('livewire.form.payment');
    }
}
