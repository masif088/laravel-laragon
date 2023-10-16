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
        <a href="https://wa.me/{{$user->no_phone}}?text=Haloo%20Pelanggan%20Internet%20Ragil.net%0AYth.%20Saudara/i%20{{ str_replace(" ","%20",$user->name) }},%0A%0AMengingatkan%20untuk%20segera%20melakukan%20pembayaran%20internet%20berlangganan%20pada%20bulan%20Oktober%20sebesar%20Rp%20{{thousand_format($transaction->package->price)}}.%20Tenggat%20waktu%20pembayaran%20anda%20adalah%20Tanggal%20{{ \Carbon\Carbon::parse($user->payment_deadline)->format('d-m-Y') }}.%20Segera%20lakukan%20pembayaran%20sebelum%20itu,%20jika%20melewati%20batas%20otomatis%20akan%20kami%20non%20aktifkan%20sementara.%20Untuk%20pengaktifan%20segera%20hubungi%20nomor%20ini%20kembali.%0ATerimakasih%0A%0ASalam,%0AAdmin%20Ragil.net"
           class="rounded-md bg-red-primary mt-3 float-right px-10 py-2 font-semibold text-white text-center">
            Lakukan Penagihan Melalui WhatsApp
        </a>
    </div>


</div>
