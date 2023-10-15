<?php

namespace App\Repository\View;


use App\Models\Transaction;
use App\Repository\View;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;


class Package extends \App\Models\Package implements View
{
    protected $table = "packages";

    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
        return empty($query) ? static::query()
            : static::query()
                ->where('title', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%')
                ->orWhere('short_description', 'like', '%' . $query . '%')
                ->orWhere('price', 'like', '%' . $query . '%')
                ->orWhereHas('packageStatus', function ($q) use ($query) {
                    $q->where('title', 'like', '%' . $query . '%');
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
            ['label' => '#','sort'=>'id'],
            ['label' => 'Nama Paket', 'width' => '25%','sort'=>'title'],
            ['label' => 'Harga','sort'=>'price'],
            ['label' => 'Penjelaskan Singkat','sort'=>'short_description'],
            ['label' => 'Status', 'text-align' => 'center', 'sort'=>'package_status_id'],
            ['label' => 'Pengguna Aktif', 'width' => '15%'],
            ['label' => ''],
        ];
    }

    public static function tableData($data = null): array
    {
        if ($data->package_status_id==1) {
            $color = "bg-green-success";
            $status="Aktif";
        } else {
            $color = "bg-red-primary";
            $status="Tidak Aktif";
        }

        $link = route('admin.packages.edit',$data->id);

        $count='';
        $now = Carbon::now();
        $t= Transaction::where('package_id','=',$data->id)->whereDate('date_start','<',$now)->whereDate('date_end','>',$now)->get()->count();

        return [
            ['type' => 'index'],
            ['type' => 'string', 'data' => $data->title],
            ['type' => 'string', 'data' => "Rp. " .thousand_format($data->price)],
            ['type' => 'raw_html', 'data' => Str::limit($data->short_description,50,'...')],
            ['type' => 'raw_html', 'data' => "<div class='ml-8 rounded-2xl $color px-3 py-2 text-[0.8125rem] font-semibold leading-5 text-white text-center'>$status</div>"],
            ['type' => 'string', 'data' => $t,'text-align'=>'center'],
            ['type' => 'raw_html', 'data' => "<a href='$link' class='ml-8 rounded-2xl bg-red-primary px-3 py-2 text-[0.8125rem] font-semibold leading-5 text-white text-center'>Ubah</a>"],
        ];
    }
}
