<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class DailyTransaction extends Component
{

    public function mount(){
//        $query= "SELECT date_payment,sum(money) FROM transactions GROUP BY date_payment";

    }

    public function render()
    {
        $datas=Transaction::query()->selectRaw('sum(money) as money')
            ->selectRaw('count(id) as total')
            ->selectRaw('date_payment')
            ->groupBy('date_payment')
            ->paginate(10);
//        dd($data);
        return view('livewire.daily-transaction',compact('datas'));
    }
}
