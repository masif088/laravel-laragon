<div class="flex flex-wrap -mx-3">
    <x-argon.simple-card
        title="PAKET YANG DIPILIH"
        value="{{ !is_null($transaction)?$transaction->package->title:'-' }}"
        icon="fa-solid fa-money-bill text-red-primary"
        icon-background="bg-yellow-primary"
    />

    <x-argon.simple-card
        title="TAGIHAN PERBULAN"
        value="{{ !is_null($transaction)?$transaction->package->price:'-' }}"
        icon="fa-solid fa-money-bill text-red-primary"
        icon-background="bg-yellow-primary"
    />

    <x-argon.simple-card
        title="PEMASANGAN AWAL"
        value="{{ !is_null(auth()->user()->first_installation)?auth()->user()->first_installation:'-' }}"
        icon="fa-solid fa-money-bill text-red-primary"
        icon-background="bg-yellow-primary"
    />

    <x-argon.simple-card
        title="TAGIHAN SELANJUTNYA"
        value="Tanggal 10 setiap bulan"
        icon="fa-solid fa-money-bill text-red-primary"
        icon-background="bg-yellow-primary"
    />
</div>
