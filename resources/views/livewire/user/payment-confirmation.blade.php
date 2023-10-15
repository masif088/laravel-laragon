<form wire:submit.prevent="{{ $action }}">
    <x-argon.form-generator repositories="PaymentConfirmation" />
    <div wire:loading="thumbnail">Sedang upload</div>
    @if($data['thumbnail_state'])
        <br>
        <img src="{{ $data['thumbnail_state']->temporaryUrl() }}" style="max-width: 300px;">
    @endif
    @error("data.thumbnail")
    <small id="thumbnailDesc" class="form-text">
        {{ $message }}
    </small>
    @enderror
    <button type="submit"
            class="rounded-md bg-red-primary mt-3 float-right px-10 py-2 font-semibold text-white hover:bg-indigo-500 text-center">
        Konfirmasi
    </button>
</form>
