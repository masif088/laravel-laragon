<form wire:submit.prevent="submit">
    <h3>Pembatalan Transaksi</h3>
    <br>
    <x-argon.form-generator-component.select :repository="$repo"/>
    <button type="submit"
            class="rounded-md bg-red-primary mt-3 float-right px-10 py-2 font-semibold text-white hover:bg-indigo-500 text-center">
        Batalkan transaksi
    </button>
</form>
