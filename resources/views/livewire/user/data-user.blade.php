<div>
    <h3>Rekap Transaksi</h3>

    <div class="flex-auto">
        <div class="flex flex-wrap text-xl mt-5">

            <div class="w-full max-w-full sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/2 py-2 px-5">
                Nama Lengkap
                <div class="w-11/12 max-w-full px-3  bg-gray-200 rounded-lg py-2">
                    {{ auth()->user()->name }}
                </div>
                <br>
                Alamat Rumah
                <div class="w-11/12 max-w-full px-3 bg-gray-200 rounded-lg py-2" style="height: 9rem; overflow: auto">
                    {{ auth()->user()->address }}
                </div>
                <br>
                Nomer Telfon Aktif
                <div class="w-11/12 max-w-full px-3 bg-gray-200 rounded-lg py-2">
                    {{ auth()->user()->no_phone }}
                </div>
                <br>
                Tanggal Masa Aktif Internet
                <div class="w-11/12 max-w-full px-3 bg-gray-200 rounded-lg py-2">
                    {{ auth()->user()->payment_deadline }}
                </div>
                <br>
            </div>
            <div class="w-full max-w-full sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/2 py-2 px-5">
                Email
                <div class="w-11/12 max-w-full px-3 bg-gray-200 rounded-lg py-2 ">
                    {{ auth()->user()->email }}
                </div>
                <br>
                Paket Pilihan
                <div class="w-11/12 max-w-full px-3 bg-gray-200 rounded-lg py-2 ">
                    {{ !is_null($transaction)?$transaction->package->title:'' }}
                </div>
                <br>
                Biaya Perbulan
                <div class="w-11/12 max-w-full px-3 bg-gray-200 rounded-lg py-2 ">
                    {{ !is_null($transaction)?$transaction->package->price:'' }}
                </div>
                <br>
                Biaya Pemasangan Awal
                <div class="w-11/12 max-w-full px-3 bg-gray-200 rounded-lg py-2 ">
                    {{ auth()->user()->first_installation }}
                </div>
            </div>

        </div>


    </div>

</div>
