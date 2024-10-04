@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">

                <!-- Tambahkan logo di sini -->
                <div class="text-center mt-4">
                    <img src="img/logo.png" alt="Logo Perpustakaan" width="150">
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="form-group mb-3">
                            <label for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" value="{{ old('email') }}" required autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-3">
                            <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   name="password" required>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="form-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" 
                                       name="remember" id="remember" 
                                       {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Ingat Saya') }}
                                </label>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mb-0 text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Masuk') }}
                            </button>
                        </div>
                    </form>

                    <!-- Row untuk menempatkan link Lupa Password dan Register di samping -->
                    <div class="row mt-3">
                        <div class="col text-start">
                            <!-- Link ke halaman Lupa Password -->
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Lupa Password?') }}
                                </a>
                            @endif
                        </div>

                        <div class="col text-end">
                            <!-- Link ke halaman Register -->
                            <a href="{{ route('register') }}">{{ __('Belum punya akun? Daftar di sini') }}</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
