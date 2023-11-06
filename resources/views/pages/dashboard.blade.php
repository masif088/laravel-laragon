<x-argon-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <x-slot name="breadcrumbs">
        Dashboard => #;
    </x-slot>
    <div>
        <div class="ml-6 translate-x-0"></div>
        <livewire:dashboard.cards/>
        {{--        <livewire:daily-transaction/>--}}
        <div class="w-full max-w-full mt-3 lg:w-12/12 lg:flex-none">
            <div
                class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <livewire:table.main name="DailyTransaction" sort-field="date_payment"/>
            </div>
        </div>
        <livewire:recapitulation-transaction/>
        <livewire:dashboard.charts/>

        <div class="bg-green-success bg-yellow-primary px-5">

        </div>

        {{--<livewire:user.form/>--}}


        {{--        <!-- cards row 2 -->--}}
        {{--        <div class="flex flex-wrap mt-6 -mx-3">--}}
        {{--            <div class="w-full max-w-full px-3 mt-0 lg:w-12/12 lg:flex-none">--}}
        {{--                <div--}}
        {{--                    class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">--}}
        {{--                    <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">--}}
        {{--                        <h6 class="capitalize dark:text-white">Sales overview</h6>--}}
        {{--                        <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">--}}
        {{--                            <i class="fa fa-arrow-up text-emerald-500"></i>--}}
        {{--                            <span class="font-semibold">4% more</span> in 2021--}}
        {{--                        </p>--}}
        {{--                    </div>--}}
        {{--                    <div class="flex-auto p-4">--}}
        {{--                        <div>--}}
        {{--                            <livewire:table.main name="BillCustomer" />--}}
        {{--                            <livewire:test/>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}

        {{--        </div>--}}
    </div>
</x-argon-layout>
