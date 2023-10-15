<div class="flex flex-wrap -mx-3">
    <x-argon.simple-card
        title="PEMASUKAN HARI INI"
        value="Rp. {{ thousand_format($income[0]) }}"
        fluctuation="{{ $this->getFluctuation($income) }}"
        fluctuation-value="{{ $this->getFluctuationValue($income) }}%"
        fluctuation-note="{{ $this->getFluctuationNote($income) }} dari kemarin"
        icon="fa-solid fa-money-bill text-red-primary"
        icon-background="bg-yellow-primary"
    />

    <x-argon.simple-card
        title="TAGIHAN PENGGUNA"
        value="{{ $billCustomer }} User"
        fluctuation="none"
        fluctuation-value=""
        fluctuation-note="Naik dari kemarin"
        icon="fa-solid fa-money-bill text-red-primary"
        icon-background="bg-yellow-primary"
    />

    <x-argon.simple-card
        title="TOTAL PENGGUNA"
        value="{{ $user }} User"
        fluctuation="none"
        fluctuation-value=""
        fluctuation-note="Naik dari kemarin"
        icon="fa-solid fa-money-bill text-red-primary"
        icon-background="bg-yellow-primary"
    />

    <x-argon.simple-card
        title="PENGGUNA BARU"
        value="{{ $newUser }} User"
        fluctuation="none"
        fluctuation-value="%"
        fluctuation-note="Naik dari kemarin"
        icon="fa-solid fa-money-bill text-red-primary"
        icon-background="bg-yellow-primary"
    />
</div>
