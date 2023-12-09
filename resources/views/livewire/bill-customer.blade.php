@php use Carbon\Carbon; @endphp
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
        <div class="flex flex-wrap mx-3 text-xl lg:mt-5 xl:mt-5">
            <div class="max-w-full xl:px-10 sm:w-full sm-max:w-full md:w-full sm-max:mt-1  sm:flex-none xl:mb-0 xl:w-1/4 py-2">
                Pesan
            </div>
            <div class="xl:ml-10">
                <div
                    class="max-w-full px-3 sm:w-full sm-max:w-full md:w-full sm-max:mt-1  sm:flex-none xl:mb-0  bg-gray-200 rounded py-2">
                    Haloo Pelanggan Internet Ragil.net <br>
                    Yth. Saudara/i {{ str_replace(" "," ",$user->name) }}, Mengingatkan untuk segera melakukan pembayaran internet berlangganan pada bulan Oktober sebesar Rp {{thousand_format( !is_null($transaction)?$transaction->package->price:0 )}}. Tenggat waktu pembayaran anda adalah Tanggal 10 pada setiap bulan. Segera lakukan pembayaran sebelum itu, jika melewati batas otomatis akan kami non aktifkan sementara. Untuk pengaktifan segera hubungi nomor ini kembali.
                    <br>
                    Terimakasih
                    <br><br>

                    Salam,<br>
                    Admin Ragil.net
                </div>
                <a href="https://wa.me/{{ $this->waNumber }}?text=Haloo%20Pelanggan%20Internet%20Ragil.net%0AYth.%20Saudara/i%20{{ str_replace(" ","%20",$user->name) }},%0A%0AMengingatkan%20untuk%20segera%20melakukan%20pembayaran%20internet%20berlangganan%20pada%20bulan%20Oktober%20sebesar%20Rp%20{{thousand_format( !is_null($transaction)?$transaction->package->price:0 )}}.%20Tenggat%20waktu%20pembayaran%20anda%20adalah%20Tanggal%2010pada%20setiap%20bulan.%20Segera%20lakukan%20pembayaran%20sebelum%20itu,%20jika%20melewati%20batas%20otomatis%20akan%20kami%20non%20aktifkan%20sementara.%20Untuk%20pengaktifan%20segera%20hubungi%20nomor%20ini%20kembali.%0ATerimakasih%0A%0ASalam,%0AAdmin%20Ragil.net"
                   class="rounded-md bg-red-primary mt-3 float-right xl:mx-10 px-10 py-2 font-semibold text-white text-center">
                    Lakukan Penagihan Melalui WhatsApp
                </a>
            </div>



        </div>
    </div>



</div>
