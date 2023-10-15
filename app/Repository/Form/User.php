<?php

namespace App\Repository\Form;


use App\Repository\Form;


class User extends \App\Models\User implements Form
{
    protected $table = 'users';

    public static function formRules(): array
    {
        return [
            "data.name" => 'required',
            'data.email' => 'required|email',
            'data.role' => 'required',
            'data.password' => 'required',
            'data.address' => 'required',
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
                'model' => 'name',
                'required' => true,
            ],
            [
                'title' => 'Email',
                'type' => 'email',
                'model' => 'email',
                'required' => true,
            ],
            [
                'title' => 'Sebagai',
                'type' => 'select',
                'model' => 'role',
                'options' => [
                    ['value' => 1, 'title' => 'Admin'],
                    ['value' => 2, 'title' => 'Pegawai'],
                    ['value' => 3, 'title' => 'Pengguna'],
                ],
                'required' => false,
            ],
            [
                'title' => 'Password',
                'type' => 'password',
                'model' => 'password',
                'required' => false,
                'placeholder' => '',
            ],
            [
                'title' => 'Alamat',
                'type' => 'textarea',
                'model' => 'address',
                'required' => false,
                'placeholder' => '',
            ],
        ];
    }
}
