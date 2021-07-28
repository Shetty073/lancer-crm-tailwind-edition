@extends('base')
@section('title', 'Create payment')

@section('main-content')

<main class="px-1 lg:px-4 py-2 mx-2 ls:mx-10 my-5 h-screen">
    <div class="flex md:justify-between">
        <h1 class="text-3xl font-bold mb-6 text-indigo-600 hidden sm:inline">Create payment</h1>
    </div>

    @if ($errors->any())
        <div class="border border-red-300 bg-red-200 rounded px-2 py-1 mb-2 text-red-500 font-bold">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('payments.store') }}">
        @include('payments.form')
    </form>

    <br>
    <br>
</main>

@endsection
