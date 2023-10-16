<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class RecapitulationTransaction extends Component
{
    public $dateStart;
    public $dateEnd;
    public function mount(){
        $this->dateStart=Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->dateEnd=Carbon::now()->endOfMonth()->format('Y-m-d');
    }

    public function download()
    {
        $this->validate();
        $this->resetErrorBag();
        $this->emit('redirect:new', route('admin.download.transaction', [$this->dateStart, $this->dateEnd]));
    }

    public function render()
    {
        return view('livewire.recapitulation-transaction');
    }

    protected function getRules()
    {
        return [
            'dateStart' => 'date|required',
            'dateEnd' => 'date|required'
        ];
    }
}
