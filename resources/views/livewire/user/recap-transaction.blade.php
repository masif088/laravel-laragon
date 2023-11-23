<div>
    <h3>Rekap Transaksi</h3>

    <div class="flex-auto px-4">
        <div class="flex flex-wrap mx-3 text-xl lg:mt-5 xl:mt-5">
            <x-argon.show-data title="Nama Lengkap" content="{{ $user->name }}"/>
            <x-argon.show-data title="Alamat" content="{{ !is_null($user->address)?$user->address:'-' }}"/>
        </div>

        <div class="flex flex-wrap mx-3 text-xl lg:mt-5 xl:mt-5">
            <x-argon.show-data title="Paket Pilihan" content="{{ !is_null($transaction)?$transaction->package->title:'-' }}"/>
            <x-argon.show-data title="Biaya Berlangganan" content="{{ !is_null($transaction)?$transaction->package->price:'-' }}"/>
        </div>


        <div class="flex flex-wrap mx-3 text-xl lg:mt-5 xl:mt-5">
            <x-argon.show-data title="No. Telepon" content="{{ $user->no_phone }}"/>
            <x-argon.show-data title="Email" content="{{ $user->email }}"/>
        </div>
    </div>
    <br><br>
    <div class="overflow-x-auto relative ">
        <table
            class="px-5 border-collapse  border-black w-full text-sm text-left dark:text-gray-400 rounded table-auto">
            <thead class="text-md border-b-4 text-uppercase border-gray-400">
            <tr class="border-b border-collapse text-center font-bold h-12 text-lg">
                <td style="padding: 10px">TANGGAL</td>
                <td style="padding: 10px">INVOICE</td>
                <td style="padding: 10px">PAKET PILIHAN</td>
                <td style="padding: 10px">NOMINAL</td>
                <td style="padding: 10px">PEMBAYARAN MELALUI</td>
                <td style="padding: 10px">STATUS</td>
            </tr>
            </thead>
            @foreach($transactions as $t)
            <tr class="text-center text-lg h-12">
                <td style="padding: 10px">{{ Carbon\Carbon::parse ($t->date_payment)->format('d/m/Y') }}</td>
                <td style="padding: 10px">{{ $t->no_invoice }}</td>
                <td style="padding: 10px">{{ $t->package->title }}</td>
                <td style="padding: 10px">Rp. {{ thousand_format($t->money) }}</td>
                <td style="padding: 10px">{{ $t->payment->name }}</td>
                <td style="padding: 10px">{{ $t->transactionStatus->title }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <br>

</div>
