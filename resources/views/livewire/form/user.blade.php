<div class="w-full max-w-full px-3 mt-0 lg:w-12/12 lg:flex-none">
    <div
        class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
        <div class="flex-auto p-10">
            <h3 class="mb-5">Tambah User</h3>
            <form wire:submit.prevent="{{ $action }}">
                <x-argon.form-generator repositories="User" action="{{ $action }}"/>

                @if($data['role']==3 and $action=="create")
                    <div class="mt-3">
                            <label class="block text-sm font-bold dark:text-light" for="statusTransaction">Langsung transaksi pertama</label>
                        <select
                            id="statusTransaction"
                            wire:model="statusTransaction"
                            name="statusTransaction"

                            class="bg-gray-200 appearance-none border-1 border border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none dark:border-primary-light focus:bg-gray-100 dark:bg-dark dark:text-light focus:dark:border-white">
                                <option value="1">Iya</option>
                                <option value="0">Tidak</option>
                        </select>
                    </div>
                    @if($statusTransaction==1)
                        <x-argon.form-generator repositories="UserTransaction" action="{{ $action }}"/>
                    @endif
                @endif

                <button
                    class="rounded-md bg-red-primary mt-3 float-right px-10 py-2 font-semibold text-white hover:bg-indigo-500 text-center">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
