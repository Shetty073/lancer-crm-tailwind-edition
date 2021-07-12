{{-- Form --}}
@csrf
<div class="rounded bg-indigo-100 shadow-lg px-6">
    <div class="divide-y divide-gray-200">
        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
            <div class="flex flex-col md:flex-row">
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">full name</label>
                    <input type="text" name="name"
                        class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="Firstname Lastname" value="@if(isset($client)){{ $client->name }}@else{{ old('name') }}@endif" required>
                </div>
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">business name</label>
                    <input type="text" name="business_name"
                        class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="Company Inc." value="@if(isset($client)){{ $client->business_name }}@else{{ old('business_name') }}@endif">
                </div>
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">email</label>
                    <input type="email" name="email"
                        class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="user@example.com" value="@if(isset($client)){{ $client->email }}@else{{ old('email') }}@endif">
                </div>
                <div class="flex flex-col w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">contact number</label>
                    <input type="tel" name="contact_no"
                        class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="+910123456789" value="@if(isset($client)){{ $client->contact_no }}@else{{ old('contact_no') }}@endif">
                </div>
            </div>

            <div class="flex flex-col md:flex-row">
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">Subject</label>
                    <textarea name="subject" class="h-20 px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="Subject" required>@if(isset($client)){{ $client->subject }}@else{{ old('subject') }}@endif</textarea>
                </div>
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">project</label>
                    <select name="project_id" class="px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" required>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}" @if(isset($client)) @if($project->id == $client->project->id) selected @endif @endif>{{ $project->status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">Remark</label>
                    <textarea name="remark" class="h-20 px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="Remark">@if(isset($client)){{ $client->remark }}@else{{ old('remark') }}@endif</textarea>
                </div>
            </div>

            <div class="flex flex-col md:flex-row">
                <div class="mb-1 pt-1 rounded mr-4">
                    <input type='checkbox' name='is_active'
                    @if(isset($client->is_active))@if($client->is_active)checked @else @endif @endif />
                    <label for='is_active' class='inline text-indigo-600 text-sm font-bold mb-4 ml-1'>
                        Is Active?
                    </label>
                </div>
                @if(isset($client->rating))
                    <div class="mb-1 pt-1 rounded mr-4" id="ratingDisplayDiv">
                        <?php
                            $filled_stars = $client->rating;
                            $empty_stars = 5 - $filled_stars;
                        ?>
                        <label class="inline text-indigo-600 text-sm font-bold mb-4 ml-1">Rating:</label>
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
                @endif
                <div class="mb-1 pt-1 rounded mr-4" id="ratingInputDiv">
                    <label class="inline text-indigo-600 text-sm font-bold mb-4 ml-1">Rating:</label>
                    <span id="starcontainer1">
                        <i id="star1" class="far fa-star text-indigo-600 cursor-pointer star"></i>
                    </span>
                    <span id="starcontainer2">
                        <i id="star2" class="far fa-star text-indigo-600 cursor-pointer star"></i>
                    </span>
                    <span id="starcontainer3">
                        <i id="star3" class="far fa-star text-indigo-600 cursor-pointer star"></i>
                    </span>
                    <span id="starcontainer4">
                        <i id="star4" class="far fa-star text-indigo-600 cursor-pointer star"></i>
                    </span>
                    <span id="starcontainer5">
                        <i id="star5" class="far fa-star text-indigo-600 cursor-pointer star"></i>
                    </span>
                    <input type="hidden" id="rating" name="rating">
                </div>
            </div>
            <div class="flex flex-row">
                <button type="submit" class="w-6/12 md:w-2/12 px-1 py-2 rounded bg-green-500 hover:bg-green-700 text-white focus:outline-none mr-2">
                    @if(isset($client))
                        Update
                    @else
                        Create
                    @endif
                </button>
                <a href="{{ route('enquiries.index') }}" class="w-6/12 md:w-2/12 text-center px-1 py-2 rounded bg-red-500 hover:bg-red-700 text-white focus:outline-none">
                    Cancel
                </a>
            </div>

        </div>
    </div>
</div>
