@extends('base')
@section('title', 'Enquiries')

@section('main-content')

<main class="px-1 lg:px-4 py-2 mx-2 ls:mx-10 my-5 h-screen">

    <div class="flex md:justify-between">
        <h1 class="text-3xl font-bold mb-6 text-indigo-600 hidden sm:inline">Enquiry details</h1>
        <div id="enquiry_id_here" class="mt-5 mr-5 mb-5 md:mt-0 md:mr-0 md:mb-0">
            <a href="{{ route('enquiries.create') }}" class="uppercase rounded bg-green-500 hover:bg-green-600 text-white outline-none h-9 px-2 py-2 mt-4 mr-2 block md:inline ml-2 sm:ml-0">
                <i class="fas fa-plus"></i> add new enquiry
            </a>
            <a href="{{ route('enquiries.edit', ['id' => 1]) }}" class="uppercase rounded bg-blue-500 hover:bg-blue-600 text-white outline-none h-9 px-2 py-2 mt-4 block md:inline ml-2 sm:ml-0">
                <i class="fas fa-edit"></i> this enquiry
            </a>
            <button type="button" class="enquiry-delete-btn ml-2 uppercase rounded bg-red-500 hover:bg-red-600 text-white focus:outline-none h-9 px-2 py-1 block mt-5 md:inline md:mt-0">
                <i class="fas fa-trash-alt"></i> Delete this enquiry
            </button>
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
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">Adam</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Name</th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">Adam</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Business
                        Name</th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">Adam</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Email</th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">Chris</td>
                </tr>
            </tbody>
        </table>

        <table class="w-100 lg:w-1/2 table-auto border-collapse border border-indigo-300 mt-5 lg:mt-0">
            <tbody>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Contact No.
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">Chris</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Subject
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">Chris</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Services
                    </th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">Chris</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Edit followup modal --}}
    <div
        class="z-10 modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-11/12 sm:w-1/3">
            <!-- modal header -->
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg text-indigo-700 text-2xl font-bold">Edit Follow Up</h3>
            </div>
            <!-- modal body -->
            <div class="p-3">
                <input id="followUpId" type="hidden" value="" />
                <div class="py-1 bg-indigo-100 mb-1 rounded">
                    <label class="block text-indigo-700 font-bold px-2">Date</label>
                    <input
                        class="w-11/12 px-2 py-1 mx-3 bg-indigo-100 border-b-2 border-gray-500 focus:border-indigo-700 outline-none"
                        id="followupDate" type="date" />
                </div>
                <div class="py-1 bg-indigo-100 mb-1 rounded">
                    <label class="block text-indigo-700 font-bold px-2">Time</label>
                    <input
                        class="w-11/12 px-2 py-1 mx-3 bg-indigo-100 border-b-2 border-gray-500 focus:border-indigo-700 outline-none"
                        id="followupTime" type="time" />
                </div>
                <div class="py-1 bg-indigo-100 mb-1 rounded">
                    <label class="block text-indigo-700 font-bold px-2">Remark</label>
                    <input
                        class="w-11/12 px-2 py-1 mx-3 bg-indigo-100 border-b-2 border-gray-500 focus:border-indigo-700 outline-none"
                        id="followupRemark" type="text" />
                </div>
                <div class="py-1 bg-indigo-100 mb-1 rounded">
                    <label class="block text-indigo-700 font-bold px-2">Outcome</label>
                    <input
                        class="w-11/12 px-2 py-1 mx-3 bg-indigo-100 border-b-2 border-gray-500 focus:border-indigo-700 outline-none"
                        id="followupOutcome" type="text" />
                </div>
            </div>
            <div class="flex justify-end items-center w-100 border-t p-3">
                <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1 close-modal focus:outline-none">
                    Cancel
                </button>
                <button class="bg-green-600 hover:bg-green-700 px-3 py-1 rounded text-white submit-follow-up-modal focus:outline-none">
                    Submit
                </button>
            </div>
        </div>
    </div>

    {{-- Delete followup modal --}}
    <div class="z-10 delete-modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-11/12 sm:w-1/3">
            <!-- modal header -->
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg text-indigo-700 text-lg font-bold">
                    Are you sure you want to delete this follow up? You can not recover this once deleted.
                </h3>
            </div>
            <!-- modal body -->
            <div class="p-3">
                <input id="deleteFollowUpId" type="hidden" value="" />
            </div>
            <div class="flex justify-end items-center w-100 border-t p-3">
                <button class="bg-green-600 hover:bg-green-700 px-3 py-1 rounded text-white mr-1 close-delete-modal focus:outline-none">
                    Cancel
                </button>
                <button class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white delete-follow-up-modal focus:outline-none">
                    Delete
                </button>
            </div>
        </div>
    </div>

    {{-- Delete enquiry modal --}}
    <div class="z-10 enquiry-delete-modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-11/12 sm:w-1/3">
            <!-- modal header -->
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg text-indigo-700 text-lg font-bold">
                    Are you sure you want to delete this enquiry? You can not recover this once deleted.
                </h3>
            </div>
            <!-- modal body -->
            <div class="p-3">
                <input id="deleteEnquiryId" type="hidden" value="" />
            </div>
            <div class="flex justify-end items-center w-100 border-t p-3">
                <button class="bg-green-600 hover:bg-green-700 px-3 py-1 rounded text-white mr-1 close-enquiry-delete-modal focus:outline-none">
                    Cancel
                </button>
                <button class="enquiry-delete-btn bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white enquiry-delete-btn-modal focus:outline-none">
                    Delete
                </button>
            </div>
        </div>
    </div>

    <div class="mb-10 lg:mb-20 pt-3 pb-5 px-5 rounded shadow-lg bg-indigo-100">
        <h2 class="text-2xl font-semibold mb-6 text-indigo-600">Follow ups</h2>

        <div class="relative w-100 m-1">
            <div class="border-r-2 border-yellow-400 absolute h-full top-0" style="left: 15px"></div>
            <ul class="list-none m-0 p-0">
                <li class="mb-10">
                    <div class="flex items-center">
                        <div class="bg-yellow-400 rounded-full h-8 w-8 mb-3"></div>
                        <div class="flex-1 ml-4 font-medium">Oct 2017 - First Release</div>
                    </div>
                    <div class="ml-12">
                        First release of Tailwind CSS
                    </div>
                    <div id="1" class="ml-12">
                        <button id="1" type="button"
                            class="follow-up-edit-btn px-3 py-1 uppercase font-semibold text-xs rounded bg-green-500 broder border-green-500 text-white hover:bg-green-600 focus:outline-none">
                            Edit
                        </button>
                        <button type="button"
                            class="follow-up-delete-btn px-3 py-1 uppercase font-semibold text-xs rounded bg-red-500 broder border-red-500 text-white hover:bg-red-600 focus:outline-none">
                            Delete
                        </button>
                    </div>
                </li>

                <li class="mb-10">
                    <div class="flex items-center">
                        <div class="bg-yellow-400 rounded-full h-8 w-8"></div>
                        <div class="flex-1 ml-4 font-medium">Nov 2017 - Multiple Releases</div>
                    </div>
                    <div class="ml-12">
                        v0.1.0 - v0.2.2
                    </div>
                    <div id="2" class="ml-12">
                        <button type="button"
                            class="follow-up-edit-btn px-3 py-1 uppercase font-semibold text-xs rounded bg-green-500 broder border-green-500 text-white hover:bg-green-600 focus:outline-none">
                            Edit
                        </button>
                        <button type="button"
                            class="follow-up-delete-btn px-3 py-1 uppercase font-semibold text-xs rounded bg-red-500 broder border-red-500 text-white hover:bg-red-600 focus:outline-none">
                            Delete
                        </button>
                    </div>
                </li>

                <li class="mb-10">
                    <div class="flex items-center">
                        <div class="bg-yellow-400 rounded-full h-8 w-8"></div>
                        <div class="flex-1 ml-4 font-medium">Feb 2018 - Other stuff happened</div>
                    </div>
                    <div class="ml-12">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus perspiciatis facilis deserunt
                        excepturi sunt pariatur consequuntur eveniet molestias ea quia? Magni veniam illo optio tempora
                        modi exercitationem qui adipisci ex.
                    </div>
                    <div id="3" class="ml-12">
                        <button type="button"
                            class="follow-up-edit-btn px-3 py-1 uppercase font-semibold text-xs rounded bg-green-500 broder border-green-500 text-white hover:bg-green-600 focus:outline-none">
                            Edit
                        </button>
                        <button type="button"
                            class="follow-up-delete-btn px-3 py-1 uppercase font-semibold text-xs rounded bg-red-500 broder border-red-500 text-white hover:bg-red-600 focus:outline-none">
                            Delete
                        </button>
                    </div>
                </li>

                <li class="mb-10">
                    <div class="flex items-center">
                        <div class="bg-yellow-400 rounded-full h-8 w-8"></div>
                        <div class="flex-1 ml-4 font-medium">July 2018 - More stuff happened</div>
                    </div>
                    <div class="ml-12">
                        Consequuntur odit explicabo officiis veniam incidunt non velit ex consectetur magnam minima vero
                        hic impedit cumque, blanditiis autem distinctio facere dolor atque facilis, eos, labore sunt
                        iusto. Beatae, quas, dolorem?
                    </div>
                    <div id="4" class="ml-12">
                        <button type="button"
                            class="follow-up-edit-btn px-3 py-1 uppercase font-semibold text-xs rounded bg-green-500 broder border-green-500 text-white hover:bg-green-600 focus:outline-none">
                            Edit
                        </button>
                        <button type="button"
                            class="follow-up-delete-btn px-3 py-1 uppercase font-semibold text-xs rounded bg-red-500 broder border-red-500 text-white hover:bg-red-600 focus:outline-none">
                            Delete
                        </button>
                    </div>
                </li>

            </ul>
        </div>

    </div>

</main>

@endsection
@section('footer-scripts')
    <script type="text/javascript" src="{{ asset('js/enquiries_swal.js') }}"></script>
@endsection
