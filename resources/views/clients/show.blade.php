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
            <input type="hidden" id="deleteClientUrl" value="{{ route('clients.destroy', ['id' => $client->id]) }}">
            @if($client->is_active)
                <button type="button"
                    class="client-delete-btn ml-2 uppercase rounded bg-red-500 hover:bg-red-600 text-white focus:outline-none h-9 px-2 py-1 block mt-5 md:inline md:mt-0">
                    <i class="fas fa-trash-alt"></i> mark as inactive
                </button>
            @else
                <button type="button"
                    class="client-delete-btn ml-2 uppercase rounded bg-green-500 hover:bg-green-600 text-white focus:outline-none h-9 px-2 py-1 block mt-5 md:inline md:mt-0">
                    <i class="fas fa-trash-restore"></i> mark as active
                </button>
            @endif
        </div>
    </div>

    {{-- Delete client modal --}}
    <div class="z-10 client-delete-modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
    <!-- modal -->
        <div class="bg-white rounded shadow-lg w-11/12 sm:w-1/3">
            <!-- modal header -->
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg text-indigo-700 text-lg font-bold">
                    Are you sure you want to mark this client as @if($client->active)inactive? @else active?@endif
                </h3>
            </div>
            <!-- modal body -->
            <div class="p-3">
                <input id="deleteClientId" type="hidden" value="{{ $client->id }}" />
            </div>
            <div class="flex justify-end items-center w-100 border-t p-3">
                <button
                    class="bg-green-600 hover:bg-green-700 px-3 py-1 rounded text-white mr-1 close-client-delete-modal focus:outline-none">
                    Cancel
                </button>
                <button
                    class="client-delete-btn bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white client-delete-btn-modal focus:outline-none">
                    Yes, mark!
                </button>
            </div>
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

    {{-- // TODO: Implement create project in this page --}}
</main>

@endsection
@section('footer-scripts')
    <script type="text/javascript" src="{{ asset('js/clients_swal.js') }}"></script>
@endsection
