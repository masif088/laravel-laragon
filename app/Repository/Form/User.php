<?php

namespace App\Repository\Form;


use App\Models\UserStatus;
use App\Repository\Form;


class User extends \App\Models\User implements Form
{
    protected $table = 'users';

    public static function formRules(): array
    {
        return [
            "data.name" => 'required',
            'data.email' => 'required|email',
            'data.no_phone' => 'required',
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
        if (auth()->user()->role==1){
            $role=[
                ['value' => 1, 'title' => 'Admin'],
                ['value' => 2, 'title' => 'Pegawai'],
                ['value' => 3, 'title' => 'Pengguna'],
            ];
        }else{
            $role=[
                ['value' => 3, 'title' => 'Pengguna'],
            ];
        }
        $active=eloquent_to_options(UserStatus::get());
        $data=[
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
                'title' => 'No HP',
                'type' => 'string',
                'model' => 'no_phone',
                'required' => true,
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

        if ($params=="create"){
            $data[]=
                [
                    'title' => 'Sebagai',
                    'type' => 'select',
                    'model' => 'role',
                    'options' => $role,
                    'required' => false,
                ];
        }
        if (auth()->user()->role==1){
            $data[]=[
                'title' => 'Keaktifan User',
                'type' => 'select',
                'model' => 'user_status_id',
                'options' => $active,
                'required' => true,
            ];
        }

        return $data;
    }
}
