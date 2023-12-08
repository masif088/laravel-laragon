<?php

namespace App\Repository\View;


use App\Models\Transaction;
use App\Repository\View;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class PaymentHistory extends Transaction implements View
{
    protected $table = "transactions";
    public static function extras($datas=null):string{
        $transaction=count($datas);
        $total = 0;
        foreach ($datas as $data){
            $total+=$data->money;
        }
        $total = 'Rp. '.thousand_format($total);
        return "
Jumlah Transaksi : $transaction <br>
Jumlah Uang : $total <br>
";
    }

    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
        $param1 = $params['param1'];
        $builder = static::query()->where('transaction_status_id','=',2);
        if (!empty($param1)) {
            $builder->whereDate('date_payment', 'like', '%' . $param1 . '%');
        }
        if (!empty($query)) {
            $builder->where(function ($q) use ($query) {
               $q->orWhereHas('user', function ($q) use ($query) {
                   $q->where('email', 'like', '%' . $query . '%')
                       ->orWhere('name', 'like', '%' . $query . '%');
               })
                   ->orWhereHas('package', function ($q) use ($query) {
                       $q->where('title', 'like', '%' . $query . '%');
                   })
                   ->orWhereHas('transactionStatus', function ($q) use ($query) {
                       $q->where('title', 'like', '%' . $query . '%');
                   })
                   ->orWhereHas('payment', function ($q) use ($query) {
                       $q->where('name', 'like', '%' . $query . '%');
                   })
                   ->orWhere('no_invoice', 'like', '%' . $query . '%');
            });
        }

        return $builder;
    }

    public static function tableView(): array
    {
        return [
            'searchable' => true,
        ];
    }

    public static function tableField(): array
    {
        $field=[['label' => 'Tanggal', 'sort' => 'date_payment'],
            ['label' => 'invoice', 'sort' => 'no_invoice'],
            ['label' => 'User Pengguna'],
            ['label' => 'Paket Pilihan'],
            ['label' => 'Nominal'],
            ];
//        if (auth()->user()->role==1){
//            $field[]=['label' => '#'];
//        }
        return $field;
    }

    public static function tableData($data = null): array
    {
        $user = $data->user;
        $field=[
            ['type' => 'string', 'data' => Carbon::parse($data->date_payment)->format('d-m-Y')],
            ['type' => 'string', 'data' => $data->no_invoice],
            ['type' => 'raw_html', 'data' => "
            <div class='flex'>
            <img src='$user->profile_photo_url' alt='' class='h-10 w-10 flex-none rounded-lg'>
            <div class='ml-2 flex-auto'>
            <div class='font-medium'>$user->name</div>
            <div class='text-slate-500'>$user->email</div></div></div>"],
            ['type' => 'raw_html', 'data' => $data->package->title.'<br>'."$data->month-$data->year"],
            ['type' => 'string', 'data' => "Rp. " . thousand_format($data->money)],

        ];
//        if (auth()->user()->role==1){
//            $field[]=['type' => 'raw_html', 'data' => "
//<div class='row'>
//<div class='mb-2 py-1 rounded-2xl bg-red-primary  text-[0.8125rem] font-semibold leading-5 text-white text-center'>
//<a href='#' wire:click='setCancelPayment($data->id,3)' class='' >Batalkan</a>
//</div>
//
//</div>
//"];
//        }

        return $field;
    }
}
