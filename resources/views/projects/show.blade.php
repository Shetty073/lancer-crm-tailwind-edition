@extends('base')
@section('title', 'Project details')

@section('main-content')

<main class="px-1 lg:px-4 py-2 mx-2 ls:mx-10 my-5 h-screen">

    <div class="flex md:justify-between">
        <h1 class="text-3xl font-bold mb-6 text-indigo-600 hidden sm:inline">Project details</h1>
        <div id="{{ $project->id }}" class="mt-5 mr-5 mb-5 md:mt-0 md:mr-0 md:mb-0">
            <a href="{{ route('projects.create') }}"
                class="uppercase rounded bg-green-500 hover:bg-green-600 text-white outline-none h-9 px-2 py-2 mt-4 mr-2 block md:inline ml-2 sm:ml-0">
                <i class="fas fa-plus"></i> add new project
            </a>
            <a href="{{ route('projects.edit', ['id' => $project->id]) }}"
                class="uppercase rounded bg-blue-500 hover:bg-blue-600 text-white outline-none h-9 px-2 py-2 mt-4 block md:inline ml-2 sm:ml-0">
                <i class="fas fa-edit"></i> edit this project
            </a>
            <input type="hidden" id="deleteProjectUrl" value="{{ route('projects.destroy', ['id' => $project->id]) }}">
            <button type="button"
                class="project-delete-btn ml-2 uppercase rounded bg-red-500 hover:bg-red-600 text-white focus:outline-none h-9 px-2 py-1 block mt-5 md:inline md:mt-0">
                <i class="fas fa-trash-alt"></i> Delete this project
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
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">{{ $project->id }}</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Name</th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">{{ $project->name }}</td>
                </tr>
                <tr>
                    <th
                        class="px-1 border-collapse border border-indigo-300 text-white font-extrabold bg-indigo-400 w-2/12 uppercase">
                        Details</th>
                    <td class="px-3 border-collapse border border-indigo-300 font-bold">{{ $project->details }}
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    {{-- Delete project modal --}}
    <div
        class="z-10 project-delete-modal h-screen w-full fixed left-0 top-0 flex justify-center items-center bg-black bg-opacity-50 hidden">
        <!-- modal -->
        <div class="bg-white rounded shadow-lg w-11/12 sm:w-1/3">
            <!-- modal header -->
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg text-indigo-700 text-lg font-bold">
                    Are you sure you want to delete this project? You can not undo this.
                </h3>
            </div>
            <!-- modal body -->
            <div class="p-3">
                <input id="deleteProjectId" type="hidden" value="{{ $project->id }}" />
            </div>
            <div class="flex justify-end items-center w-100 border-t p-3">
                <button
                    class="bg-green-600 hover:bg-green-700 px-3 py-1 rounded text-white mr-1 close-project-delete-modal focus:outline-none">
                    Cancel
                </button>
                <button
                    class="project-delete-btn bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white project-delete-btn-modal focus:outline-none">
                    Yes delete!
                </button>
            </div>
        </div>
    </div>

</main>

@endsection
@section('footer-scripts')
    <script type="text/javascript" src="{{ asset('js/projects_swal.js') }}"></script>
@endsection
