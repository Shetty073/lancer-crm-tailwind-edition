@extends('base')
@section('title', 'Enquiries')

@section('main-content')

<main class="px-1 lg:px-4 py-2 mx-2 ls:mx-10 my-5">

    <div class="flex justify-between">
        <h1 class="text-3xl font-bold mb-6 text-indigo-600">Enquiries</h1>
        <a href="{{ route('enquiries.create') }}"
            class="uppercase rounded bg-green-500 hover:bg-green-600 text-white focus:outline-none h-8 px-2 pt-1">
            <i class="fas fa-plus"></i> add new enquiry
        </a>
    </div>

    {{-- Delete enquiry modal --}}
    <div
        class="z-10 enquiry-delete-modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
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
                <button
                    class="bg-green-600 hover:bg-green-700 px-3 py-1 rounded text-white mr-1 close-enquiry-delete-modal focus:outline-none">
                    Cancel
                </button>
                <button
                    class="bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white enquiry-delete-btn-modal focus:outline-none">
                    Delete
                </button>
            </div>
        </div>
    </div>

    <div class="px-5 py-5 mb-5 rounded shadow-lg bg-indigo-100">
        <table class="w-full table-auto border-collapse border border-indigo-800">
            <thead class="bg-indigo-600">
                <tr>
                    <th class="px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left">
                        #</th>
                    <th class="px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left">
                        Name</th>
                    <th class="px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left">
                        Business Name</th>
                    <th class="px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left">
                        Email</th>
                    <th class="px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left">
                        Contact No.</th>
                    <th class="px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase text-left">
                        Status</th>
                    <th class="px-3 border-collapse border border-indigo-800 text-white font-extrabold uppercase">Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="h-12">
                    <td class="px-3 border-collapse border border-indigo-800 font-bold text-left">1</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold text-left">Adam</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold text-left">858</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold text-left">858</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold text-left">858</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold text-left">858</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold">

                        <div class="dropdown inline-block relative p-2">
                            <button
                                class="bg-blue-500 text-white font-semibold py-1 px-4 rounded inline-flex items-center focus:outline-none">
                                <span class="mr-1 uppercase text-sm">Actions</span>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </button>
                            <ul class="rounded z-10 dropdown-menu absolute hidden text-blue-400 pt-1 w-28 border border-blue-400">
                                <li>
                                    <button class="uppercase text-sm font-semibold w-full rounded-t bg-white hover:bg-blue-500 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                        View
                                    </button>
                                </li>
                                <li>
                                    <button class="uppercase text-sm font-semibold w-full bg-white hover:bg-blue-500 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                        Edit
                                    </button>
                                </li>
                                <li>
                                    <button class="uppercase text-sm font-semibold w-full bg-white text-green-600 hover:bg-green-600 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                        Transfer to Client
                                    </button>
                                </li>
                                <li>
                                    <button class="uppercase text-sm font-semibold w-full bg-white text-yellow-600 hover:bg-yellow-500 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                        Mark as lost
                                    </button>
                                </li>
                                <li id="enquiry_id_here">
                                    <button class="uppercase text-sm font-semibold w-full rounded-b text-red-500 enquiry-delete-btn bg-white hover:bg-red-600 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                        Delete
                                    </button>
                                </li>
                            </ul>
                        </div>

                    </td>
                </tr>
                <tr class="h-12">
                    <td class="px-3 border-collapse border border-indigo-800 font-bold">2</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold">Adam</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold">112</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold">112</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold">112</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold">112</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold">

                        <div class="dropdown inline-block relative p-2">
                            <button
                                class="bg-blue-500 text-white font-semibold py-1 px-4 rounded inline-flex items-center focus:outline-none">
                                <span class="mr-1 uppercase text-sm">Actions</span>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </button>
                            <ul class="rounded z-10 dropdown-menu absolute hidden text-blue-400 pt-1 w-28 border border-blue-400">
                                <li>
                                    <button class="uppercase text-sm font-semibold w-full rounded-t bg-white hover:bg-blue-500 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                        View
                                    </button>
                                </li>
                                <li>
                                    <button class="uppercase text-sm font-semibold w-full bg-white hover:bg-blue-500 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                        Edit
                                    </button>
                                </li>
                                <li>
                                    <button class="uppercase text-sm font-semibold w-full bg-white text-green-600 hover:bg-green-600 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                        Transfer to Client
                                    </button>
                                </li>
                                <li>
                                    <button class="uppercase text-sm font-semibold w-full bg-white text-yellow-600 hover:bg-yellow-500 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                        Mark as lost
                                    </button>
                                </li>
                                <li id="enquiry_id_here">
                                    <button class="uppercase text-sm font-semibold w-full rounded-b text-red-500 enquiry-delete-btn bg-white hover:bg-red-600 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                        Delete
                                    </button>
                                </li>
                            </ul>
                        </div>

                    </td>
                </tr>
                <tr class="h-12">
                    <td class="px-3 border-collapse border border-indigo-800 font-bold">3</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold">Chris</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold">1,280</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold">1,280</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold">1,280</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold">1,280</td>
                    <td class="px-3 border-collapse border border-indigo-800 font-bold">

                        <div class="dropdown inline-block relative p-2">
                            <button
                                class="bg-blue-500 text-white font-semibold py-1 px-4 rounded inline-flex items-center focus:outline-none">
                                <span class="mr-1 uppercase text-sm">Actions</span>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </button>
                            <ul class="rounded z-10 dropdown-menu absolute hidden text-blue-400 pt-1 w-28 border border-blue-400">
                                <li>
                                    <button class="uppercase text-sm font-semibold w-full rounded-t bg-white hover:bg-blue-500 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                        View
                                    </button>
                                </li>
                                <li>
                                    <button class="uppercase text-sm font-semibold w-full bg-white hover:bg-blue-500 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                        Edit
                                    </button>
                                </li>
                                <li>
                                    <button class="uppercase text-sm font-semibold w-full bg-white text-green-600 hover:bg-green-600 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                        Transfer to Client
                                    </button>
                                </li>
                                <li>
                                    <button class="uppercase text-sm font-semibold w-full bg-white text-yellow-600 hover:bg-yellow-500 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                        Mark as lost
                                    </button>
                                </li>
                                <li id="enquiry_id_here">
                                    <button class="uppercase text-sm font-semibold w-full rounded-b text-red-500 enquiry-delete-btn bg-white hover:bg-red-600 hover:text-white py-2 px-4 block whitespace-no-wrap focus:outline-none">
                                        Delete
                                    </button>
                                </li>
                            </ul>
                        </div>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</main>

@endsection

@section('footer-scripts')
    <script type="text/javascript" src="{{ asset('js/enquiries_index_swal.js') }}"></script>
@endsection
