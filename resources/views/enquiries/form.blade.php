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
                        placeholder="Firstname Lastname" value="@if(isset($enquiry)){{ $enquiry->name }}@else{{ old('name') }}@endif" required>
                </div>
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">business name</label>
                    <input type="text" name="business_name"
                        class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="Company Inc." value="@if(isset($enquiry)){{ $enquiry->business_name }}@else{{ old('business_name') }}@endif">
                </div>
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">email</label>
                    <input type="email" name="email"
                        class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="user@example.com" value="@if(isset($enquiry)){{ $enquiry->email }}@else{{ old('email') }}@endif">
                </div>
                <div class="flex flex-col w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">contact number</label>
                    <input type="tel" name="contact_no"
                        class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="+910123456789" value="@if(isset($enquiry)){{ $enquiry->contact_no }}@else{{ old('contact_no') }}@endif">
                </div>
            </div>

            <div class="flex flex-col md:flex-row">
                <div class="flex flex-col mr-4 w-full md:w-4/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">Subject</label>
                    <textarea name="subject" class="h-20 px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="Subject" required>@if(isset($enquiry)){{ $enquiry->subject }}@else{{ old('subject') }}@endif</textarea>
                </div>
                <div class="flex flex-col mr-4 w-full md:w-4/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">Services</label>
                    <select multiple name="services[]" class="px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" required>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}" @if(isset($enquiry)) @if($enquiry->services->contains($service->id)) selected @endif @endif>
                                {{ $service->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col mr-4 w-full md:w-4/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">status</label>
                    <select name="enquiry_status" class="px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" required>
                        @foreach ($enquiry_statuses as $status)
                            <option value="{{ $status->id }}" @if(isset($enquiry)) @if($status->id == $enquiry->enquiry_status->id) selected @endif @endif>{{ $status->status }}</option>
                        @endforeach
                    </select>
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
                <a href="{{ route('enquiries.index') }}" class="w-6/12 md:w-2/12 text-center px-1 py-2 rounded bg-red-500 hover:bg-red-700 text-white focus:outline-none">
                    Cancel
                </a>
            </div>

        </div>
    </div>
</div>
