@extends('base')
@section('title', 'Signin')

@section('signin-content')

<div class='min-h-screen pt-12 md:pt-40 pb-6 px-2 md:px-0 bg-gradient-to-br from-blue-200 via-indigo-500 to-indigo-800'>
    <header class='max-w-lg mx-auto'>
        <h1 class='text-white text-5xl text-center font-bold'>
            Signin
        </h1>
    </header>

    <div class='bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl'>
        <form class='flex flex-col' method="POST" action="{{ route('signin') }}">
            @csrf
            <div class='mb-6 pt-3 rounded bg-gray-200'>
                <label for='email' class='block text-indigo-600 text-sm font-bold mb-2 ml-3'>
                    Email
                </label>
                <input type='email' name='email' autocomplete='on'
                    class='bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-indigo-600 transition duration-500 px-3 pb-3' />
            </div>
            <div class='mb-6 pt-3 rounded bg-gray-200'>
                <label for='password' class='block text-indigo-600 text-sm font-bold mb-2 ml-3'>
                    Password
                </label>
                <input type='password' name='password' autocomplete='on'
                    class='bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-indigo-600 transition duration-500 px-3 pb-3' />
            </div>
            {{ Request::is('/account/signin') }}
            <button type='submit'
                class='bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200'>
                Signin
            </button>
        </form>
    </div>
</div>

@endsection
