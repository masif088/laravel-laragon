<div class="w-full max-w-full mt-3 lg:w-6/12 lg:flex-none">
    <form wire:submit.prevent="download"
        class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
        <h3 class="pt-4 pl-4 dark:text-white">Rekap Transaksi</h3>
        <div class="flex flex-wrap px-4 mb-4">
            <div class=" max-w-full px-3 mb-6 w-1/2 sm:flex-none xl:mb-0 ">
                <label class="block text-sm font-bold dark:text-white" for="data">
                    Dari Tanggal
                </label>
                <input
                    wire:model="dateStart"
                    id="data"
                    type="date"
                    class="bg-gray-200 appearance-none border-1 border border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none dark:border-primary-light focus:bg-gray-100 dark:bg-dark dark:text-light focus:dark:border-white"
                >
            </div>
            <div class=" max-w-full px-3 mb-6 w-1/2 sm:flex-none xl:mb-0 ">
                <label class="block text-sm font-bold dark:text-white" for="data2">
                    Hingga Tanggal
                </label>
                <input
                    wire:model="dateEnd"
                    id="data2"
                    type="date"
                    class="bg-gray-200 appearance-none border-1 border border-gray-100 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none dark:border-primary-light focus:bg-gray-100 dark:bg-dark dark:text-light focus:dark:border-white"
                >
            </div>
        </div>
        <div class=" max-w-full px-6 w-full sm:flex-none xl:mb-0 mb-4 pb-4">
            <button class="bg-red-primary appearance-none border-1 border border-gray-100 rounded w-full py-2 px-4 text-white leading-tight focus:outline-none dark:border-primary-light focus:bg-gray-100 dark:bg-dark dark:text-light focus:dark:border-white">
                Download
            </button>
        </div>
    </form>
</div>
