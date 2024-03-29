@extends('layouts.auth')

@section('title')
    Connexion
@endsection
 
@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5" style="background-image: url('{{ asset('img/gestion.jpg') }}'); background-size: cover; background-position: center;">
                <div class="card-body p-0">

                    @if(session('toast_warning'))
                        <div class="alert alert-danger text-center">
                            {{ session('toast_warning') }}
                        </div>
                    @endif


                    <!-- Nested Row within Card Body -->
                    <div class="row d-flex justify-content-center align-items-center">
                        {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bienvenue !</h1>
                                </div>

                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                                <form method="POST" action="{{ route('login') }}"> 
                                    @csrf

                                     <!-- Username -->
                                    <div class="form-group">
                                        <label for="username"><span class="text-gray-900">Nom d'utilisateur</span></label>
                                        <input type="text" name="username" class="form-control form-control-user"
                                            aria-describedby="Username"
                                            placeholder="Entrer votre nom d'utilisateur..." value="{{ old('username') }}" required autofocus>
                                    </div>

                                    <!-- Password -->
                                    <div class="form-group">
                                        <label for="password"><span class="text-gray-900">Mot de passe</span></label>
                                        <input type="password" name="password" class="form-control form-control-user"
                                            placeholder="Entrer votre Mot de passe..." value="{{ old('password') }}" required autocomplete="current-password" >
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                                <span class="ml-2 text-sm text-light">{{ __('Souviens toi de moi') }}</span>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Connexion
                                    </button>
                                    {{-- <a href="{{ route('index') }}" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </a> --}}
                                    <hr>
                                    {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a> --}}
                                </form>
                                {{-- <hr> --}}
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Mot de passe oublié ?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ url('register') }}">Créer un compte !</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection