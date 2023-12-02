<x-argon-layout>
    <x-slot name="title">
        User Tidak Aktif
    </x-slot>
    <x-slot name="breadcrumbs">
        Rekap User => #;
        Kosumen Tidak Aktif => #;
    </x-slot>
    <div>
        <div class="w-full max-w-full px-3 mt-0 lg:w-12/12 lg:flex-none">
            <div
                class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="flex-auto p-4">
                    <livewire:table.main name="RecapCustomer" :param1="[3]"/>
                </div>
            </div>
        </div>
    </div>
</x-argon-layout>
