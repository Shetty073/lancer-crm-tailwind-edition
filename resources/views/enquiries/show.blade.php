@extends('base')
@section('title', 'Enquiry details')

@section('main-content')

<main class="px-1 lg:px-4 py-2 mx-2 ls:mx-10 my-5 h-screen">

    <div class="flex md:justify-between">
        <h1 class="text-3xl font-bold mb-6 text-indigo-600 hidden sm:inline">Enquiry details</h1>
        <div id="{{ $enquiry->id }}" class="mt-5 mr-5 mb-5 md:mt-0 md:mr-0 md:mb-0">
            <a href="{{ route('enquiries.create') }}"
                class="uppercase rounded bg-green-500 hover:bg-green-600 text-white outline-none h-9 px-2 py-2 mt-4 mr-2 block md:inline ml-2 sm:ml-0">
                <i class="fas fa-plus"></i> add new enquiry
            </a>
            @if($enquiry->enquiry_status->id < 4)
                <a href="{{ route('enquiries.edit', ['id' => $enquiry->id]) }}"
                    class="uppercase rounded bg-blue-500 hover:bg-blue-600 text-white outline-none h-9 px-2 py-2 mt-4 block md:inline ml-2 sm:ml-0">
                    <i class="fas fa-edit"></i> edit this enquiry
                </a>
                <button type="button"
                    class="entry-delete-btn ml-2 uppercase rounded bg-red-500 hover:bg-red-600 text-white focus:outline-none h-9 px-2 py-1 block mt-5 md:inline md:mt-0">
                    <i class="fas fa-trash-alt"></i> Mark this as lost
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
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">{{ $enquiry->id }}</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Name</th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">{{ $enquiry->name }}</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Business
                        Name</th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">{{ $enquiry->business_name }}
                    </td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Email</th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">{{ $enquiry->email }}</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Contact No.
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">{{ $enquiry->contact_no }}</td>
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
                        {{ $enquiry->subject }}</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Project
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold h-12 break-words">
                        {{ $enquiry->project->name }}</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Configuration
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold h-12 break-words">
                        {{ $enquiry->configuration->name }}</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Budget Range
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold h-12 break-words">
                        {{ App\Lancer\Utilities::CURRENCY_SYMBOL }} {{ $enquiry->budget_range->range }}</td>
                </tr>
            </tbody>
        </table>
    </div>


    <div class="pt-3 px-5 rounded shadow-lg bg-indigo-100 mb-10 lg:pb-5">
        <div class="flex justify-between">
            <h2 class="text-2xl font-semibold mb-2 text-indigo-600">Status</h2>
        </div>
        <div class="relative w-max mx-1 mb-10">
            <div class="{{ App\Lancer\Utilities::getEnquiryStatusStyle($enquiry->enquiry_status->id) }} text-xl">
                {{ $enquiry->enquiry_status->status }}
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-semibold text-indigo-600">Update status or project</h2>
        </div>
        <form method="post" action="{{ route('enquiries.updateStatus', ['id' => $enquiry->id]) }}">
            @csrf
            <div class="flex flex-column md:flex-row mb-3">
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">status</label>
                    <select name="enquiry_status" class="px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" required>
                        @foreach ($enquiry_statuses as $status)
                            <option value="{{ $status->id }}" @if(isset($enquiry)) @if($status->id == $enquiry->enquiry_status->id) selected @endif @endif>{{ $status->status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">project</label>
                    <select name="project_id" class="px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" required>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" @if(isset($enquiry)) @if($project->id == $enquiry->project->id) selected @endif @endif>{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex flex-row">
                <button type="submit" class="w-max px-2 py-2 rounded bg-blue-500 hover:bg-blue-700 text-white focus:outline-none mr-2">
                    Update
                </button>
            </div>

        </form>

    </div>


    <div class="pt-3 pb-2 px-5 rounded shadow-lg bg-indigo-100 mb-2 lg:pb-20">
        <div class="flex justify-between">
            <h2 class="text-2xl font-semibold mb-6 text-indigo-600">Follow ups</h2>
            @if($enquiry->enquiry_status->id < 4)
                <button class="add-followup-btn uppercase rounded bg-green-500 hover:bg-green-600 text-white focus:outline-none px-2 mt-0 mb-4 sm:mt-1 sm:mb-5 block md:inline">
                    <i class="fas fa-plus"></i> add follow up
                </button>
            @endif
        </div>

        <div class="relative w-100 m-1">
            <div class="border-r-2 border-yellow-400 absolute h-full top-0" style="left: 15px"></div>
            <ul class="list-none m-0 p-0">
                @foreach ($followups as $followup)
                <input type="hidden" id="date_time{{ $followup->id }}"
                    value="{{ $followup->date_time->format('Y-m-d') }}T{{ $followup->date_time->format('H:m') }}">
                <input type="hidden" id="remark{{ $followup->id }}" value="{{ $followup->remark }}">
                <input type="hidden" id="outcome{{ $followup->id }}" value="{{ $followup->outcome }}">
                <li class="mb-10">
                    <div class="flex items-center">
                        @if($followup->date_time->format('d-m-Y') < Carbon\Carbon::now()->format('d-m-Y'))
                            <div class="bg-yellow-400 rounded-full h-8 w-8"></div>
                        @elseif ($followup->date_time->format('d-m-Y') === Carbon\Carbon::now()->format('d-m-Y'))
                            <div class="bg-green-400 z-10 rounded-full h-8 w-8"></div>
                        @else
                            <div class="bg-gray-900 z-10 rounded-full h-8 w-8"></div>
                        @endif

                        <div class="flex-1 ml-4 font-medium">{{ $followup->date_time->format('d M, Y') }} -
                            {{ $followup->remark }}</div>
                    </div>
                    <div class="ml-12">
                        @if ($followup->outcome)
                        <b>Outcome: </b>{{ $followup->outcome }}
                        @endif
                    </div>
                    <div id="{{ $followup->id }}" class="ml-12">
                        <button type="button"
                            class="follow-up-edit-btn px-3 py-1 uppercase font-semibold text-xs rounded bg-blue-500 broder border-blue-500 text-white hover:bg-blue-600 focus:outline-none">
                            Edit
                        </button>
                        <input type="hidden" id="editfollowupurl{{ $followup->id }}" value="{{ route('followups.update', ['id' => $followup->id]) }}">
                        <input type="hidden" id="deletefollowupurl{{ $followup->id }}" value="{{ route('followups.destroy', ['id' => $followup->id]) }}">
                        <button type="button"
                            class="follow-up-delete-btn px-3 py-1 uppercase font-semibold text-xs rounded bg-red-500 broder border-red-500 text-white hover:bg-red-600 focus:outline-none">
                            Delete
                        </button>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>

    </div>

    <br>

    {{-- Required for mark delete action --}}
    <input type="hidden" id="deleteUrl{{ $enquiry->id }}" value="{{ route('enquiries.destroy', ['id' => $enquiry->id]) }}">
    <input type="hidden" id="deletedBtnText" value="Yes, mark it!">
    <input type="hidden" id="deletedTitle" value="Marked as lost!">
    <input type="hidden" id="deletedMsg" value="The selected enquiry has been successfully marked as lost.">

    {{-- Required for close deal action --}}
    <input type="hidden" id="closedRedirectUrl" value="{{ route('enquiries.index') }}">

    {{-- Required for followup related actions --}}
    <input type="hidden" id="addfollowupurl" value="{{ route('followups.store') }}">
    <input type="hidden" id="enquiryid" value="{{ $enquiry->id }}">

</main>

@endsection
@section('footer-scripts')
    <script type="text/javascript" src="{{ asset('js/enquiry_lost.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/followups_swal.js') }}"></script>
@endsection
