<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;

use Livewire\Component;

class Cards extends Component
{
    public $income = [];
    public $billCustomer;
    public $user;
    public $newUser;

    public function mount(){
        $now= Carbon::now();
        $income = Transaction::whereDate('date_payment','=',$now)
            ->where('transaction_status_id','=',2)
            ->get()->sum('money');
        $incomeYesterday = Transaction::whereDate('date_payment','=',$now->subDay())
            ->where('transaction_status_id',2)
            ->get()->sum('money');
        $this->income[]=$income;
        $this->income[]=$incomeYesterday;
        $billCustomer = User::where('role', '=', 3)->where('user_status_id','=',1)
            ->where('user_status_id','=',1)->whereDoesntHave('transactions', function ($q) use ($now) {
                $q->where('month', '=', $now->month)->where('year', '=', $now->year)->where('transaction_status_id','=',2);
            })->get()->count();
        $this->billCustomer=$billCustomer;
        $this->user= User::where('role','=',3)->where('user_status_id','=',1)->get()->count();
        $now= Carbon::now();
        $this->newUser=User::whereRole(3)>where('user_status_id','=',1)
            ->whereBetween('first_installation',[$now->startOfWeek()->format('Y-m-d'),$now->endOfWeek()->format('Y-m-d')])
            ->get()->count();
    }

    public function getFluctuation($data){
        if ($data[0]==$data[1]){
            return "flat";
        }elseif ($data[0]>$data[1]){
            return "increase";
        }else{
            return "decrease";
        }
    }

    public function getFluctuationNote($data){
        if ($data[0]==$data[1]){
            return "Tetap";
        }elseif ($data[0]>$data[1]){
            return "Naik";
        }else{
            return "Turun";
        }
    }
    public function getFluctuationValue($data){
        if ($data[1]==0){
            return '-';
        }
        if ($data[0]>$data[1]){
            return ($data[0]-$data[1])/$data[1];
        }else{
            return ($data[1]-$data[0])/$data[1];
        }
    }
    public function render()
    {
        return view('livewire.dashboard.cards');
    }
}
