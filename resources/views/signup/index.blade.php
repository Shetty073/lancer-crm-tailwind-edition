@extends('base')
@section('title', 'Signup')

@section('signin-signup-content')

<div class='min-h-screen pt-5 md:pt-20 pb-6 px-2 md:px-0 bg-gradient-to-br from-blue-200 via-indigo-500 to-indigo-800'>
    <header class='max-w-lg mx-auto'>
        <h1 class='text-white text-5xl text-center font-bold'>
            Signup
        </h1>
    </header>

    <div class='bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl'>
        <form class='flex flex-col' method="post" enctype="multipart/form-data" action="{{ route('signup') }}">
            @if ($errors->any())
            <div class="border border-red-300 bg-red-200 rounded px-2 py-1 mb-2 text-red-500 font-bold">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @csrf
            <div class='mb-6 pt-3 rounded bg-gray-200'>
                <label for='name' class='block text-indigo-600 text-sm font-bold mb-2 ml-3'>
                    Name
                </label>
                <input type='text' id="name" name='name' autocomplete='on' value="{{ old('name') }}"
                    class='bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-indigo-600 transition duration-500 px-3 pb-3'
                    required />
            </div>
            <div class='mb-6 pt-3 rounded bg-gray-200'>
                <label for='photo' class='block text-indigo-600 text-sm font-bold mb-2 ml-3'>
                    Photo
                </label>
                <input type='file' id="photo" name='photo' accept="image/png, image/jpeg"
                    class='bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-indigo-600 transition duration-500 px-3 pb-3' />
            </div>
            <div class='mb-6 pt-3 rounded bg-gray-200'>
                <label for='email' class='block text-indigo-600 text-sm font-bold mb-2 ml-3'>
                    Email
                </label>
                <input type='email' id="email" name='email' autocomplete='on' value="{{ old('email') }}"
                    class='bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-indigo-600 transition duration-500 px-3 pb-3'
                    required />
            </div>
            <div class='mb-5 pt-3 rounded bg-gray-200'>
                <label for='password' class='block text-indigo-600 text-sm font-bold mb-2 ml-3'>
                    Password
                </label>
                <input type='password' id="password" name='password' autocomplete='on'
                    class='bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-indigo-600 transition duration-500 px-3 pb-3'
                    required />
            </div>
            <div class='mb-5 pt-3 rounded bg-gray-200'>
                <label for='password_confirmation' class='block text-indigo-600 text-sm font-bold mb-2 ml-3'>
                    Confirm Password
                </label>
                <input type='password' id="password_confirmation" name='password_confirmation' autocomplete='off'
                    class='bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-indigo-600 transition duration-500 px-3 pb-3'
                    required />
            </div>
            @error('email')
            <div class="border border-red-300 bg-red-200 rounded px-2 py-1 mb-2 text-red-500 font-bold">{{ $message }}</div>
            @enderror
            <button type='submit'
                class='bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200 focus:outline-none'>
                Signup & Signin
            </button>
        </form>
    </div>
</div>

@endsection
