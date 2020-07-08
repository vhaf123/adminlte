@extends('layouts.auth')

@section('title', 'Register')

@section('meta')
    <meta name="robots" content="noindex">
@endsection

@section('style')
    <style>
        .register{
            width: 400px;
        }
    </style>
@endsection

@section('content')

<div class="card register shadow">

    <div class="card-body">
        <p class="text-center lead mb-4">REGISTRATE PARA CONTINUAR</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            {{-- name --}}
            <div class="form-group">

                <input id="name" placeholder="Ingresa tu nombre" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            {{-- Email --}}
            <div class="form-group">

                <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            {{-- Password --}}
            <div class="form-group">
                <input id="password" placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Confirmar password --}}
            <div class="form-group">
                <input id="password-confirm" placeholder="Confirma tu contraseña" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">Acepto los terminos y condiciones</label>
                </div>

                <button type="submit" class="btn btn-primary">
                    Regístrate
                </button>

            </div>

        </form>

        <p class="text-center text-secondary">-O-</p>

        <a href="{{url('login/facebook')}}" class="btn btn-facebook d-block">
            <i class="fab fa-facebook-f"></i>
            Registrate usando facebook
        </a>

        <a href="{{url('login/google')}}" class="btn btn-google d-block my-2">
            <i class="fab fa-google"></i>
            Registrate usando google
        </a>
        
        <a class="btn btn-link" href="{{ route('login') }}">
            ¿Ya tienes una cuenta? ¡Inicia sesión!
        </a>
    </div>

</div>
    

@endsection
