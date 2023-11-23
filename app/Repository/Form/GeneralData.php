<?php

namespace App\Repository\Form;


use App\Repository\Form;


class GeneralData extends \App\Models\RagilnetData implements Form
{
    protected $table = 'ragilnet_datas';

    public static function formRules(): array
    {

        return [
            "data.phone_number" => 'required|max:255',
            "data.email" => 'required|max:255',
            "data.instagram" => 'required|max:255',
            "data.instagram_link" => 'required|max:255',
            "data.facebook" => 'required|max:255',
            "data.facebook_link" => 'required|max:255',
            "data.address" => 'required',
        ];
    }

    public static function formMessages(): array
    {
        return [];
    }


    public static function formField($params = null): array
    {
        //        'phone_number', 'email', 'instagram', 'instagram_link', 'facebook', 'facebook_link', 'address',
        return [
            [
                'title' => 'No HP',
                'type' => 'number',
                'model' => 'phone_number',
                'required' => true,
            ],
            [
                'title' => 'email',
                'type' => 'email',
                'model' => 'email',
                'required' => true,
            ],
            [
                'title' => 'instagram',
                'type' => 'text',
                'model' => 'instagram',
                'required' => true,
            ],
            [
                'title' => 'link Instagram',
                'type' => 'text',
                'model' => 'instagram_link',
                'required' => true,
            ],

            [
                'title' => 'facebook',
                'type' => 'text',
                'model' => 'facebook',
                'required' => true,
            ],
            [
                'title' => 'facebook Instagram',
                'type' => 'text',
                'model' => 'facebook_link',
                'required' => true,
            ],
            [
                'title' => 'Alamat',
                'type' => 'textarea',
                'model' => 'address',
                'required' => true,
            ],
        ];
    }
}
