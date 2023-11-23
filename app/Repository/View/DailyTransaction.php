<?php

namespace App\Repository\View;


use App\Models\Transaction;
use App\Repository\View;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class DailyTransaction extends Transaction implements View
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
            ['label' => 'Tanggal', 'text-align' => 'center'],
            ['label' => 'Jumlah Transaksi', 'text-align' => 'center'],
            ['label' => 'Jumlah Transaksi', 'text-align' => ''],
            ['label' => 'Catatan Pembayaran', 'text-align' => ''],
            ['label' => 'Aksi', 'text-align' => ''],
        ];
    }


    public static function tableData($data = null): array
    {
        $note = "";
        foreach (Payment::get() as $payment) {
            $total = Transaction::where('payment_id', '=', $payment->id)->where('date_payment', '=', $data->date_payment)->where('transaction_status_id', '=', 2)->sum('money');
            if ($total != 0) {
                $n = thousand_format($total);
                $note .= "$payment->name : Rp. $n <br>";
            }
        }

        return [

            ['type' => 'string', 'text-align'=>'center','data' => Carbon::parse($data->date_payment)->format('d/m/Y')],
            ['type' => 'string', 'text-align'=>'center','data' => $data->total . ' transaksi'],
            ['type' => 'string','data' => "Rp. " . thousand_format($data->money)],
            ['type' => 'raw_html', 'data' => $note],
            ['type' => 'action', 'data' =>
                [
            ['title' => 'Detail', 'icon' => 'fa fa-eye', 'bg'=>"blue", 'link' => route('admin.transaction.daily.show',Carbon::parse($data->date_payment)->format('Y-m-d'))],
]]

        ];
    }
}
