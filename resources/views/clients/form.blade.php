{{-- Form --}}
@csrf
<div class="rounded bg-indigo-100 shadow-lg px-6">
    <div class="divide-y divide-gray-200">
        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
            <h4 class="text-indigo-600 font-bold">Personal details</h4>
            <div class="flex flex-col md:flex-row">
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">full name</label>
                    @if(isset($enquiry))
                        <input type="text" name="name"
                            class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                            placeholder="Firstname Lastname" value="{{ $enquiry->name }}">
                    @else
                        <input type="text" name="name"
                            class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                            placeholder="Firstname Lastname" value="@if(isset($client)){{ $client->name }}@else{{ old('name') }}@endif" required>
                    @endif
                </div>
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">business name</label>
                    @if(isset($enquiry))
                        <input type="text" name="business_name"
                            class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                            placeholder="Company Inc." value="{{ $enquiry->business_name }}">
                    @else
                        <input type="text" name="business_name"
                            class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                            placeholder="Company Inc." value="@if(isset($client)){{ $client->business_name }}@else{{ old('business_name') }}@endif">
                    @endif
                </div>
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">email</label>
                    @if(isset($enquiry))
                        <input type="email" name="email"
                            class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                            placeholder="user@example.com" value="{{ $enquiry->email }}">
                    @else
                        <input type="email" name="email"
                            class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                            placeholder="user@example.com" value="@if(isset($client)){{ $client->email }}@else{{ old('email') }}@endif">
                    @endif
                </div>
                <div class="flex flex-col w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">contact number</label>
                    @if(isset($enquiry))
                        <input type="tel" name="contact_no"
                            class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                            placeholder="+910123456789" value="{{ $enquiry->contact_no }}">
                    @else
                        <input type="tel" name="contact_no"
                            class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                            placeholder="+910123456789" value="@if(isset($client)){{ $client->contact_no }}@else{{ old('contact_no') }}@endif">
                    @endif
                </div>
            </div>

            <div class="flex flex-col md:flex-row">
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">Subject</label>
                    @if(isset($enquiry))
                        <textarea name="subject" class="h-20 px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                            placeholder="Subject" required>{{ $enquiry->subject }}</textarea>
                    @else
                        <textarea name="subject" class="h-20 px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                            placeholder="Subject" required>@if(isset($client)){{ $client->subject }}@else{{ old('subject') }}@endif</textarea>
                    @endif
                </div>
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">Remark</label>
                    <textarea name="remark" class="h-20 px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="Remark">@if(isset($client)){{ $client->remark }}@else{{ old('remark') }}@endif</textarea>
                </div>
            </div>

            <div class="flex flex-col md:flex-row mb-10">
                <div class="mb-1 pt-1 rounded mr-4">
                    @if(isset($enquiry))
                        <input type='checkbox' name='is_active' checked disabled />
                    @else
                        @if(isset($client))
                            <input type='checkbox' name='is_active'
                            @if(isset($client->is_active))@if($client->is_active)checked @else @endif @endif />
                        @else
                            <input type='checkbox' name='is_active' checked />
                        @endif
                    @endif
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
                    <input type="hidden" id="rating" name="rating" @if(isset($client)) value="{{ $client->rating }}" @endif>
                </div>

            </div>

            <br>
            <br>

            <h4 class="text-indigo-600 font-bold mt-10">Booking details</h4>
            <div class="flex flex-col md:flex-row">
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">project</label>
                    <select name="project_id" class="px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" required>
                        @if(isset($enquiry))
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" @if(isset($enquiry->project->id))@if($project->id == $enquiry->project->id) selected @endif @endif>{{ $project->name }}</option>
                            @endforeach
                        @else
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" @if(isset($client)) @if($project->id == $client->project->id) selected @endif @endif>{{ $project->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">Configuration</label>
                    <select name="configuration" class="px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" required>
                        @if(isset($enquiry))
                            @foreach ($configurations as $configuration)
                                <option value="{{ $configuration->id }}" @if(isset($enquiry->configuration->id))@if($configuration->id == $enquiry->configuration->id) selected @endif @endif>{{ $configuration->name }}</option>
                            @endforeach
                        @else
                            @foreach ($configurations as $configuration)
                                <option value="{{ $configuration->id }}" @if(isset($client)) @if($configuration->id == $client->configuration->id) selected @endif @endif>{{ $configuration->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">Carpet Area (Sq. Ft.)</label>
                    <input type="number" step="0.01" name="carpet_area"
                            class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                            placeholder="Carpet area" @if(isset($client))value="{{ $client->carpet_area }}"@endif>
                </div>

                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">Agreement Value ({{ App\Lancer\Utilities::CURRENCY_SYMBOL }})</label>
                    <input type="number" step="0.01" name="agreement_value"
                            class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                            placeholder="Agreement value" @if(isset($client))value="{{ $client->agreement_value }}"@endif>
                </div>
            </div>

            <div class="flex flex-col md:flex-row">
                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">Booking amount ({{ App\Lancer\Utilities::CURRENCY_SYMBOL }})</label>
                    <input type="number" step="0.01" id="booking_amount" name="booking_amount"
                            class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                            placeholder="booking amount" @if(isset($client))value="{{ $client->booking_amount }}"@endif>
                </div>

                <div class="flex flex-col mr-4 w-full md:w-3/12">
                    <label class="leading-loose capitalize font-semibold text-indigo-600">payment mode</label>
                    <select name="payment_mode" class="px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" required>
                        @foreach ($payment_modes as $payment_mode)
                            <option @if(isset($client))@if($client->payment_mode->id === $payment_mode->id) selected @endif @endif
                                value="{{ $payment_mode->id }}">{{ $payment_mode->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            @if(isset($enquiry) or !isset($client))
                <br>
                <br>

                <h4 class="text-indigo-600 font-bold mt-10">Brokerage details</h4>
                <div class="flex flex-col md:flex-row">
                    <div class="flex flex-col mr-4 w-full md:w-3/12">
                        <label class="leading-loose capitalize font-semibold text-indigo-600">Brokerage (%)</label>
                        <input type="number" step="0.01" id="brokerage_percent"
                        class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="Brokerage percent">
                    </div>

                    <div class="flex flex-col mr-4 w-full md:w-3/12">
                        <label class="leading-loose capitalize font-semibold text-indigo-600">Brokerage due ({{ App\Lancer\Utilities::CURRENCY_SYMBOL }})</label>
                        <input type="number" step="0.01" name="brokerage_amount" id="brokerage_amount"
                        class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                        placeholder="Amount due from developer">
                    </div>

                    <div class="flex flex-col mr-4 w-full md:w-3/12">
                        <label class="leading-loose capitalize font-semibold text-indigo-600">Due date</label>
                        <input type="date" step="0.01" name="due_date"
                                class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                value="{{ \Carbon\Carbon::now()->addDays(7)->format('Y-m-d') }}">
                    </div>

                    <div class="flex flex-col mr-4 w-full md:w-3/12">
                        <label class="leading-loose capitalize font-semibold text-indigo-600">Payment Mode</label>
                        <select name="due_payment_mode" class="px-4 py-2 border focus:ring-indigo-400 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" required>
                            @foreach ($payment_modes as $payment_mode)
                                <option value="{{ $payment_mode->id }}">{{ $payment_mode->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row">
                    <div class="flex flex-col mr-4 w-full md:w-3/12">
                        <label class="leading-loose capitalize font-semibold text-indigo-600">Remark</label>
                        <input type="text" step="0.01" name="brokerage_remark"
                                class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                placeholder="Remarks">
                    </div>
                </div>
            @endif

            <div class="flex flex-row">
                <button type="submit" class="w-6/12 md:w-2/12 px-1 py-2 rounded bg-green-500 hover:bg-green-700 text-white focus:outline-none mr-2">
                    @if(isset($enquiry))
                        Save
                    @else
                        @if(isset($client))
                            Update
                        @else
                            Create
                        @endif
                    @endif
                </button>
                <a href="{{ route('enquiries.index') }}" class="w-6/12 md:w-2/12 text-center px-1 py-2 rounded bg-red-500 hover:bg-red-700 text-white focus:outline-none">
                    Cancel
                </a>
            </div>

        </div>

    </div>

</div>
