<?php

namespace App\Repository\View;


use App\Models\Transaction;
use App\Repository\View;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class BillCustomer extends \App\Models\User implements View
{
    protected $table = "users";

    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
        $now
            =Carbon::now();

        return empty($query) ? static::query()->where('role', '=', 3)->whereDoesntHave('transactions', function ($q) use ($now) {
            $q->where('month', '=', $now->month)->where('year', '=', $now->year)->where('transaction_status_id','=',2);
        }) : static::
        where('role', '=', 3)->whereDoesntHave('transactions', function ($q) use ($now) {
            $q->where('month', '=', $now->month)->where('year', '=', $now->year)->where('transaction_status_id','=',2);
        })->where(function ($q) use ($query) {
            $q->where('name', 'like', '%' . $query . '%')->orWhere('email', 'like', '%' . $query . '%')->orWhere('address', 'like', '%' . $query . '%')->orWhereHas('userStatus', function ($q) use ($query) {
                $q->where('title', 'like', '%' . $query . '%');
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
            ['label' => 'Status', 'text-align' => 'center'],
            ['label' => 'Aksi'],
        ];
    }

    public static function tableData($data = null): array
    {
        $now = Carbon::now();
        $transaction = Transaction::where('user_id','=',$data->id)
            ->where('month','=',$now->month)
            ->where('year','=',$now->year)
            ->where('transaction_status_id','=',2)
            ->first();

        if ($transaction==null){
            $color = "bg-yellow-primary";
            $status='Tenggang';
        }else{
            $color = "bg-green-success";
            $status='Aktif';
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
            ['type' => 'raw_html', 'data' => "<div class='ml-8 rounded-2xl bg-red-primary px-3 py-2 text-[0.8125rem]  text-white text-center'>
<a href='$link' class='font-semibold leading-5'>Lakukan Penagihan</a>
</div>"],
        ];
    }
}
