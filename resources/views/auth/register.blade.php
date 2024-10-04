@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="text-center mt-4">
                    <img src="img/logo.png" alt="Logo Perpustakaan" width="150">
                </div>
                
                <style>
                    body {
                        background-image: url('../img/bg.jpeg'); 
                    }
                </style>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">{{ __('Nama') }}</label>
                            <input id="name" type="text" class="form-control" name="name" required autofocus>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control" name="email" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="password-confirm">{{ __('Konfirmasi Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group mb-0">
                            <div class="row">
                                <div class="col text-start">
                                    <a href="{{ route('login') }}">{{ __('Sudah Memiliki Akun?') }}</a>
                                </div>
                                <div class="col text-end">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Daftar') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
