{{-- Form --}}
@csrf
<div class="rounded bg-indigo-100 shadow-lg px-6">
    <div class="divide-y divide-gray-200">
        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
            <div class="flex flex-col md:flex-row">
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">Payer</label>
                    <input type="text" name="payer"
                        class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="Payer Name" value="@if(isset($payment)){{ $payment->payer }}@else{{ old('payer') }}@endif" required>
                </div>

                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">Amount ({{ App\Lancer\Utilities::CURRENCY_SYMBOL }})</label>
                    <input type="number" step="0.01" name="amount"
                        class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="Amount in {{ App\Lancer\Utilities::CURRENCY_SYMBOL }}" value="@if(isset($payment)){{ $payment->amount }}@else{{ old('amount') }}@endif" required>
                </div>

                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">Date of Payment</label>
                    <input type="date" name="date_of_payment"
                        class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        value="@if(isset($payment)){{ $payment->date_of_payment->format('Y-m-d') }}@else{{ Carbon\Carbon::now()->format('Y-m-d') }}@endif" required>
                </div>

                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">Payment Mode</label>
                    <select name="payment_mode" class="px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" required>
                        @foreach ($payment_modes as $payment_mode)
                            <option value="{{ $payment_mode->id }}" @if(isset($due)) @if($payment_mode->id == $due->payment_mode->id) selected @endif @endif>{{ $payment_mode->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex flex-col md:flex-row">
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">Remark</label>
                    <input type="text" name="remark"
                        class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="Remark" value="@if(isset($payment)){{ $payment->remark }}@else{{ old('remark') }}@endif" >
                </div>
            </div>

            <div class="flex flex-row">
                <button type="submit" class="w-6/12 md:w-2/12 px-1 py-2 rounded bg-green-500 hover:bg-green-700 text-white focus:outline-none mr-2">
                    @if(isset($payment))
                        Update
                    @else
                        Create
                    @endif
                </button>
                <a href="{{ route('payments.index') }}" class="w-6/12 md:w-2/12 text-center px-1 py-2 rounded bg-red-500 hover:bg-red-700 text-white focus:outline-none">
                    Cancel
                </a>
            </div>

        </div>
    </div>
</div>
