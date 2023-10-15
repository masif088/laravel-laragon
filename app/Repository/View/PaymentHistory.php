<?php

namespace App\Repository\View;


use App\Models\Transaction;
use App\Repository\View;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class PaymentHistory extends Transaction implements View
{
    protected $table = "transactions";
    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
        return empty($query) ? static::query()
            : static::where('date_payment', 'like', '%' . $query . '%')
                ->orWhereHas('user', function ($q) use ($query) {
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
            ['label' => 'Tanggal', 'sort' => 'date_payment'],
            ['label' => 'invoice', 'sort' => 'no_invoice'],
            ['label' => 'User Pengguna'],
            ['label' => 'Paket Pilihan'],
            ['label' => 'Nominal'],
            ['label' => '#'],
        ];
    }

    public static function tableData($data = null): array
    {
        $user=$data->user;


        return [
            ['type' => 'string', 'data' => Carbon::parse($data->payment_date)->format('d/m/Y')],
            ['type' => 'string', 'data' => $data->no_invoice],
            ['type' => 'raw_html', 'data' => "
            <div class='flex'>
            <img src='$user->profile_photo_url' alt='' class='h-10 w-10 flex-none rounded-lg'>
            <div class='ml-2 flex-auto'>
            <div class='font-medium'>$user->name</div>
            <div class='text-slate-500'>$user->email</div></div></div>"],
            ['type' => 'string', 'data' => $data->package->title],
            ['type' => 'string', 'data' => "Rp. ".thousand_format($data->money)],
            ['type' => 'action', 'data' =>
                [
                    ['title' => 'Edit', 'icon' => 'fa fa-pencil', 'bg' => "primary", 'link' => route('admin.transaction.edit',$data->id)],
                ],
            ],
        ];
    }
}
