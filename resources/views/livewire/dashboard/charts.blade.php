<div>

    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 lg:w-6/12 lg:flex-none">
            <div
                class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="capitalize dark:text-white">Pemasukan Tahun Ini</h6>
                    <h6 class="mb-0 text-2xl leading-normal dark:text-white dark:opacity-60">
                        {{ $now->year }}
                    </h6>
                </div>
                <div class="flex-auto p-4">
                    <div>
                        <x-argon.chart.series :chart="$chartIncome"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 mt-0 lg:w-6/12 lg:flex-none">
            <div
                class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="capitalize dark:text-white">Pengguna Tahun Ini</h6>
                    <h6 class="mb-0 text-2xl leading-normal dark:text-white dark:opacity-60">
                        {{ $now->year }}
                    </h6>
                </div>
                <div class="flex-auto p-4">
                    <div>
                        <x-argon.chart.series :chart="$chartUser"/>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
