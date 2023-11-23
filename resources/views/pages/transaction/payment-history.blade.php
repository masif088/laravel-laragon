<x-argon-layout>
    <x-slot name="title">
        Riwayat Pembayaran
    </x-slot>
    <x-slot name="breadcrumbs">
        Transaksi => #;
        Riwayat Pembayaran => #;
    </x-slot>
    <div>

        <div class="w-full max-w-full px-3 mt-0 lg:w-12/12 lg:flex-none">
            <div
                class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="flex-auto p-4 mt-4">
                    <a href="{{ route('admin.transaction.create') }}"
                       class="rounded-md bg-green-success px-3 py-2 font-semibold text-white text-center">
                        TAMBAH PEMBAYARAN
                    </a>
                    <livewire:table.main name="PaymentHistory" :date-search="true" :extras="true"/>
                </div>
            </div>
        </div>


    </div>
</x-argon-layout>
