@extends('base')
@section('title', 'Transactions')

@section('main-content')

<main class="px-1 lg:px-4 py-2 mx-2 ls:mx-10 my-5 h-screen">
    <div class="flex justify-between">
        <h1 class="text-3xl font-bold mb-6 text-indigo-600">Transactions</h1>
    </div>

    <div class="px-5 py-5 mb-5 rounded shadow-lg bg-indigo-100">
        <table class="w-full table-auto border-collapse border border-indigo-800 text-xs md:text-base">
            <thead class="bg-indigo-600">
                <tr>
                    <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left">
                        #</th>
                    <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left hidden md:table-cell">
                        Details</th>
                    <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left hidden md:table-cell">
                        Timestamp</th>
                    {{-- <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase">Actions</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr class="h-12">
                        <td class="w-1/12 px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-left">
                            {{ $transaction->id }}
                        </td>
                        <td class="w-9/12 px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-center md:text-left break-words">
                            {{  $transaction->details }}
                        </td>
                        <td class="w-2/12 px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-center md:text-left break-words">
                            {{  $transaction->created_at->format('d-M-Y') }} at {{ $transaction->created_at->format('g:i A') }}
                        </td>
                        {{-- <td class="px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-center">
                            <div class="dropdown inline-block relative p-2">
                                <button
                                    class="bg-blue-500 text-white font-semibold py-1 px-4 rounded inline-flex items-center focus:outline-none">
                                    <span class="mr-1 uppercase text-xs md:text-sm">Actions</span>
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </button>
                                <ul class="rounded z-10 dropdown-menu absolute hidden text-blue-400 pt-1 w-28 border border-blue-400">
                                    <li>
                                        <a href="{{ route('transactions.show', ['id' => $transaction->id]) }}" class="uppercase text-sm font-semibold w-full rounded-t bg-white hover:bg-green-500 text-green-400 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                            View
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('transactions.edit', ['id' => $transaction->id]) }}" class="uppercase text-sm font-semibold w-full bg-white hover:bg-blue-500 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                            Edit
                                        </a>
                                    </li>
                                    <li id="{{ $transaction->id }}">
                                        <button class="entry-delete-btn uppercase text-sm font-semibold w-full bg-white text-red-600 hover:bg-red-500 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                            Delete
                                        </button>
                                    </li>
                                </ul>
                            </div>

                        </td> --}}
                    </tr>
                    {{-- <input type="hidden" id="deleteUrl{{ $transaction->id }}" value="{{ route('transactions.destroy', ['id' => $transaction->id]) }}"> --}}
                @endforeach

                {{-- Required for delete action --}}
                {{-- <input type="hidden" id="deletedBtnText" value="Yes, delete it!">
                <input type="hidden" id="deletedTitle" value="Deleted!">
                <input type="hidden" id="deletedMsg" value="The selected transaction was successfully deleted."> --}}

            </tbody>
        </table>

        @if (count($transactions) < 1)
            <div class="px-4 py-5 text-center text-gray-500">
                No results found!
            </div>
        @endif

        {{-- TODO: Add Pagination --}}

    </div>
</main>

@endsection
