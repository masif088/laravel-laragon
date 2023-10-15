<?php

namespace App\Repository\View;


use App\Models\Transaction;
use App\Repository\View;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class ConfirmationPayment extends \App\Models\Transaction implements View
{
    protected $table = "transactions";
//'user_id', 'package_id', 'payment_id', 'transaction_status_id', 'date_payment',
// 'money', 'date_start', 'date_end', 'no_invoice', 'created_at', 'updated_at'

    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
        return empty($query) ? static::query()->where('transaction_status_id', '=', 1)
            : static::query()->where('transaction_status_id', '=', 1)
                ->where(function ($q) use ($query) {
                    $q->whereHas('user',function ($q2) use ($query) {
                        $q2->where('name', 'like', '%' . $query . '%')
                            ->orWhere('email', 'like', '%' . $query . '%')
                        ;
                    })->whereHas('package',function ($q2) use ($query) {
                        $q2->where('name', 'like', '%' . $query . '%');
                    });
                });
    }

    public static function tableView(): array
    {
        return [
            'searchable' => true,
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
        $user = $data->user;
        $link = route('admin.transaction.confirmation-payment.detail',$data->id);
        return [
            ['type' => 'raw_html', 'data' => "
            <div class='flex'>
            <img src='$user->profile_photo_url' alt='' class='h-10 w-10 flex-none rounded-lg'>
            <div class='ml-2 flex-auto'>
            <div class='font-medium'>$user->name</div>
            <div class='text-slate-500'>$user->email</div></div></div>"],
            ['type' => 'string', 'data' => $user->address],
            ['type' => 'raw_html', 'data' => $data->payment->name. ' - '.$data->payment->no_reference],
            ['type' => 'string', 'text-align' => 'center', 'data' => $data->date_payment],
            ['type' => 'raw_html', 'data' => "
<div class='row'>
<div class='mb-2 py-1 rounded-2xl bg-green-success  text-[0.8125rem] font-semibold leading-5 text-white text-center'>
<a href='$link' ='setConfirmation($data->id,2)' class='' >Lihat detail</a>
</div>

</div>
"],
        ];
    }
}
