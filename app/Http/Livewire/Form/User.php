<?php

namespace App\Http\Livewire\Form;

use App\Repository\Form\UserTransaction;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class User extends Component
{
    use LivewireAlert;
    public $data;
    public $email;
    public $dataId;

    public $statusTransaction;
    public $model;
    public $action;
    public function mount(){
        $this->statusTransaction=0;
        $this->model=\App\Repository\Form\User::class;
        $this->data=form_model($this->model,$this->dataId,$this->action);

    }
    protected function getRules()
    {
        $rules=$this->model::formRules();

        if ($this->data['role']==3 and $this->statusTransaction==1) {
            $rules = array_merge($rules,UserTransaction::formRules());
        }

        return $rules;
    }

    public function create(){
        if (\App\Models\User::where('email','=',$this->data['email'])->first()!=null){
            $this->alert('error', 'email telah digunakan');
            return;
        }
        $this->validate();
        $this->resetErrorBag();
        $startDate=Carbon::now();
        $this->data['user_status_id']=1;
        if ($this->data['role']==3){
            $this->data['first_installation']=$startDate;
        }
        $this->data['password']=$this->data['password_show'];
        $this->data['password']=bcrypt($this->data['password']);
        $user=$this->model::create($this->data);
        if ($this->data['role']==3)
        {
            if ($this->statusTransaction){
                $this->data['user_id']=$user->id;
                $this->data['money']=\App\Models\Package::find($this->data['package_id'])->price;
                $this->data['transaction_status_id'] = 2;
                $this->data['no_invoice'] = \App\Repository\Form\Transaction::getCode();
                \App\Models\Transaction::create($this->data);
            }
        }
        $this->alert('success', 'Bermasil menambahkan pengguna baru');
        $this->emit('redirect',route('admin.users.index'));
    }
    public function update(){
        $this->validate();
        $this->resetErrorBag();
        $this->data['password']=$this->data['password_show'];
        $this->data['password']=bcrypt($this->data['password']);
        $this->model::find($this->dataId)->update($this->data);
        $this->alert('success', 'Bermasil menambahkan pengguna baru');
        $this->emit('redirect',route('admin.users.index'));
    }
    public function render()
    {
        return view('livewire.form.user');
    }
}
