<div class="w-full max-w-full px-3 mt-0 lg:w-12/12 lg:flex-none">
    <div
        class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
        <div class="flex-auto p-10">
            <h3 class="mb-5">Tambah User</h3>
            <form wire:submit.prevent="{{ $action }}">
                <x-argon.form-generator repositories="User" action="{{ $action }}"/>
                <button
                    class="rounded-md bg-red-primary mt-3 float-right px-10 py-2 font-semibold text-white hover:bg-indigo-500 text-center">
                    Tambah
                </button>
            </form>
        </div>
    </div>
</div>
