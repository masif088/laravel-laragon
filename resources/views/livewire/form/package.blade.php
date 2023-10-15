<form wire:submit.prevent="{{ $action }}">
    <x-argon.form-generator repositories="Package"/>
    <button type="submit"
            class="rounded-md bg-red-primary mt-3 float-right px-10 py-2 font-semibold text-white hover:bg-indigo-500 text-center">
        Konfirmasi
    </button>
</form>
