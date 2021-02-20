<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <title>Lancer CRM - @yield('title')</title>
</head>

<body class="subpixel-antialiased @if(!request()->is('account/signin')) lg:overflow-hidden @endif">

    @if(!request()->is('account/signin') and !request()->is('account/signup'))
    {{-- Don't display this sidebar in signin page --}}
    <div class="flex justify-between bg-indigo-700">
        <div>
            <h5 class="text-white px-3 py-2 pt-3 text-xl sm:text-2xl" style="font-family: 'Pacifico', cursive;">
                Lancer CRM
            </h5>
        </div>
        <div class="flex justify-end">
            <a class="hidden lg:block rounded border border-gray-100 mx-1 my-1 px-2 py-1 pt-2 border-opacity-100" href='{{ route('useraccount.index') }}'>
                <img height="42" width="42" src='/storage/profile_picture/{{ auth()->user()->photo_url }}' alt='profile photo'
                    class="inline rounded-full w-9 h-9 pr-1" />
                <span class="text-white text-base">{{ auth()->user()->firstName() }}</span>
            </a>
            <form method="POST" action="{{ route('signout') }}" class="p-0 m-0">
                @csrf
                <button class="hidden lg:block bg-red-600 hover:bg-red-400 text-white font-bold px-2 py-2 mx-2 my-2 rounded shadow-lg hover:shadow-xl transition duration-200">
                    SignOut
                </button>
            </form>

            <button class="lg:hidden px-4 text-white" id="mobileNavToggle">
                {{-- Mobile nav toggle button --}}
                <i class="fas fa-bars fa-2x"></i>
            </button>
        </div>
    </div>

    <div class="lg:flex">
        <div id="sideBar" style="height: 100vh;" class="fixed overflow-y-auto flex-none lg:static lg:h-auto lg:pt-0 lg:w-60 xl:w-72 lg:block hidden bg-indigo-700">
            <div id="navbarWrapper" class="h-full overflow-y-auto scrolling-touch lg:h-auto lg:block lg:relative lg:sticky lg:bg-transparent overflow-hidden lg:top-18 bg-white mr-24 lg:mr-0">
                <nav id="nav" class="px-1 pt-6 overflow-y-auto font-medium text-base sm:px-3 xl:px-5 lg:text-sm pb-10 lg:pt-10 lg:pb-14 sticky?lg:h-(screen-18)">
                    <ul>
                        <li class="px-3 py-2 text-xl transition-colors duration-200 relative block hover:text-white text-indigo-200 @if(request()->is('/')) text-indigo-700 hover:text-indigo-500 bg-white rounded pr-0 mr-0 @endif">
                            <a href="{{ route('dashboard.index') }}">
                                <i class="fas fa-chart-line"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="px-3 py-2 text-xl transition-colors duration-200 relative block hover:text-white text-indigo-200 @if(request()->is('enquiries*')) text-indigo-700 hover:text-indigo-500 bg-white rounded pr-0 mr-0 @endif">
                            <a href="{{ route('enquiries.index') }}">
                                <i class="fas fa-question-circle"></i>
                                Enquiries
                            </a>
                        </li>
                        <li class="px-3 py-2 text-xl transition-colors duration-200 relative block hover:text-white text-indigo-200 @if(request()->is('clients*')) text-indigo-700 hover:text-indigo-500 bg-white rounded pr-0 mr-0 @endif">
                            <a href="{{ route('clients.index') }}">
                                <i class="fas fa-user"></i>
                                Clients
                            </a>
                        </li>
                        <li class="px-3 py-2 text-xl transition-colors duration-200 relative block hover:text-white text-indigo-200 @if(request()->is('projects*')) text-indigo-700 hover:text-indigo-500 bg-white rounded pr-0 mr-0 @endif">
                            <a href="{{ route('projects.index') }}">
                                <i class="fas fa-project-diagram fa-xs"></i>
                                Projects
                            </a>
                        </li>
                        <li class="px-3 py-2 text-xl transition-colors duration-200 relative block hover:text-white text-indigo-200 @if(request()->is('services*')) text-indigo-700 hover:text-indigo-500 bg-white rounded pr-0 mr-0 @endif">
                            <a href="{{ route('services.index') }}">
                                <i class="fas fa-cubes fa-sm"></i>
                                Services
                            </a>
                        </li>
                        <li class="px-3 py-2 text-xl transition-colors duration-200 relative block hover:text-white text-indigo-200 @if(request()->is('dues*')) text-indigo-700 hover:text-indigo-500 bg-white rounded pr-0 mr-0 @endif">
                            <a href="{{ route('dues.index') }}">
                                <i class="fas fa-file-invoice"></i>
                                Dues
                            </a>
                        </li>
                        <li class="px-3 py-2 text-xl transition-colors duration-200 relative block hover:text-white text-indigo-200 @if(request()->is('payments*')) text-indigo-700 hover:text-indigo-500 bg-white rounded pr-0 mr-0 @endif">
                            <a href="{{ route('payments.index') }}">
                                <i class="fas fa-cash-register fa-xs"></i>
                                Payments
                            </a>
                        </li>
                        <li class="px-3 py-2 text-xl transition-colors duration-200 relative block hover:text-white text-indigo-200 @if(request()->is('invoices*')) text-indigo-700 hover:text-indigo-500 bg-white rounded pr-0 mr-0 @endif">
                            <a href="{{ route('invoices.index') }}">
                                <i class="fas fa-file-invoice-dollar"></i>
                                Invoices
                            </a>
                        </li>
                        <li class="px-3 py-2 text-xl transition-colors duration-200 relative block hover:text-white text-indigo-200 @if(request()->is('expenses*')) text-indigo-700 hover:text-indigo-500 bg-white rounded pr-0 mr-0 @endif">
                            <a href="{{ route('expenses.index') }}">
                                <i class="fas fa-money-bill-alt fa-xs"></i>
                                Expenses
                            </a>
                        </li>
                        <li class="px-3 py-2 text-xl transition-colors duration-200 relative block hover:text-white text-indigo-200 @if(request()->is('reports*')) text-indigo-700 hover:text-indigo-500 bg-white rounded pr-0 mr-0 @endif">
                            <a href="{{ route('reports.index') }}">
                                <i class="fas fa-receipt"></i>
                                Reports
                            </a>
                        </li>
                        <li class="px-3 py-2 text-xl transition-colors duration-200 relative block hover:text-white text-indigo-200 @if(request()->is('bankaccounts*')) text-indigo-700 hover:text-indigo-500 bg-white rounded pr-0 mr-0 @endif">
                            <a href="{{ route('bankaccounts.index') }}">
                                <i class="fas fa-piggy-bank fa-xs"></i>
                                Bank Accounts
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
        <div id="mobileNavBar" class="bg-indigo-700 z-10 h-screen hidden">
            {{-- innerHTML will be dynamically copied from above navbar/sidebar --}}
            <div class="flex justify-between">
                <a class="inline rounded border border-gray-100 mx-1 my-1 px-2 py-1 pt-2 w-2/6 border-opacity-100" href='{{ route('useraccount.index') }}'>
                    <img height="42" width="42" src='/storage/profile_picture/{{ auth()->user()->photo_url }}' alt='profile image placeholder'
                        class="inline rounded-full h-8 w-8 pr-1" />
                    <span class="text-white text-base">{{ auth()->user()->firstName() }}</span>
                </a>
                <form method="POST" action="{{ route('signout') }}">
                    @csrf
                    <button class="inline bg-red-600 hover:bg-red-400 text-white font-bold px-2 py-2 mx-2 my-2 rounded shadow-lg hover:shadow-xl transition duration-200">
                        SignOut
                    </button>
                </form>
            </div>
        </div>

        <div id="contentWrapper" class="min-w-0 w-full flex-auto lg:static lg:max-h-screen overflow-y-scroll">
            @section('main-content')

            @show
        </div>

    </div>
    @endif

    @section('signin-signup-content')
    @show

    <script type="text/javascript" src="{{ asset('fa/all.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('swal/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mobile_nav.js') }}"></script>
    @section('footer-scripts')
    @show
</body>

</html>
