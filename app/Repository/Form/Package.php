<?php

namespace App\Repository\Form;


use App\Repository\Form;


class Package extends \App\Models\Package implements Form
{
    protected $table = 'packages';

    public static function formRules(): array
    {
        return [
            "data.package_status_id" => 'required',
            'data.title' => 'required',
            'data.price' => 'required',
            'data.description' => 'required',
            'data.short_description' => 'required',
        ];
    }

    public static function formMessages(): array
    {
        return [];
    }


    public static function formField($params = null): array
    {
        return [
            [
                'title' => 'Nama Lengkap',
                'type' => 'text',
                'model' => 'title',
                'required' => true,
            ],
            [
                'title' => 'Harga',
                'type' => 'number',
                'model' => 'price',
                'required' => true,
            ],
            [
                'title' => 'Deskripsi',
                'type' => 'textarea',
                'model' => 'description',
                'required' => true,
            ],
            [
                'title' => 'Deskripsi singkat',
                'type' => 'textarea',
                'model' => 'short_description',
                'required' => true,
            ],
            [
                'title' => 'Status paket',
                'type' => 'select',
                'model' => 'package_status_id',
                'options' => [
                    ['value' => 1, 'title' => 'Aktif'],
                    ['value' => 2, 'title' => 'Tidak Aktif'],
                ],
                'required' => true,
            ],
        ];
    }
}
