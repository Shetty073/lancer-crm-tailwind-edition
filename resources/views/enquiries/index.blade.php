@extends('base')
@section('title', 'Enquiries')

@section('main-content')

<main class="px-1 lg:px-4 py-2 mx-2 ls:mx-10 my-5 h-screen">

    <div class="flex justify-between">
        <h1 class="text-3xl font-bold mb-6 text-indigo-600">Enquiries</h1>
        @can('enquiry_create')
        <a href="{{ route('enquiries.create') }}"
            class="uppercase rounded bg-green-500 hover:bg-green-600 text-white focus:outline-none h-8 px-2 pt-1">
            <i class="fas fa-plus"></i> add new enquiry
        </a>
        @endcan
    </div>

    <div class="px-5 py-5 mb-5 rounded shadow-lg bg-indigo-100 overflow-x-auto">
        <table class="w-full table-auto border-collapse border border-indigo-800 text-xs md:text-base">
            <thead class="bg-indigo-600">
                <tr>
                    <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left">
                        #</th>
                    <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left w-full md:w-72">
                        Name</th>
                    <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left md:table-cell">
                        Subject</th>
                    <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left md:table-cell">
                        Email</th>
                    <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left md:table-cell">
                        Contact No.</th>
                    <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left">
                        Status</th>
                    <th class="px-1 md:px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase">Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($enquiries as $enquiry)
                    <tr class="h-12">
                        <td class="px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-left">{{ $enquiry->id }}</td>
                        <td style="max-width: 100px;" class="px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-center md:text-left break-words">{{ $enquiry->name }}</td>
                        <td class="px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-left md:table-cell">{{ $enquiry->subject }}</td>
                        <td class="px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-left md:table-cell">{{ $enquiry->email }}</td>
                        <td class="px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-left md:table-cell">{{ $enquiry->contact_no }}</td>
                        <td class="px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-center">
                            <span class="{{ $utilities->getEnquiryStatusStyle($enquiry->enquiry_status->id) }}">
                                {{ $enquiry->enquiry_status->status }}
                            </span>
                        </td>
                        <td class="px-1 md:px-3 border-collapse border border-indigo-800 font-bold text-center">

                            <div class="dropdown inline-block relative p-2">
                                <button class="bg-blue-500 text-white font-semibold py-1 px-4 rounded inline-flex items-center focus:outline-none">
                                    <span class="mr-1 uppercase text-xs md:text-sm">Actions</span>
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </button>
                                <ul class="rounded z-10 dropdown-menu absolute hidden text-blue-400 pt-1 w-28 border border-blue-400">
                                    @if (!$enquiry->is_lost)
                                        @can('enquiry_show')
                                        <li>
                                            <a href="{{ route('enquiries.show', ['id' => $enquiry->id]) }}" class="uppercase text-sm font-semibold w-full rounded-t bg-white hover:bg-green-500 text-green-400 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                                View
                                            </a>
                                        </li>
                                        @endcan
                                        @can('enquiry_edit')
                                        @if($enquiry->enquiry_status->id < 4)
                                            <li>
                                                <a href="{{ route('enquiries.edit', ['id' => $enquiry->id]) }}" class="uppercase text-sm font-semibold w-full bg-white hover:bg-blue-500 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                                    Edit
                                                </a>
                                            </li>
                                            <li id="{{ $enquiry->id }}">
                                                <a href="{{ route('enquiries.close', ['id' => $enquiry->id]) }}" class="close-deal-btn uppercase text-sm font-semibold w-full bg-white text-green-600 hover:bg-green-600 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                                    Close deal
                                                </a>
                                            </li>
                                            <li id="{{ $enquiry->id }}">
                                                <button class="entry-delete-btn uppercase text-sm font-semibold w-full bg-white text-red-600 hover:bg-red-500 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                                    Mark as lost
                                                </button>
                                            </li>
                                        @endif
                                        @endcan
                                    @endif
                                </ul>
                            </div>

                        </td>
                    </tr>
                    <input type="hidden" id="deleteUrl{{ $enquiry->id }}" value="{{ route('enquiries.destroy', ['id' => $enquiry->id]) }}">
                @endforeach
                {{-- Required for mark delete action --}}
                <input type="hidden" id="deletedBtnText" value="Yes, mark it!">
                <input type="hidden" id="deletedTitle" value="Marked as lost!">
                <input type="hidden" id="deletedMsg" value="The selected enquiry has been successfully marked as lost.">

            </tbody>
        </table>

        @if (count($enquiries) < 1)
            <div class="px-4 py-5 text-center text-gray-500">
                No results found!
            </div>
        @endif

        <div class="mt-4">
            {{ $enquiries->links() }}
        </div>

    </div>

</main>

@endsection

@section('footer-scripts')
<script type="text/javascript" src="{{ asset('js/enquiry_lost.js') }}"></script>
@endsection
