<div>
    <h3>Rekap Transaksi</h3>

    <div class="flex-auto px-4">
        <div class="flex flex-wrap mx-3 text-xl mt-5">
            <div class="w-full max-w-full px-10 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                Nama Lengkap
            </div>
            <div class="w-full max-w-full px-3 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 bg-gray-200 rounded py-2">
                {{ auth()->user()->name }}
            </div>
            <div class="w-full max-w-full px-10 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                Alamat
            </div>
            <div class="w-full max-w-full px-3 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 bg-gray-200 rounded py-2">
                {{ auth()->user()->address }}
            </div>
        </div>

        <div class="flex flex-wrap mx-3 text-xl mt-5">
            <div class="w-full max-w-full px-10 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                Paket Pilihan
            </div>
            <div class="w-full max-w-full px-3 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 bg-gray-200 rounded py-2">
                {{ !is_null($transaction)?$transaction->package->name:'' }}
            </div>
            <div class="w-full max-w-full px-10 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                Biaya Berlangganan
            </div>
            <div class="w-full max-w-full px-3 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 bg-gray-200 rounded py-2">
                {{ !is_null($transaction)?$transaction->package->price:'' }}
            </div>
        </div>


        <div class="flex flex-wrap mx-3 text-xl mt-5">
            <div class="w-full max-w-full px-10 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                No. Telepon
            </div>
            <div class="w-full max-w-full px-3 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 bg-gray-200 rounded py-2">
                {{ auth()->user()->no_phone }}
            </div>
            <div class="w-full max-w-full px-10 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                Email
            </div>
            <div class="w-full max-w-full px-3 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 bg-gray-200 rounded py-2">
                {{ auth()->user()->email }}
            </div>
        </div>
    </div>
    <br><br>
    <div class="px-8">
        <table
            class="px-5 border-collapse  border-black w-full text-sm text-left dark:text-gray-400 rounded table-auto">
            <thead class="text-md border-b-4 text-uppercase border-gray-400">
            <tr class="border-b border-collapse text-center font-bold h-12 text-lg">
                <td style="width: 15%">TANGGAL</td>
                <td style="width: 20%">INVOICE</td>
                <td style="width: 20%">PAKET PILIHAN</td>
                <td style="width: 15%">NOMINAL</td>
                <td style="width: 20%">PEMBAYARAN MELALUI</td>
                <td style="width: 10%">STATUS</td>
            </tr>
            </thead>
            @foreach($transactions as $t)
            <tr class="text-center text-lg h-12">
                <td>{{ Carbon\Carbon::parse ($t->date_payment)->format('d/m/Y') }}</td>
                <td>{{ $t->no_invoice }}</td>
                <td>{{ $t->package->title }}</td>
                <td>{{ $t->money }}</td>
                <td>{{ $t->payment->name }}</td>
                <td>{{ $t->transactionStatus->title }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <br>

</div>
