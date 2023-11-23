<?php

namespace App\Http\Livewire\Form;

use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class User extends Component
{
    use LivewireAlert;
    public $data;
    public $dataId;
    public $model;
    public $action;
    public function mount(){
        $this->model=\App\Repository\Form\User::class;
        $this->data=form_model($this->model,$this->dataId,$this->action);
    }
    protected function getRules()
    {
        return $this->model::formRules();
    }

    public function create(){
        $this->validate();
        $this->resetErrorBag();
        if ($this->data['role']==3){
            $this->data['user_status_id']=2;
            $this->data['first_installation']=Carbon::now();
            $this->data['payment_deadline']=Carbon::now();
        }
        $this->data['password']=bcrypt($this->data['password']);
        $this->model::create($this->data);
        $this->alert('success', 'Bermasil menambahkan pengguna baru');
        $this->emit('redirect',route('admin.users.index'));
    }
    public function update(){
        $this->validate();
        $this->resetErrorBag();
        $this->model::find($this->dataId)->update($this->data);
        $this->alert('success', 'Bermasil menambahkan pengguna baru');
        $this->emit('redirect',route('admin.users.index'));
    }
    public function render()
    {
        return view('livewire.form.user');
    }
}
