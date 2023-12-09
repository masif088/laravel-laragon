<?php

namespace App\Repository\Form;


use App\Models\Package;
use App\Models\Payment;
use App\Repository\Form;
use Carbon\Carbon;


class PaymentConfirmation extends \App\Models\Transaction implements Form
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
            'data.package_id' => 'required',
            'data.payment_id' => 'required',
            'data.date_payment' => 'required',
            'data.money' => 'required',
            'data.thumbnail_state' => 'required',
        ];
    }

    public static function formMessages(): array
    {
        return [];
    }


    public static function formField($params = null): array
    {
//        $user = [];
//        foreach (\App\Models\User::where('role', '=', '3')->get() as $u) {
//            $user[] = ['value' => $u->id, 'title' => "$u->name - $u->email"];
//        }
        $package = [];
        foreach (Package::where('package_status_id','=',1)->get() as $p) {
            $price = thousand_format($p->price);
            $package[] = ['value' => $p->id, 'title' => "$p->title (Rp. $price)"];
        }
        $payment = [];
        foreach (Payment::get() as $p) {
            $payment[] = ['value' => $p->id, 'title' => "$p->type - $p->name"];
        }

        return [
//            [
//                'title' => 'Nama Lengkap',
//                'type' => 'select',
//                'model' => 'user_id',
//                'options' => $user,
//                'required' => true,
//            ],
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
                'title' => 'Nominal Pembayaran',
                'type' => 'number',
                'model' => 'money',
                'required' => true,
                'placeholder' => '',
            ],
            [
                'title' => 'Bukti Transfer',
                'type' => 'file',
                'model' => 'thumbnail_state',
                'required' => true,
                'placeholder' => '',
                'accept'=>'image/*'
            ],
        ];


    }
}
