@extends('layouts.auth')

@section('content')
<!-- BEGIN LOGIN FORM -->
<form method="POST" action="{{ route('login') }}">
    @csrf

    <h3 class="form-title font-dark">Iniciar Sesión</h3>

    <div class="form-group {{ $errors->has('dni') ? 'has-error' : '' }}">
        <label class="control-label visible-ie8 visible-ie9">{{ __('DNI') }}</label>
        <input id="dni" type="number" class="form-control" name="dni" value="{{ old('dni') }}" placeholder="DNI" min="0" max="99999999" required autofocus>
        @if ($errors->has('dni'))
            <span class="help-block text-center bold"> {{ $errors->first('dni') }} </span>
        @endif    
    </div>
    
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
    </div>

    <div class="form-actions text-center">
        <button type="submit" class="btn blue uppercase btn-block">Ingresar <i class="icon-login"></i></button>
        <label class="rememberme check mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Mantener Sesión') }}
            <span></span>
        </label>
        <a href="{{ route('password.request') }}" id="forget-password" class="forget-password">
            ¿Olvidate tu Contraseña?
        </a>
    </div>
    <div class="create-account bg-dark">
        <p>
            <a href="{{ route('register') }}" id="register-btn" class="uppercase bg-font-dark">
                Crea una cuenta
            </a>
        </p>
    </div>
    
</form>
<!-- END LOGIN FORM -->
@endsection