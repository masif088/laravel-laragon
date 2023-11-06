<?php

namespace App\Repository\View;


use App\Models\Transaction;
use App\Repository\View;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class DailyTransaction extends \App\Models\Transaction implements View
{
    protected $table = "transactions";

    public static function tableSearch($params = null): Builder
    {

        return
            static::query()
                ->where('transaction_status_id', '=', 2)
                ->selectRaw('sum(money) as money')
                ->selectRaw('count(id) as total')
                ->selectRaw('date_payment')
                ->groupBy('date_payment');

    }

    public static function tableView(): array
    {
        return [
            'searchable' => false,
        ];
    }

    public static function tableField(): array
    {
        return [
            ['label' => 'User Pengguna', 'width' => '25%'],
            ['label' => 'Address'],
            ['label' => 'Metode Pembayaran'],
            ['label' => 'Tanggal Pembayaran', 'text-align' => 'center'],
            ['label' => ''],
        ];
    }


    public static function tableData($data = null): array
    {

        return [
            ['type' => 'string', 'data' => '$user->address'],



        ];
    }
}
