<div>
    <div class="flex flex-wrap -mx-3">
        @foreach($payments as $payment)
            <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4 ">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-blue-800 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex-auto p-4 ">
                        <div class="flex flex-row -mx-3 ">
                            <div class="flex-none w-2/3 max-w-full px-3 ">
                                <div>
                                    <p class="mb-0 font-sans text-sm font-bold leading-normal uppercase dark:text-white dark:opacity-60 text-white">
                                        {{ $payment->name }}
                                    </p>
                                    <h5 class="mb-2 font-bold text-white">
                                        {{ $payment->no_reference }}
                                    </h5>
                                    <p class="mb-0 text-white dark:opacity-60">
                                        a/n {{ $payment->on_behalf }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br><br><br>
    <a href="{{ route('member.confirmation-payment') }}"
       class="rounded-md bg-green-success mt-3  px-10 py-2 font-semibold text-white text-center">
        Konfirmasi Pembayaran
    </a>
</div>
