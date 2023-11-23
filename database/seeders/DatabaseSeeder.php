<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PackageStatus;
use App\Models\Payment;
use App\Models\RagilnetData;
use App\Models\TransactionStatus;
use App\Models\UserStatus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        RagilnetData::create([]);
         \App\Models\User::create([
             'name' => 'admin',
             'email' => 'admin@admin',
             'password'=>bcrypt('adminadmin')
         ]);

        PackageStatus::create([
            'title' => 'Aktif'
        ]);
        PackageStatus::create([
            'title' => 'Tidak Aktif'
        ]);

        TransactionStatus::create([
            'title' => 'Menunggu konfirmasi'
        ]);
        TransactionStatus::create([
            'title' => 'Telah dibayar'
        ]);
        TransactionStatus::create([
            'title' => 'Pembayaran dibatalkan'
        ]);
        UserStatus::create([
            'title' => 'Aktif'
        ]);
        UserStatus::create([
            'title' => 'Tenggang'
        ]);
        UserStatus::create([
            'title' => 'Non Aktif'
        ]);
//
//        Payment::create([
//            'name' => 'Bank BRI',
//            'on_behalf' => 'BANK',
//            'no_reference' => 'OOOO'
//        ]);

    }
}
