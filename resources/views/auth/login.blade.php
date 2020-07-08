@extends('layouts.auth')


@section('title', 'Login')

@section('meta')
    <meta name="robots" content="noindex">
@endsection

@section('style')
<style>
    .login{
        width: 400px;
    }
</style>
@endsection


@section('content')
<div class="login card shadow">

    <div class="card-body">
        <p class="text-center lead mb-5">INICIA SESIÓN PARA EMPEZAR</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">

                <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>



            <div class="d-flex justify-content-between align-items-center">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">Recuerdame</label>
                </div>

                <button type="submit" class="btn btn-primary">
                    Inicia sesión
                </button>

            </div>

        </form>

        <p class="text-center text-secondary">-O-</p>

        <a href="{{url('login/facebook')}}" class="btn btn-facebook d-block">
            <i class="fab fa-facebook-f"></i>
            Inicia sesión con facebook
        </a>

        <a href="{{url('login/google')}}" class="btn btn-google d-block my-2">
            <i class="fab fa-google"></i>
            Inicia sesión con google
        </a>

        <a class="btn btn-link" href="{{ route('password.request') }}">
            ¿Olvidaste la contraseña?
        </a>
        
        <a class="btn btn-link" href="{{ route('register') }}">
            ¿No tienes cuenta? ¡Registrate!
        </a>
    </div>
</div>

@endsection
