<form wire:submit.prevent="update">
    <h3>Data umum footer</h3>
    <br>
    <x-argon.form-generator repositories="GeneralData"/>
    <button type="submit"
            class="rounded-md bg-red-primary mt-3 float-right px-10 py-2 font-semibold text-white hover:bg-indigo-500 text-center">
        Simpan Perubahan
    </button>
</form>
