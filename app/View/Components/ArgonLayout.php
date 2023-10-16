<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class ArgonLayout extends Component
{
    public $sidebars;

    public function __construct()
    {
        if (auth()->user()->role==1 or auth()->user()->role==2) {
            $this->sidebars = [
                ['title' => 'Dashboard', 'icon' => 'fa-solid fa-tv', 'color' => '#4B9D93', 'link' => route('admin.dashboard')],
                ['title' => 'Transaksi', 'header' => true],
                ['title' => 'Rekap Konsumen', 'icon' => 'fa-solid fa-file', 'color' => '#FFC700', 'link' => route('admin.transaction.recapitulation')],
                ['title' => 'Riwayat Pembayaran', 'icon' => 'fa-solid fa-ticket', 'color' => '#41B808', 'link' => route('admin.transaction.payment-history')],
                ['title' => 'Tagihan Konsumen', 'icon' => 'fa-solid fa-ticket', 'color' => '#AA161C', 'link' => route('admin.transaction.bill-customer')],
                ['title' => 'Konfirmasi Pembayaran', 'icon' => 'fa-solid fa-ticket', 'color' => '#4B9D93', 'link' => route('admin.transaction.confirmation-payment')],
                ['title' => 'Akun', 'header' => true],
                ['title' => 'Pendaftaran', 'icon' => 'fa-regular fa-square-plus', 'color' => '#AA161C', 'link' => route('admin.users.create')],
                ['title' => 'Account', 'icon' => 'fa-solid fa-users', 'color' => '#4B9D93', 'link' => route('admin.users.index')],
                ['title' => 'Paket Internet', 'header' => true],
                ['title' => 'Paket Internet', 'icon' => 'fa-solid fa-wifi', 'color' => '#4B9D93', 'link' => route('admin.packages.index')],

                ['title' => 'Metode Pembayaran', 'header' => true],
                ['title' => 'Metode Pembayaran', 'icon' => 'fa-solid fa-wifi', 'color' => '#FFC700', 'link' => route('admin.payment.index')],
            ];
        }else{
            $this->sidebars=[
                ['title' => 'Dashboard User', 'header' => true],
                ['title' => 'Dashboard', 'icon' => 'fa-solid fa-tv', 'color' => '#4B9D93', 'link' => route('member.dashboard')],
                ['title' => 'Rekap Transaksi', 'icon' => 'fa-solid fa-file', 'color' => '#FFC700', 'link' => route('member.recap-transaction')],
                ['title' => 'Data User', 'icon' => 'fa-solid fa-users', 'color' => '#4B9D93', 'link' => route('member.data-user')],
                ['title' => 'Pembayaran', 'icon' => 'fa-solid fa-ticket', 'color' => '#AA161C', 'link' => route('member.payment')],
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
