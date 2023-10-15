<x-argon-layout>
    <x-slot name="breadcrumbs">
        a => google.com;
        a => google.com;
    </x-slot>
    <div>
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
            <!-- card1 -->
            <x-argon.simple-card
                title="Penjualan"
                value="Rp. 100.000"
                fluctuation="increase"
                fluctuation-value="10%"
                fluctuation-note="Naik dari kemarin lusa"
                icon="fa-solid fa-money-bill text-red-primary"
                icon-background="bg-yellow-primary"
            />

            <!-- card2 -->
            <x-argon.simple-card/>

            <!-- card3 -->
            <x-argon.simple-card/>

            <!-- card4 -->
            <x-argon.simple-card/>
        </div>


        <!-- cards row 2 -->
        <div class="flex flex-wrap mt-6 -mx-3">
            <div class="w-full max-w-full px-3 mt-0 lg:w-12/12 lg:flex-none">
                <div
                    class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                        <h6 class="capitalize dark:text-white">Sales overview</h6>
                        <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                            <i class="fa fa-arrow-up text-emerald-500"></i>
                            <span class="font-semibold">4% more</span> in 2021
                        </p>
                    </div>
                    <div class="flex-auto p-4">
                        <div>
                            <livewire:table.main name="BillCustomer" />
{{--                            <livewire:test/>--}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-argon-layout>
