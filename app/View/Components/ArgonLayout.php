<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ArgonLayout extends Component
{
    public $sidebars;

    public function __construct()
    {
        if (auth()->user()->role == 1 or auth()->user()->role == 2) {
            $this->sidebars = [
                ['title' => 'Dashboard', 'icon' => 'fa-solid fa-tv', 'color' => '#4B9D93', 'link' => route('admin.dashboard')],
                ['title' => 'Konsumen', 'header' => true],
                ['title' => 'Rekap Konsumen', 'icon' => 'fa-solid fa-users', 'color' => '#FFC700', 'link' => route('admin.customer.recapitulation')],
                ['title' => 'Konsumen Aktif', 'icon' => 'fa-solid fa-users', 'color' => '#4B9D93', 'link' => route('admin.customer.active')],
                ['title' => 'Konsumen Tenggang', 'icon' => 'fa-solid fa-users', 'color' => '#AA161C', 'link' => route('admin.customer.non-active')],
//                ['title' => 'User tidak aktif', 'icon' => 'fa-solid fa-trash', 'color' => '#AA161C', 'link' => route('admin.customer.trash')],
                ['title' => 'Transaksi', 'header' => true],
                ['title' => 'Tambah Transaksi', 'icon' => 'fa-solid fa-square-plus', 'color' => '#4B9D93', 'link' => route('admin.transaction.create')],
                ['title' => 'Riwayat Harian', 'icon' => 'fa-solid fa-calendar-days', 'color' => '#4B0D93', 'link' => route('admin.transaction.daily')],
                ['title' => 'Riwayat Pembayaran', 'icon' => 'fa-solid fa-calendar', 'color' => '#F0C700', 'link' => route('admin.transaction.payment-history')],
                ['title' => 'Tagihan Konsumen', 'icon' => 'fa-solid fa-ticket', 'color' => '#AA161C', 'link' => route('admin.transaction.bill-customer')],
                ['title' => 'Konfirmasi Pembayaran', 'icon' => 'fa-solid fa-square-check', 'color' => '#4B9D93', 'link' => route('admin.transaction.confirmation-payment')],
                ['title' => 'Pembatalan Pembayaran', 'icon' => 'fa-solid fa-square-xmark', 'color' => '#AA161C', 'link' => route('admin.transaction.cancel-transaction')],
//                ['title' => 'Pembayaran Dibatalkan', 'icon' => 'fa-solid fa-ticket', 'color' => '#AA161C', 'link' => route('admin.transaction.payment-cancel')],
                ['title' => 'Akun', 'header' => true],
                ['title' => 'Pendaftaran', 'icon' => 'fa-regular fa-square-plus', 'color' => '#AA161C', 'link' => route('admin.users.create')],
                ['title' => 'Account', 'icon' => 'fa-solid fa-user', 'color' => '#4B9D93', 'link' => route('admin.users.index')],
                ['title' => 'Paket Internet', 'header' => true],
                ['title' => 'Paket Internet', 'icon' => 'fa-solid fa-wifi', 'color' => '#4B9D93', 'link' => route('admin.packages.index')],
                ['title' => 'Metode Pembayaran', 'header' => true],
                ['title' => 'Metode Pembayaran', 'icon' => 'fa-solid fa-wifi', 'color' => '#FFC700', 'link' => route('admin.payment.index')],
            ];
        } else if (auth()->user()->role == 2) {
            $this->sidebars = [
                ['title' => 'Dashboard', 'icon' => 'fa-solid fa-tv', 'color' => '#4B9D93', 'link' => route('admin.dashboard')],
                ['title' => 'Konsumen', 'header' => true],
                ['title' => 'Rekap Konsumen', 'icon' => 'fa-solid fa-users', 'color' => '#FFC700', 'link' => route('admin.customer.recapitulation')],
                ['title' => 'Konsumen Aktif', 'icon' => 'fa-solid fa-users', 'color' => '#4B9D93', 'link' => route('admin.customer.active')],
                ['title' => 'Konsumen Tenggang', 'icon' => 'fa-solid fa-users', 'color' => '#AA161C', 'link' => route('admin.customer.non-active')],
                ['title' => 'Transaksi', 'header' => true],
                ['title' => 'Riwayat Pembayaran', 'icon' => 'fa-solid fa-ticket', 'color' => '#FFC700', 'link' => route('admin.transaction.payment-history')],
                ['title' => 'Tagihan Konsumen', 'icon' => 'fa-solid fa-ticket', 'color' => '#AA161C', 'link' => route('admin.transaction.bill-customer')],
                ['title' => 'Konfirmasi Pembayaran', 'icon' => 'fa-solid fa-ticket', 'color' => '#4B9D93', 'link' => route('admin.transaction.confirmation-payment')],
                ['title' => 'Akun', 'header' => true],
                ['title' => 'Pendaftaran', 'icon' => 'fa-regular fa-square-plus', 'color' => '#AA161C', 'link' => route('admin.users.create')],
                ['title' => 'Account', 'icon' => 'fa-solid fa-user', 'color' => '#4B9D93', 'link' => route('admin.users.index')],
            ];
        } else {
            $this->sidebars = [
                ['title' => 'Dashboard User', 'header' => true],
                ['title' => 'Dashboard', 'icon' => 'fa-solid fa-tv', 'color' => '#4B9D93', 'link' => route('member.dashboard')],
                ['title' => 'Rekap Transaksi', 'icon' => 'fa-solid fa-file', 'color' => '#FFC700', 'link' => route('member.recap-transaction')],
                ['title' => 'Data User', 'icon' => 'fa-solid fa-users', 'color' => '#4B9D93', 'link' => route('member.data-user')],
                ['title' => 'Pembayaran', 'icon' => 'fa-solid fa-ticket', 'color' => '#AA161C', 'link' => route('member.payment')]
            ];
        }
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.argon');
    }
}
