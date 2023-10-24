<?php

namespace App\Repository\View;


use App\Repository\View;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class RecapCustomer extends \App\Models\User implements View
{
    protected $table = "users";
    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
        return empty($query) ? static::query()->where('role','=',3)->whereIn('user_status_id',$params['param1'])
            : static::
            where('role','=',3)
                ->whereIn('user_status_id',$params['param1'])
                ->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%')
                    ->orWhere('address', 'like', '%' . $query . '%')
                    ->orWhereHas('userStatus', function ($q) use ($query) {
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
            ['label' => 'User Pengguna', 'sort' => 'name'],
            ['label' => 'Alamat', 'sort' => 'address'],
            ['label' => 'Tanggal Tenggang', 'sort' => 'payment_deadline','text-align'=>'center'],
            ['label' => 'Status', 'sort' => 'user_status_id'],
            ['label' => 'Pemasangan Awal', 'sort' => 'first_installation','text-align'=>'center'],
            ['label' => '#'],
        ];
    }

    public static function tableData($data = null): array
    {
        $status=$data->userStatus;
        if ($data->user_status_id==1) {
            $color="bg-green-success";
        } elseif($data->user_status_id==2) {
            $color="bg-yellow-primary";
        }else {
            $color="bg-red-primary";
        }
        $link=route('admin.transaction.recapitulation.show',$data->id);
        return [

            ['type' => 'raw_html', 'data' => "
            <div class='flex'>
            <img src='$data->profile_photo_url' alt='' class='h-10 w-10 flex-none rounded-lg'>
            <div class='ml-2 flex-auto'>
            <div class='font-medium'>$data->name</div>
            <div class='text-slate-500'>$data->email</div></div></div>"],
            ['type' => 'string', 'data' => $data->address],
            ['type' => 'string', 'data' => $data->payment_deadline,'text-align'=>'center'],
            ['type' => 'raw_html', 'text-align'=>'center', 'data' => "<div class='ml-8 rounded-2xl $color px-3 py-2 text-[0.8125rem] font-semibold leading-5 text-white text-center'>$status->title</div>"],
            ['type' => 'string', 'text-align'=>'center', 'data' => $data->first_installation],
            ['type' => 'raw_html', 'data' => "<a href='$link' class='ml-8 rounded-2xl bg-green-success px-5 py-2 text-[0.8125rem] font-semibold leading-5 text-white text-center'>Lihat</a>"],
        ];
    }
}
