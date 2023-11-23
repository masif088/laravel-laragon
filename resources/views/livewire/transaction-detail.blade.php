<div>
    <h3>Lakukan Penagihan</h3>
    <div class="flex-auto px-4">
        <div class="flex flex-wrap mx-3 text-xl mt-5">
            <x-argon.show-data title="Nama Lengkap" content="{{ $transaction->user->name }}"/>
            <x-argon.show-data title="Waktu Pembayaran" content="{{ $transaction->date_payment }}"/>
        </div>

        <div class="flex flex-wrap mx-3 text-xl mt-5">
            <x-argon.show-data title="Paket Pilihan" content="{{ $transaction->package->title }}"/>
            <x-argon.show-data title="Biaya berlangganan" content="Rp. {{ thousand_format($transaction->package->price) }}"/>

        </div>

        <div class="flex flex-wrap mx-3 text-xl mt-5">

            <div class="w-full max-w-full px-10 mb-20 sm:w-full sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                Paket Pilihan
            </div>
            <div class="w-full max-w-full mb-20 sm:w-full sm:flex-none xl:mb-0 xl:w-1/4">
                <img style="max-height: 400px"
                     src="{{ asset('storage/'.$transaction->thumbnail) }}"
                     alt="">
            </div>
        </div>

        <div class='rounded-md bg-green-success mt-3 float-right px-10 py-2 font-semibold text-white text-center ml-4'>
            <button wire:click='setConfirmation(2)' class=''>Konfirmasi Pembayaran</button>
        </div>

        <div class='rounded-md bg-red-primary mt-3 float-right px-10 py-2 font-semibold text-white text-center ml-4'>
            <button wire:click='setConfirmation(3)' class=''>Batalkan Pembayaran</button>
        </div>

    </div>

</div>
