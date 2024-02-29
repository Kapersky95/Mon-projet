{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

             <!-- Username -->
             <div>
                <x-label for="username" :value="__('Username')" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            </div>

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

@extends('layouts.auth')

@section('title')
    Enregistrement
@endsection

@section('content')
<div class="container">

    @if(session('toast_success'))
    <div class="alert alert-success">
        {{ session('toast_success') }}
    </div>
    @endif
    
    <div class="card o-hidden border-0 shadow-lg my-5" style="background-image: url('{{ asset('img/businessman.jpg') }}'); background-size: cover; background-position: center;">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex justify-content-center align-items-center">
                {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Créer un compte !</h1>
                        </div>

                         <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            
                            <div class="form-group row">
                                <!-- Username -->
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" name="username" class="form-control form-control-user"
                                        placeholder="Entrer votre Nom d'utilisateur..." value="{{ old('username') }}" required autofocus>
                                </div>
                                 <!-- Name -->
                                <div class="col-sm-6">
                                    <input type="text" name="name" class="form-control form-control-user"
                                        placeholder="Entrer votre Nom..." value="{{ old('name') }}" required autofocus>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user"
                                    placeholder="Entrer votre addresse Email..." value="{{ old('email') }}" required>
                            </div>
                            <!-- Password -->
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        placeholder="Entrer votre Mot de passe..." value="{{ old('password') }}" required autocomplete="new-password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="password_confirmation" class="form-control form-control-user"
                                        placeholder="Répéter le mot de passe..." value="{{ old('password_confirmation') }}" required>
                                </div>
                            </div>
                            {{-- <a href="login.html" class="btn btn-primary btn-user btn-block">
                                Enregistrer un compte
                            </a> --}}
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Enregistrer un compte
                            </button>
                            <hr>
                            {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a> --}}
                        </form>
                        {{-- <hr> --}}
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Mot de passe oublié ?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ url('login') }}">Vous avez déjà un compte ? Se connecter !</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  

</div>
@endsection
