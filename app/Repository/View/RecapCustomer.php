<?php

namespace App\Repository\View;


use App\Models\Transaction;
use App\Repository\View;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class RecapCustomer extends \App\Models\User implements View
{
    protected $table = "users";

    public static function tableSearch($params = null): Builder
    {
//        dd($params);
        $now = Carbon::now();
        $query = $params['query'];
        if ($params['param1'] == 1) {
            return empty($query) ? static::query()->where('role', '=', 3)
                ->where('user_status_id','=',1) : static::where('role', '=', 3)
                ->where('user_status_id','=',1)
                ->where(function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%')->orWhere('email', 'like', '%' . $query . '%')->orWhere('address', 'like', '%' . $query . '%')->orWhereHas('userStatus', function ($q) use ($query) {
                            $q->where('title', 'like', '%' . $query . '%');
                        });
                });
        }
        elseif ($params['param1'] == 2) {
            return empty($query) ? static::query()->where('role', '=', 3)
                ->where('user_status_id','=',1)
                ->whereHas('transactions', function ($q) use ($now) {
                    $q->where('month', '=', $now->month)->where('year', '=', $now->year)
                    ->where('transaction_status_id',2);
                }) : static::
            where('role', '=', 3)->where('user_status_id','=',1)->whereHas('transactions', function ($q) use ($now) {
                    $q->where('month', '=', $now->month)
                        ->where('year', '=', $now->year)
                        ->where('transaction_status_id',2);
                })->where(function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%')->orWhere('email', 'like', '%' . $query . '%')->orWhere('address', 'like', '%' . $query . '%')->orWhereHas('userStatus', function ($q) use ($query) {
                            $q->where('title', 'like', '%' . $query . '%');
                        });
                });
        } elseif ($params['param1'] == 3) {

            return empty($query) ? static::query()->where('role', '=', 3)->where('user_status_id','=',1)
                ->where('user_status_id','=',1)->whereDoesntHave('transactions', function ($q) use ($now) {
                    $q->where('month', '=', $now->month)->where('year', '=', $now->year)->where('transaction_status_id',2);;
                }) : static::
            where('role', '=', 3)->whereDoesntHave('transactions', function ($q) use ($now) {
                    $q->where('month', '=', $now->month)->where('year', '=', $now->year)->where('transaction_status_id',2);;
                })->where(function ($q) use ($query) {
                    $q->where('name', 'like', '%' . $query . '%')->orWhere('email', 'like', '%' . $query . '%')->orWhere('address', 'like', '%' . $query . '%')->orWhereHas('userStatus', function ($q) use ($query) {
                            $q->where('title', 'like', '%' . $query . '%');
                        });
                });
        }else{
            return empty($query) ? static::query()->where('role', '=', 3)->where('user_status_id','=',3) : static::
            where('role', '=', 3)->whereDoesntHave('transactions', function ($q) use ($now) {
                $q->where('month', '=', $now->month)->where('year', '=', $now->year)->where('transaction_status_id',2);;
            })->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')->orWhere('email', 'like', '%' . $query . '%')->orWhere('address', 'like', '%' . $query . '%')->orWhereHas('userStatus', function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%');
                });
            });
        }
    }

    public static function tableView(): array
    {
        return ['searchable' => true,];
    }

    public static function tableField(): array
    {
        return [['label' => 'User Pengguna', 'sort' => 'name'], ['label' => 'Alamat', 'sort' => 'address'],  ['label' => 'Status', 'sort' => 'user_status_id'], ['label' => 'Pemasangan Awal', 'sort' => 'first_installation', 'text-align' => 'center'], ['label' => '#'],];
    }

    public static function tableData($data = null): array
    {
        $status = $data->userStatus;
        $now = Carbon::now();
        $transaction = Transaction::where('user_id','=',$data->id)
            ->where('month','=',$now->month)
            ->where('year','=',$now->year)
            ->where('transaction_status_id',2)
            ->first();

        if ($transaction==null){
            $color = "bg-yellow-primary";
            $title='Tenggang';
        }else{
            $color = "bg-green-success";
            $title='Aktif';
        }


        $link = route('admin.transaction.recapitulation.show', $data->id);
        $link2 = route('admin.users.edit', $data->id);


        return [
            ['type' => 'raw_html', 'data' => "
            <div class='flex'>
            <img src='$data->profile_photo_url' alt='' class='h-10 w-10 flex-none rounded-lg'>
            <div class='ml-2 flex-auto'>
            <div class='font-medium'>$data->name</div>
            <div class='text-slate-500'>$data->email</div></div></div>"], ['type' => 'string', 'data' => $data->address], ['type' => 'raw_html', 'text-align' => 'center', 'data' => "<div class='ml-8 rounded-2xl $color px-3 py-2 text-[0.8125rem] font-semibold leading-5 text-white text-center'>$title</div>"], ['type' => 'string', 'text-align' => 'center', 'data' => $data->first_installation], ['type' => 'raw_html', 'data' => "<a href='$link' class='ml-8 rounded-2xl bg-green-success px-5 py-2 text-[0.8125rem] font-semibold leading-5 text-white text-center'>Lihat</a>
<a href='$link2' class='ml-8 rounded-2xl bg-yellow-primary px-5 py-2 text-[0.8125rem] font-semibold leading-5 text-white text-center'>Edit</a>
"],];
    }
}
