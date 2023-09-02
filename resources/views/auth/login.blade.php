<style>
.addcart-successful {
    position: fixed;
    background-color: black;
    color: #1ABE4D;
    text-align: center;
    padding: 10px 20px;
    border-radius: 5px;
    left: 35%;
    top:4vh;
    z-index: 10;
    opacity: 0;
 }
 .addcart-completed {
    animation-name: show-success;
    animation-duration: 5s;
 }
 @keyframes show-success {
    0% {
       opacity: 1;
    }
    10% {
       top:18vh;
    }
    75% {
       top:18vh;
       opacity: 1;
    }
    90% {
       opacity: 0;
    }
 }
</style>

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />
        
        @if(session('message'))
            <div class="addcart-successful addcart-completed" id='showsuccess'>
            <i class="fa-solid fa-circle-check"></i> {{session('message')}}
            </div>
        @endif

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
