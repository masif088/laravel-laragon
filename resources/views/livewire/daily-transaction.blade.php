@php use App\Models\Payment; @endphp
@php use App\Models\Transaction; @endphp
<div class="w-full max-w-full mt-3 lg:w-12/12 lg:flex-none">
    <div
    class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">


    <div class="grid grid-cols-1 gap-3 p-4 lg:grid-cols-1 xl:grid-cols-1">
        <div class="overflow-x-auto relative ">
            <table
                class="text-center border-collapse border-slate-400 w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded table-auto">
                <thead class=" text-md text-uppercase text-gray-700 uppercase dark:bg-dark dark:text-white text-bold">
                <tr class="border-b border-primary border-collapse">
                    <th class="py-2 px-6">Tanggal</th>
                    <th class="py-2 px-6">Jumlah Transaksi</th>
                    <th class="py-2 px-6">Uang yang Masuk Transaksi</th>
                    <th class="py-2 px-6">Catatan Pembayaran</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($datas as $index=>$data)
                    <tr class=" dark:text-white text-black border-b border-primary  @if($index%2!=0) bg-gray-50 dark:bg-slate-850 @endif">
                        <td class="py-2 px-6" style="">{{ \Carbon\Carbon::parse($data->date_payment)->format('d/m/Y') }}</td>
                        <td class="py-2 px-6">{{ $data->total  }} transaksi</td>
                        <td class="py-2 px-6" style="">Rp. {{ thousand_format($data->money) }}</td>
                        <td>
                            @foreach(Payment::get() as $payment)
                                @php($total =Transaction::where('payment_id','=',$payment->id)->where('date_payment','=',$data->date_payment)->where('transaction_status_id','=',2)->sum('money'))
                                @if($total!=0)
                                    {{ $payment->name }} : Rp. {{ thousand_format($total) }} <br>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div id="table_pagination" class="py-3">
            {{ $datas->onEachSide(1)->links('pagination::tailwind') }}
        </div>


    </div>
</div>


</div>
