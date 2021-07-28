@extends('base')
@section('title', 'Client details')

@section('main-content')

<main class="px-1 lg:px-4 py-2 mx-2 ls:mx-10 my-5 h-screen">
    <div class="flex md:justify-between">
        <h1 class="text-3xl font-bold mb-6 text-indigo-600 hidden sm:inline">Client details</h1>
        <div id="{{ $client->id }}" class="mt-5 mr-5 mb-5 md:mt-0 md:mr-0 md:mb-0">
            <a href="{{ route('clients.create') }}"
                class="uppercase rounded bg-green-500 hover:bg-green-600 text-white outline-none h-9 px-2 py-2 mt-4 mr-2 block md:inline ml-2 sm:ml-0">
                <i class="fas fa-plus"></i> add new client
            </a>
            <a href="{{ route('clients.edit', ['id' => $client->id]) }}"
                class="uppercase rounded bg-blue-500 hover:bg-blue-600 text-white outline-none h-9 px-2 py-2 mt-4 block md:inline ml-2 sm:ml-0">
                <i class="fas fa-edit"></i> edit this client
            </a>
            @if($client->is_active)
                <button type="button"
                    class="entry-delete-btn ml-2 uppercase rounded bg-red-500 hover:bg-red-600 text-white focus:outline-none h-9 px-2 py-1 block mt-5 md:inline md:mt-0">
                    <i class="fas fa-trash-alt"></i> mark as inactive
                </button>
            @else
                <button type="button"
                    class="entry-delete-btn ml-2 uppercase rounded bg-green-500 hover:bg-green-600 text-white focus:outline-none h-9 px-2 py-1 block mt-5 md:inline md:mt-0">
                    <i class="fas fa-trash-restore"></i> mark as active
                </button>
            @endif
        </div>
    </div>

    <div class="flex flex-col lg:flex-row mb-10 px-5 py-6 rounded shadow-lg bg-indigo-100">
        <table class="w-100 lg:w-1/2 table-auto border-collapse border border-indigo-300 mr-0 lg:mr-5">
            <tbody>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        #
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">{{ $client->id }}</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Name</th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">{{ $client->name }}</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Business
                        Name</th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">{{ $client->business_name }}
                    </td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Email</th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">{{ $client->email }}</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Contact No.
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">{{ $client->contact_no }}</td>
                </tr>
            </tbody>
        </table>

        <table class="w-100 lg:w-1/2 table-auto border-collapse border border-indigo-300 mt-5 lg:mt-0">
            <tbody>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Subject
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold h-12 break-words">
                        {{ $client->subject }}
                    </td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Remark
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold h-12 break-words">
                        {{ $client->remark }}
                    </td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Rating
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold h-12 break-words">
                        <div class="mb-1 pt-1 rounded mr-4" id="ratingDisplayDiv">
                            <?php
                                $filled_stars = $client->rating;
                                $empty_stars = 5 - $filled_stars;
                            ?>
                            @for ($i = 0; $i < $filled_stars; $i++)
                                <span>
                                    <i class="fas fa-star text-indigo-600 cursor-pointer"></i>
                                </span>
                            @endfor
                            @for ($i = 0; $i < $empty_stars; $i++)
                                <span>
                                    <i class="far fa-star text-indigo-600 cursor-pointer"></i>
                                </span>
                            @endfor
                        </div>
                    </td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Status
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold h-12 break-words">
                        <span class="{{ App\Lancer\Utilities::getClientStatusStyle($client->is_active) }}">
                            {{ App\Lancer\Utilities::getClientStatus($client->is_active) }}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="flex flex-col lg:flex-row mb-10 px-5 py-6 rounded shadow-lg bg-indigo-100">
        <table class="w-100 lg:w-1/2 table-auto border-collapse border border-indigo-300 mr-0 lg:mr-5">
            <tbody>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Project
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">{{ $client->project->name }}</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Configuration</th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">{{ $client->configuration->name }}</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Carpet
                        Area</th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">{{ $client->carpet_area }} Sq. Ft.
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="w-100 lg:w-1/2 table-auto border-collapse border border-indigo-300 mt-5 lg:mt-0">
            <tbody>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Agreement Value
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold h-12 break-words">
                        {{ App\Lancer\Utilities::CURRENCY_SYMBOL }} {{ $client->agreement_value }}
                    </td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Booking Amount
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold h-12 break-words">
                        {{ App\Lancer\Utilities::CURRENCY_SYMBOL }} {{ $client->booking_amount }}
                    </td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Payment Mode
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold h-12 break-words">
                        <div class="mb-1 pt-1 rounded mr-4" id="ratingDisplayDiv">
                            {{ $client->payment_mode->name }}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Required for mark inactive/active action --}}
    <input type="hidden" id="deleteUrl{{ $client->id }}" value="{{ route('clients.destroy', ['id' => $client->id]) }}">
    <input type="hidden" id="deletedBtnText" value="Yes, mark it!">
    <input type="hidden" id="deletedTitle" value="Marked!">
    <input type="hidden" id="deletedMsg" value="Your request has been successfully completed.">

</main>

@endsection
@section('footer-scripts')
    <script type="text/javascript" src="{{ asset('js/delete_entry.js') }}"></script>
@endsection
