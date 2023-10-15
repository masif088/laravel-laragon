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
            'data.type' => 'required',
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
                'title' => 'Jenis (Bank/EWallet)',
                'type' => 'text',
                'model' => 'type',
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
