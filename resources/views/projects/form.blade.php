{{-- Form --}}
@csrf
<div class="rounded bg-indigo-100 shadow-lg px-6">
    <div class="divide-y divide-gray-200">
        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
            <div class="flex flex-col md:flex-row">
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">name</label>
                    <input type="text" name="name"
                        class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="Project Name" value="@if(isset($project)){{ $project->name }}@else{{ old('name') }}@endif" required>
                </div>
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">details</label>
                    <textarea name="details" class="h-20 px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="Details about the project" required>@if(isset($project)){{ $project->details }}@else{{ old('details') }}@endif</textarea>
                </div>
            </div>

            <div class="flex flex-row">
                <button type="submit" class="w-6/12 md:w-2/12 px-1 py-2 rounded bg-green-500 hover:bg-green-700 text-white focus:outline-none mr-2">
                    @if(isset($enquiry))
                        Update
                    @else
                        Create
                    @endif
                </button>
                <a href="{{ route('projects.index') }}" class="w-6/12 md:w-2/12 text-center px-1 py-2 rounded bg-red-500 hover:bg-red-700 text-white focus:outline-none">
                    Cancel
                </a>
            </div>

        </div>
    </div>
</div>
