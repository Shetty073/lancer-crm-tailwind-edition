@extends('base')
@section('title', 'Manage Users')

@section('main-content')

<main class="px-1 lg:px-4 py-2 mx-2 ls:mx-10 my-5 h-screen">
    <div class="flex justify-between">
        <h1 class="text-3xl font-bold mb-6 text-indigo-600">Manage Users</h1>
        <a href="{{ route('useraccounts.create') }}"
            class="uppercase rounded bg-green-500 hover:bg-green-600 text-white focus:outline-none h-8 px-2 pt-1">
            <i class="fas fa-plus"></i> add new user
        </a>
    </div>

    <div class="px-5 py-5 mb-5 rounded shadow-lg bg-indigo-100">
        <table class="w-full table-auto border-collapse border border-indigo-800 text-xs md:text-base">
            <thead class="bg-indigo-600">
                <tr>
                    <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left">
                        #</th>
                    <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left hidden md:table-cell">
                        Name</th>
                    <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left hidden md:table-cell">
                        Email</th>
                    <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left hidden md:table-cell">
                        Photo</th>
                    <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left hidden md:table-cell">
                        Role</th>
                    <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="h-12">
                        <td class="w-1/12 px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-left">
                            {{ $user->id }}
                        </td>
                        <td class="w-3/12 px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-center md:text-left break-words">
                            {{  $user->name }}
                        </td>
                        <td class="w-3/12 px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-center md:text-left break-words">
                            {{  $user->email }}
                        </td>
                        <td class="w-1/12 px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-center md:text-left break-words">
                            @if (isset($user->photo_url))
                                <a href="{{ asset('storage/profile_picture/' . $user->photo_url) }}" target="_blank" rel="noopener noreferrer">
                                    <img height="42" width="42" src="{{ asset('storage/profile_picture/' . $user->photo_url) }}" alt='profile photo'
                                    class="inline w-9 h-9 pr-1" />
                                </a>
                            @else
                                <span class="text-indigo-500">
                                    <i class="fas fa-user-circle fa-lg"></i>
                                </span>
                            @endif
                        </td>
                        <td class="w-1/12 px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-center md:text-left break-words">
                            {{ implode(', ', $user->roles->pluck('name')->toArray()) }}
                        </td>
                        <td class="w-2/12 px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-center">
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
                                        <a href="{{ route('useraccounts.show', ['id' => $user->id]) }}" class="uppercase text-sm font-semibold w-full rounded-t bg-white hover:bg-green-500 text-green-400 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                            View
                                        </a>
                                    </li>
                                    @if($user->id !== auth()->user()->id)
                                        <li>
                                            <a href="{{ route('useraccounts.edit', ['id' => $user->id]) }}" class="uppercase text-sm font-semibold w-full bg-white hover:bg-blue-500 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                                Edit
                                            </a>
                                        </li>
                                        <li id="{{ $user->id }}">
                                            <button class="entry-delete-btn uppercase text-sm font-semibold w-full bg-white text-red-600 hover:bg-red-500 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                                Delete
                                            </button>
                                        </li>
                                    @endif
                                </ul>
                            </div>

                        </td>
                    </tr>
                    <input type="hidden" id="deleteUrl{{ $user->id }}" value="{{ route('useraccounts.destroy', ['id' => $user->id]) }}">
                @endforeach

                {{-- Required for delete action --}}
                <input type="hidden" id="deletedBtnText" value="Yes, delete it!">
                <input type="hidden" id="deletedTitle" value="Deleted!">
                <input type="hidden" id="deletedMsg" value="The selected user was successfully deleted.">

            </tbody>
        </table>

        @if (count($users) < 1)
            <div class="px-4 py-5 text-center text-gray-500">
                No results found!
            </div>
        @endif

        {{-- TODO: Add Pagination --}}

    </div>
</main>

@endsection

@section('footer-scripts')
    <script type="text/javascript" src="{{ asset('js/delete_entry.js') }}"></script>
@endsection
