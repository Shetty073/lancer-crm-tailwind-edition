@extends('base')
@section('title', 'Manage Your Account')

@section('main-content')

<main class="px-1 lg:px-4 py-2 mx-2 ls:mx-10 my-5 h-screen">
    <div class="flex justify-between">
        <h1 class="text-3xl font-bold mb-6 text-indigo-600">Manage Your Account</h1>
    </div>

    @if ($errors->any())
        <div class="border border-red-300 bg-red-200 rounded px-2 py-1 mb-2 text-red-500 font-bold">
            <ul>
                @foreach ($errors->all() as $error)
                    @if($error === 'validation.current_password')
                        <li>Current password is incorrect. Please re-check and try again.</li>
                    @else
                        <li>{{ $error }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    @endif

    @if (Session::has('success'))
        <div class="border border-green-300 bg-green-200 rounded px-2 py-1 mb-2 text-green-500 font-bold">
            <ul>
                <li>{{ Session::get('success') }}</li>
            </ul>
        </div>
    @endif

    <div class="flex flex-col lg:flex-row mb-10 px-5 py-6 rounded shadow-lg bg-indigo-100">

        <form class='flex flex-col' method="post" enctype="multipart/form-data" action="{{ route('myaccount.update', ['id' => auth()->user()->id]) }}">
            @csrf

            <div class="divide-y divide-gray-200">
                <div class="text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                    <h2 class="text-indigo-600 font-bold">Personal details</h2>

                    <div class="flex flex-col md:flex-row">

                        <div class="flex flex-col mr-4 w-full md:w-3/12">
                            <label class="leading-loose capitalize font-semibold text-indigo-600">Name</label>
                            <input type="text" name="name"
                                class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                value="{{ auth()->user()->name }}" required>
                        </div>

                        <div class="flex flex-col mr-4 w-full md:w-3/12">
                            <label class="leading-loose capitalize font-semibold text-indigo-600">Email</label>
                            <input type="email" name="email"
                                class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                value="{{ auth()->user()->email }}" required>
                        </div>

                        <div class="flex flex-col mr-4 w-full md:w-3/12">
                            <label class="leading-loose capitalize font-semibold text-indigo-600">Photo</label>
                            <input type="file" name="photo" accept="image/png, image/jpeg"
                                class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 focus:outline-none text-gray-600">
                        </div>

                        <div class="flex flex-col mr-4 w-full md:w-3/12">
                            <label class="leading-loose capitalize font-semibold text-indigo-600">Current Photo</label>
                            @if (isset(auth()->user()->photo_url))
                                <img height="42" width="42" src="{{ asset('storage/profile_picture/' . auth()->user()->photo_url) }}" alt='profile photo'
                                class="inline w-9 h-9 pr-1" />
                            @else
                                <span class="border border-red-500">
                                    No photo provided.
                                </span>
                            @endif
                        </div>

                    </div>

                    @error('email')
                        <div class="border border-red-300 bg-red-200 rounded px-2 py-1 mb-2 text-red-500 font-bold">{{ $message }}</div>
                    @enderror

                    <div class="flex flex-row">
                        <button type="submit" class="w-6/12 md:w-2/12 px-1 py-2 rounded bg-green-500 hover:bg-green-700 text-white focus:outline-none mr-2">
                            Update
                        </button>
                        <a href="{{ route('projects.index') }}" class="w-6/12 md:w-2/12 text-center px-1 py-2 rounded bg-red-500 hover:bg-red-700 text-white focus:outline-none">
                            Cancel
                        </a>
                    </div>

                </div>
            </div>

        </form>

    </div>

    <div class="flex flex-col lg:flex-row mb-10 px-5 py-6 rounded shadow-lg bg-indigo-100">
        <form class='flex flex-col' method="post" enctype="multipart/form-data" action="{{ route('myaccount.changepassword', ['id' => auth()->user()->id]) }}">
            @csrf

            <div class="divide-y divide-gray-200">
                <div class="text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                    <h2 class="text-indigo-600 font-bold">Change password</h2>

                    <div class="flex flex-col md:flex-row">
                        <div class="flex flex-col mr-4 w-full md:w-3/12">
                            <label class="leading-loose capitalize font-semibold text-indigo-600">Current Password</label>
                            <input type="password" name="current_password"
                                class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                placeholder="Current password" required>
                        </div>

                        <div class="flex flex-col mr-4 w-full md:w-4/12">
                            <label class="leading-loose capitalize font-semibold text-indigo-600">New Password</label>
                            <input type="password" name="password"
                                class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                placeholder="New password" required>
                        </div>

                        <div class="flex flex-col mr-4 w-full md:w-4/12">
                            <label class="leading-loose capitalize font-semibold text-indigo-600">Confirm New Password</label>
                            <input type="password" name="password_confirmation"
                                class="px-4 py-2 border focus:ring-gray-500 focus:border-indigo-400 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                placeholder="Confirm new password" required>
                        </div>

                    </div>

                    @error('password')
                        <div class="border border-red-300 bg-red-200 rounded px-2 py-1 mb-2 text-red-500 font-bold">{{ $message }}</div>
                    @enderror

                    <div class="flex flex-row">
                        <button type="submit" class="w-6/12 md:w-3/12 px-1 py-2 rounded bg-green-500 hover:bg-green-700 text-white focus:outline-none mr-2">
                            Change
                        </button>
                        <a href="{{ route('projects.index') }}" class="w-6/12 md:w-3/12 text-center px-1 py-2 rounded bg-red-500 hover:bg-red-700 text-white focus:outline-none">
                            Cancel
                        </a>
                    </div>

                </div>
            </div>


        </form>
    </div>

    <br>
</main>

@endsection
