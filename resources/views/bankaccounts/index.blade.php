@extends('base')
@section('title', 'Bank Accounts & Balance')

@section('main-content')

<main class="px-1 lg:px-4 py-2 mx-2 ls:mx-10 my-5 h-screen">
    <div class="flex justify-between">
        <h1 class="text-3xl font-bold mb-6 text-indigo-600">Bank Accounts & Balance</h1>
    </div>

    <div class="flex flex-col lg:flex-row mb-10 px-5 py-6 rounded shadow-lg bg-indigo-100">
        <table class="w-100 lg:w-1/2 table-auto border-collapse border border-indigo-300 mr-0 lg:mr-5">
            <tbody>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Current Balance
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold text-green-500 text-2xl">
                        {{ App\Lancer\Utilities::CURRENCY_SYMBOL }} {{ $bank_account->current_balance }}
                    </td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Last Known Balance</th>
                    <td class="px-3 border-collapse border border-indigo-300">
                        {{ App\Lancer\Utilities::CURRENCY_SYMBOL }} {{ $bank_account->last_balance }}
                        <br>
                        <div class="text-xs text-gray-400">(This may be inaccurate.)</div>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</main>

@endsection
