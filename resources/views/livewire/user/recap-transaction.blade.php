<div>
    <h3>Rekap Transaksi</h3>

    <div class="flex-auto px-4">
        <div class="flex flex-wrap mx-3 text-xl mt-5">
            <div class="max-w-full px-10 sm:w-1/2 sm-max:w-1/2 sm-max:mt-5  sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                Nama Lengkap
            </div>
            <div class="max-w-full px-3 sm:w-1/2 sm-max:w-1/2 sm-max:mt-5  sm:flex-none xl:mb-0 xl:w-1/4 bg-gray-200 rounded py-2">
                {{ $user->name }}
            </div>
            <div class="max-w-full px-10 sm:w-1/2 sm-max:w-1/2 sm-max:mt-5  sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                Alamat
            </div>
            <div class="max-w-full px-3 sm:w-1/2 sm-max:w-1/2 sm-max:mt-5  sm:flex-none xl:mb-0 xl:w-1/4 bg-gray-200 rounded py-2">
                {{ $user->address }}
            </div>
        </div>

        <div class="flex flex-wrap mx-3 text-xl mt-5">
            <div class="max-w-full px-10 sm:w-1/2 sm-max:w-1/2 sm-max:mt-5  sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                Paket Pilihan
            </div>
            <div class="max-w-full px-3 sm:w-1/2 sm-max:w-1/2 sm-max:mt-5  sm:flex-none xl:mb-0 xl:w-1/4 bg-gray-200 rounded py-2">
                {{ !is_null($transaction)?$transaction->package->name:'' }}
            </div>
            <div class="max-w-full px-10 sm:w-1/2 sm-max:w-1/2 sm-max:mt-5  sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                Biaya Berlangganan
            </div>
            <div class="max-w-full px-3 sm:w-1/2 sm-max:w-1/2 sm-max:mt-5  sm:flex-none xl:mb-0 xl:w-1/4 bg-gray-200 rounded py-2">
                {{ !is_null($transaction)?$transaction->package->price:'' }}
            </div>
        </div>


        <div class="flex flex-wrap mx-3 text-xl mt-5">
            <div class="max-w-full px-10 sm:w-1/2 sm-max:w-1/2 sm-max:mt-5  sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                No. Telepon
            </div>
            <div class="max-w-full px-3 sm:w-1/2 sm-max:w-1/2 sm-max:mt-5  sm:flex-none xl:mb-0 xl:w-1/4 bg-gray-200 rounded py-2">
                {{ $user->no_phone }}
            </div>
            <div class="max-w-full px-10 sm:w-1/2 sm-max:w-1/2 sm-max:mt-5  sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                Email
            </div>
            <div class="max-w-full px-3 sm:w-1/2 sm-max:w-1/2 sm-max:mt-5  sm:flex-none xl:mb-0 xl:w-1/4 bg-gray-200 rounded py-2">
                {{ $user->email }}
            </div>
        </div>
    </div>
    <br><br>
    <div class="overflow-x-auto relative ">
        <table
            class="px-5 border-collapse  border-black w-full text-sm text-left dark:text-gray-400 rounded table-auto">
            <thead class="text-md border-b-4 text-uppercase border-gray-400">
            <tr class="border-b border-collapse text-center font-bold h-12 text-lg">
                <td>TANGGAL</td>
                <td>INVOICE</td>
                <td>PAKET PILIHAN</td>
                <td>NOMINAL</td>
                <td>PEMBAYARAN MELALUI</td>
                <td>STATUS</td>
            </tr>
            </thead>
            @foreach($transactions as $t)
            <tr class="text-center text-lg h-12">
                <td>{{ Carbon\Carbon::parse ($t->date_payment)->format('d/m/Y') }}</td>
                <td>{{ $t->no_invoice }}</td>
                <td>{{ $t->package->title }}</td>
                <td>Rp. {{ thousand_format($t->money) }}</td>
                <td>{{ $t->payment->name }}</td>
                <td>{{ $t->transactionStatus->title }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <br>

</div>
