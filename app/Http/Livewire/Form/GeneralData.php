<?php

namespace App\Http\Livewire\Form;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class GeneralData extends Component
{
    use LivewireAlert;

    public $data;
    public $dataId=1;
    public $action;
    public $model;

    public function mount()
    {
        $this->model = \App\Repository\Form\GeneralData::class;
        $this->data = form_model($this->model, $this->dataId);
    }


    public function update()
    {
        $this->validate();
        $this->resetErrorBag();
        $this->model::find($this->dataId)->update($this->data);
        $this->alert('success', 'Bermasil mengubah data informasi umum');
        $this->emit('redirect', route('admin.dashboard'));
    }


    protected function getRules()
    {
        return $this->model::formRules();
    }

    public function render()
    {
        return view('livewire.form.general-data');
    }
}
