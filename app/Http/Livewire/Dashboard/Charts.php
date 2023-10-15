<?php

namespace App\Http\Livewire\Dashboard;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Charts extends Component
{
    public $chartIncome;
    public $chartUser;
    public $categories;
    public $now;

    public function mount()
    {
        $this->now = Carbon::now();
        $this->categories=['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $t = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0,];
        $transactions = DB::table('transactions')
            ->where('transaction_status_id', '=', 2)
            ->whereYear('date_payment', '=', $this->now->year)
            ->select(DB::raw('sum(money) as `total`'),
                DB::raw('MONTH(date_payment) month'))
            ->groupby('month')
            ->get();
        foreach ($transactions as $transaction) {
            $t[$transaction->month] = $transaction->total;
        }
        $this->chartIncome = [
            'type' => 'line',
            'height' => '300',
            'categories' => $this->categories,
            'data' => [
                ['label' => 'Total', 'value' => $t],
            ]
        ];

        $u = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0, 7 => 0, 8 => 0, 9 => 0, 10 => 0, 11 => 0, 12 => 0,];
        $users = DB::table('users')
            ->where('role', '=', 3)
            ->whereYear('first_installation', '=', $this->now->year)
            ->select(DB::raw('count(id) as `total`'),
                DB::raw('MONTH(first_installation) month'))
            ->groupby('month')
            ->get();
        foreach ($users as $user) {
            $u[$user->month] = $user->total;
        }
        $this->chartUser = [
            'type' => 'line',
            'height' => '300',
            'categories' => $this->categories,
            'data' => [
                ['label' => 'Total', 'value' => $u],
            ]
        ];

    }

    public function render()
    {
        return view('livewire.dashboard.charts');
    }
}
