<?php

namespace App\Repository\Form;


use App\Repository\Form;


class Payment extends \App\Models\Payment implements Form
{
    protected $table = 'payments';

    public static function formRules(): array
    {
        return [
            "data.name" => 'required',
            'data.no_reference' => 'required',
            'data.on_behalf' => 'required',
        ];
    }

    public static function formMessages(): array
    {
        return [];
    }


    public static function formField($params = null): array
    {
        //        'name', 'no_reference', 'type', 'note',
        return [
            [
                'title' => 'Nama Bank/E-Wallet',
                'type' => 'text',
                'model' => 'name',
                'required' => true,
            ],
            [
                'title' => 'Nomer Rekening/HP',
                'type' => 'text',
                'model' => 'no_reference',
                'required' => true,
            ],
            [
                'title' => 'Atas Nama',
                'type' => 'text',
                'model' => 'on_behalf',
                'required' => true,
            ],
            [
                'title' => 'Catatan',
                'type' => 'textarea',
                'model' => 'note',
                'required' => false,
            ],
        ];
    }
}
