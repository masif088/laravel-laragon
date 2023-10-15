<?php

namespace App\Http\Livewire\Form;


use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Package extends Component
{
    use LivewireAlert;

    public $data;
    public $dataId;
    public $action;
    public $model;

    public function mount()
    {
        $this->model = \App\Repository\Form\Package::class;
        $this->data = form_model($this->model, $this->dataId);
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        $this->model::create($this->data);
        $this->alert('success', 'Bermasil menambahkan paket baru');
        $this->emit('redirect', route('admin.packages.index'));
    }
    public function update()
    {
        $this->validate();
        $this->resetErrorBag();
        $this->model::find($this->dataId)->update($this->data);
        $this->alert('success', 'Bermasil mengubah paket baru');
        $this->emit('redirect', route('admin.packages.index'));
    }

    public function render()
    {
        return view('livewire.form.package');
    }

    protected function getRules()
    {
        return $this->model::formRules();
    }
}
