<?php

namespace App\Repository\View;


use App\Repository\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;


class Payment extends \App\Models\Payment implements View
{
    protected $table = "payments";

    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
        return empty($query) ? static::query()
            : static::query()
                ->where('name', 'like', '%' . $query . '%')
                ->orWhere('type', 'like', '%' . $query . '%');

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
            ['label' => 'Nama', 'width' => '25%','sort'=>'name'],
            ['label' => 'Nomer Rekening','sort'=>'no_reference'],
            ['label' => 'Jenis','sort'=>'type'],
            ['label' => ''],
        ];
    }

    public static function tableData($data = null): array
    {
        $link = route('admin.payment.edit',$data->id);
        return [
            ['type' => 'index'],
            ['type' => 'string', 'data' => $data->name],
            ['type' => 'string', 'data' => $data->no_reference],
            ['type' => 'string', 'data' => $data->on_behalf],
            ['type' => 'raw_html', 'data' => "<a href='$link' class='ml-8 rounded-2xl bg-red-primary px-3 py-2 text-[0.8125rem] font-semibold leading-5 text-white text-center'>Ubah</a>"],
        ];
    }
}
