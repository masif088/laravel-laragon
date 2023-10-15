<div>
    <h3>Rekap Transaksi</h3>

    <div class="flex-auto px-4">
        <div class="flex flex-wrap mx-3 text-xl mt-5">
            <div class="w-full max-w-full px-10 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                Nama Lengkap
            </div>
            <div class="w-full max-w-full px-3 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 bg-gray-200 rounded py-2">
                {{ $user->name }}
            </div>
            <div class="w-full max-w-full px-10 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                Alamat
            </div>
            <div class="w-full max-w-full px-3 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 bg-gray-200 rounded py-2">
                {{ $user->address }}
            </div>
        </div>

        <div class="flex flex-wrap mx-3 text-xl mt-5">
            <div class="w-full max-w-full px-10 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                Paket Pilihan
            </div>
            <div class="w-full max-w-full px-3 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 bg-gray-200 rounded py-2">
                {{ !is_null($transaction)?$transaction->package->title:'' }}
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
                {{ $user->no_phone }}
            </div>
            <div class="w-full max-w-full px-10 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                Email
            </div>
            <div class="w-full max-w-full px-3 mb-20 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 bg-gray-200 rounded py-2">
                {{ $user->email }}
            </div>
        </div>
    </div>
    <div class="px-6">
        <a href="https://wa.me/{{  }}?text=Halo%20nama%20saya%20nadine"
           class="rounded-md bg-red-primary mt-3 float-right px-10 py-2 font-semibold text-white text-center">
            Lakukan Penagihan Melalui WhatsApp
        </a>
    </div>


</div>
