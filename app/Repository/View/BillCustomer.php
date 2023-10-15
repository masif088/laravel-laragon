<?php

namespace App\Repository\View;


use App\Repository\View;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class BillCustomer extends \App\Models\User implements View
{
    protected $table = "users";

    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
        return empty($query) ? static::query()->where('role', '=', 3)
            : static::query()->where('role', '=', 3)
                ->where(function ($q) use ($query) {

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
            ['label' => 'Status', 'text-align' => 'center'],
            ['label' => 'Tenggat waktu', 'text-align' => 'center'],
            ['label' => ''],
        ];
    }

    public static function tableData($data = null): array
    {
        if (Carbon::now() < Carbon::parse($data->payment_deadline)) {
            $status = "Sudah Membayar";
            $color = "bg-green-success";
        } else {
            $status = "Belum Membayar";
            $color = "bg-red-primary";
        }
        $user = $data;
        $link = route('admin.transaction.bill-customer-user',$user->id);
        return [

            ['type' => 'raw_html', 'data' => "
            <div class='flex'>
            <img src='$user->profile_photo_url' alt='' class='h-10 w-10 flex-none rounded-lg'>
            <div class='ml-2 flex-auto'>
            <div class='font-medium'>$user->name</div>
            <div class='text-slate-500'>$user->email</div></div></div>"],
            ['type' => 'string', 'data' => $user->address],
            ['type' => 'raw_html', 'data' => "<div class='ml-8 rounded-2xl $color px-3 py-2 text-[0.8125rem] font-semibold leading-5 text-white text-center'>$status</div>"],
            ['type' => 'string', 'text-align' => 'center', 'data' => $user->payment_deadline],
            ['type' => 'raw_html', 'data' => "<a href='$link' class='ml-8 rounded-2xl bg-red-primary px-3 py-2 text-[0.8125rem] font-semibold leading-5 text-white text-center'>Lakukan Penagihan</a>"],
        ];
    }
}
