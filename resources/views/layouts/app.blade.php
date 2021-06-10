<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel Voting</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <livewire:styles/>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans bg-gray-background text-gray-900 text-sm">
        <header class="flex flex-col md:flex-row items-center justify-between px-8 py-4">
            <a href="/"><img src="{{ asset('img/logo.svg')}}" alt="logo"></a>
            <div class="flex mt-2 md:mt-0 items-center ">
                @if (Route::has('login'))
                <div class="px-6 py-4 ">
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{route('logout')}}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log out') }}
                    </a>
                    </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
                <a href="#">
                    <img src="https://docs.appthemes.com/files/2011/08/gravatar-grey.jpg"
                    alt="avatar" class="w-10 h-10 rounded-full">
                </a>
            </div>
        </header>
        <main class="container mx-auto max-w-custom flex flex-col md:flex-row" >
            <div class=" w-70 mx-auto md:mx-0  md:mr-5">
              <div class="bg-white md: sticky top-8 border-2 border-blue rounded-xl mt-16"
              style="
              border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
              border-image-slice: 1;
              background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
              background-origin: border-box;
              background-clip: content-box, border-box;
            ">
                  <div class="text-center px-6 py-2 pt-6">
                      <h3 class="font-semibold text-base">Add an idea</h3>
                      <p class="text-xs mt-4">
                        @auth
                        Let us know what you would like to and we'll take a look over!
                        @else
                        Please login to create an idea.
                        @endauth
                        </p>
                  </div>


                  @auth
                 <livewire:create-idea/>
                @else
                <div class="my-6 text-center">
                    <a
                    href={{ route('login') }}
                     class=" inline-block  text-white  justify-center w-1/2 h-11 text-xs bg-blue font-semibold
                           rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">

                              <span class="ml-2">Login</span>
                    </a>
                    <a href="{{ route('register') }}" class="inline-block mt-2 justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold
                    rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">

                      Sign Up
                     </a>
                </div>
                  @endauth

              </div>
            </div>
            <div class="w-full px-2 md:px-0 md:w-175">
                <livewire:status-filters/>
                <div class="mt-8">
                    {{ $slot }}
                </div>
            </div>


        </main>

        @if (session('success_message'))
            <x-notification-success
                :redirect="true"
                message-to-display="{{ (session('success_message')) }}"
            />
        @endif
        {{-- @if (session('success_message'))
        <div

        x-cloak
        x-data="{
            isOpen: false,
            messageToDisplay: '{{ session('success_message') }}',
            showNotification(message){
                this.isOpen = true
                this.messageToDisplay = message
                setTimeout(() => {
                    thisisOpen = false

                },5000)
            }
        }"
        x-init="
            $nextTick(() => showNotification(messageToDisplay))



        "
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-x-8"
        x-transition:enter-end="opacity-100 transform translate-x-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-x-0"
        x-transition:leave-end="opacity-0 transform translate-x-8"
        @keydown.escape.window="isOpen = false"


        class="z-20 flex justify-between
        maw-w-xs  sm:max-w-sm w-full fixed bottom-0 right-0
        bg-white rounded-xl shadow-lg bordewr px-4 py-5 mx-2 sm:mx-6 my-8">
        <div class="flex items-center ">
            <svg  class="text-green h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="ml-2 font-semibold text-gray-500 text-sm sm:text-base" x-text="messageToDisplay"></div>

            </div>
        <button @click="isOpen = false" class="text-gray-400 hover:text-gray-500">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        </div>
            <x-notification-success
                redirect="true"
                message-to-display="{{ (session('success_message')) }}"
            />
        @endif--}}

        <livewire:scripts/>
    </body>
</html>
