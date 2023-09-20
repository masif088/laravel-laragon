<?php

namespace App\Repository\View;


use App\Repository\View;
use Illuminate\Database\Eloquent\Builder;


class User extends \App\Models\User implements View
{
    public static function tableSearch($params = null): Builder
    {
        $query = $params['query'];
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%')
                ->orWhere('email', 'like', '%' . $query . '%');
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
            ['label' => '#', 'sort' => 'id', 'width' => '7%'],
            ['label' => 'Name', 'sort' => 'name'],
            ['label' => 'Email', 'sort' => 'email'],
            ['label' => 'Role', 'sort' => 'role'],
            ['label' => 'Action'],
        ];
    }

    public static function tableData($data = null): array
    {
        return [
            ['type' => 'index'],
            ['type' => 'string', 'data' => $data->name],
            ['type' => 'string', 'data' => $data->email],
            ['type' => 'thousand_format', 'data' => $data->role],
            ['type' => 'action', 'data' =>
                [
                    ['title' => 'Edit', 'icon' => 'fa fa-eye', 'bg'=>"rose", 'link' => "#"],
                    ['title' => 'Hapus', 'icon' => 'fa fa-trash', 'live' => 'delete'],
                ],
            ],
        ];
    }
}
