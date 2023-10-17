<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('ragilnet');
});

Route::get('dashboard', function () {
    return redirect(route('admin.dashboard'));
})->name('dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->name('member.')->prefix('member')->group(function () {
    Route::get('dashboard', function () {
        return view('pages-user.dashboard');
    })->name('dashboard');

    Route::get('recap-transaction', function () {
        return view('pages-user.recap-transaction');
    })->name('recap-transaction');

    Route::get('data-user', function () {
        return view('pages-user.data-user');
    })->name('data-user');

    Route::get('payment', function () {
        return view('pages-user.payment');
    })->name('payment');

    Route::get('confirmation-payment', function () {
        return view('pages-user.confirmation-payment');
    })->name('confirmation-payment');


});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->name('admin.')->prefix('admin')->group(function () {
    Route::get('dashboard', function () {
        if (auth()->user()->role==3){
            return redirect(\route('member.dashboard'));
        }
        return view('pages.dashboard');
    })->name('dashboard');


    Route::get('packages', function () {
        return view('pages.packages.index');
    })->name('packages.index');
    Route::get('packages/create', function () {
        return view('pages.packages.create');
    })->name('packages.create');
    Route::get('packages/edit/{id}', function ($id) {
        return view('pages.packages.edit', compact('id'));
    })->name('packages.edit');

    Route::get('payment', function () {
        return view('pages.payment.index');
    })->name('payment.index');
    Route::get('payment/create', function () {
        return view('pages.payment.create');
    })->name('payment.create');
    Route::get('payment/edit/{id}', function ($id) {
        return view('pages.payment.edit', compact('id'));
    })->name('payment.edit');

    Route::get('users', function () {
        return view('pages.users.index');
    })->name('users.index');
    Route::get('users/create', function () {
        return view('pages.users.create');
    })->name('users.create');
    Route::get('users/edit/{id}', function ($id) {
        return view('pages.users.edit', compact('id'));
    })->name('users.edit');

    Route::get('transaction/create', function () {
        return view('pages.transaction.create');
    })->name('transaction.create');
    Route::get('transaction/edit/{id}', function ($id) {
        return view('pages.transaction.edit', compact('id'));
    })->name('transaction.edit');
    Route::get('transaction/recapitulation', function () {
        return view('pages.transaction.recapitulation');
    })->name('transaction.recapitulation');
    Route::get('transaction/recapitulation/show/{id}', function ($id) {
        return view('pages.transaction.recapitulation-show', compact('id'));
    })->name('transaction.recapitulation.show');
    Route::get('transaction/payment-history', function () {
        return view('pages.transaction.payment-history');
    })->name('transaction.payment-history');
    Route::get('transaction/bill-customer', function () {
        return view('pages.transaction.bill-customer');
    })->name('transaction.bill-customer');
    Route::get('transaction/bill-customer/user/{id}', function ($id) {
        return view('pages.transaction.bill-customer-user', compact('id'));
    })->name('transaction.bill-customer-user');
    Route::get('transaction/confirmation-payment', function () {
        return view('pages.transaction.confirmation-payment');
    })->name('transaction.confirmation-payment');

    Route::get('transaction/confirmation-payment/detail/{id}', function ($id) {
        return view('pages.transaction.confirmation-payment-detail', compact('id'));
    })->name('transaction.confirmation-payment.detail');


    Route::get('download/transaction/{dateStart}/{dateEnd}', function ($dateStart, $dateEnd) {
        $transactions = Transaction::whereBetween('date_payment', [$dateStart, $dateEnd])
            ->where('transaction_status_id',2)->get();
        $filename = "rekap-transaksi-$dateStart-$dateEnd";
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $callback = function () use ($transactions) {
            $delimiter = ';';
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Tanggal Pembayaran', 'No Invoice','Nama', 'Nama Paket','Jumlah Uang'], $delimiter);
            foreach ($transactions as $transaction) {
                fputcsv($file, [$transaction->date_payment,$transaction->no_invoice,$transaction->user->name,$transaction->package->name,$transaction->money], $delimiter);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    })->name('download.transaction');

});
