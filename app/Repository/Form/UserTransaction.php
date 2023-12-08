<?php

namespace App\Repository\Form;


use App\Models\Package;
use App\Models\Payment;
use App\Repository\Form;
use Carbon\Carbon;


class UserTransaction extends \App\Models\Transaction implements Form
{
    protected $table = 'transactions';

    public static function getCode(): string
    {
        $now = Carbon::now();
        $count = \App\Models\Transaction::whereMonth('date_payment', $now->month)->whereYear('date_payment', $now->year)->get()->count();
        $count = str_pad($count + 1, 3, '0', STR_PAD_LEFT);
        $date = $now->format('Ymd');
        return "RG$date$count";
    }

    public static function formRules(): array
    {
        return [
            'dataPackage.package_id' => 'required',
            'dataPackage.payment_id' => 'required',
            'dataPackage.date_payment' => 'required',
            'dataPackage.money' => 'required',
        ];
    }

    public static function formMessages(): array
    {
        return [];
    }


    public static function formField($params = null): array
    {

        $package = [];
        foreach (Package::get() as $p) {
            $price = thousand_format($p->price);
            $package[] = ['value' => $p->id, 'title' => "$p->title (Rp. $price)"];
        }
        $payment = [];
        foreach (Payment::get() as $p) {
            $payment[] = ['value' => $p->id, 'title' => "$p->no_reference - $p->name"];
        }
        $month=[
            ['value' => 1, 'title' => "Januari"],
            ['value' => 2, 'title' => "Februari"],
            ['value' => 3, 'title' => "Maret"],
            ['value' => 4, 'title' => "April"],
            ['value' => 5, 'title' => "Mei"],
            ['value' => 6, 'title' => "Juni"],
            ['value' => 7, 'title' => "Juli"],
            ['value' => 8, 'title' => "Agustus"],
            ['value' => 9, 'title' => "September"],
            ['value' => 10, 'title' => "Oktober"],
            ['value' => 11, 'title' => "November"],
            ['value' => 12, 'title' => "Desember"],
        ];
        $now=Carbon::now();
        $year=[
            ['value' => $now->year-1, 'title' => $now->year-1],
            ['value' => $now->year, 'title' => $now->year],
            ['value' => $now->year+1, 'title' => $now->year+1],
            ];

        return [
            [
                'title' => 'Paket Pilihan',
                'type' => 'select',
                'model' => 'package_id',
                'options' => $package,
                'required' => true,
            ],
            [
                'title' => 'Pembayaran Melalui',
                'type' => 'select',
                'model' => 'payment_id',
                'options' => $payment,
                'required' => true,
            ],
            [
                'title' => 'Tanggal Pembayaran',
                'type' => 'date',
                'model' => 'date_payment',
                'required' => true,
            ],
            [
                'title' => 'Bulan Pembayaran',
                'type' => 'select',
                'model' => 'month',
                'options' => $month,
                'required' => true,
            ],[
                'title' => 'Tahun Pembayaran',
                'type' => 'select',
                'model' => 'month',
                'options' => $year,
                'required' => true,
            ],
        ];


    }
}
