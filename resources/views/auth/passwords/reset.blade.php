@extends('layouts.auth')

@section('content')
<!-- BEGIN REGISTRATION FORM -->
<form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <h3 class="form-title font-dark">{{ __('Restablecer Contraseña') }}</h3>

    <div class="form-group {{ $errors->has('dni') ? 'has-error' : '' }}">
        <label class="control-label visible-ie8 visible-ie9">{{ __('DNI') }}</label>
        <input id="dni" type="number" class="form-control" name="dni" value="{{ $dni ?? old('dni') }}" placeholder="DNI" required autofocus>
        @if ($errors->has('dni'))
            <span class="help-block text-center bold"> {{ $errors->first('dni') }} </span>
        @endif    
    </div>

    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <label class="control-label visible-ie8 visible-ie9">{{ __('E-Mail') }}</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" placeholder="E-Mail" required>
        @if ($errors->has('email'))
            <span class="help-block text-center bold"> {{ $errors->first('email') }} </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
        <label class="control-label visible-ie8 visible-ie9">{{ __('Nueva Contraseña') }}</label>
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Nueva Contraseña" required>
        @if ($errors->has('password'))
            <span class="help-block text-center bold"> {{ $errors->first('password') }} </span>
        @endif
    </div>

    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">{{ __('Confirmar Contraseña') }}</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña" required>
    </div>

    <div class="form-actions">
        <button type="submit" id="register-submit-btn" class="btn blue uppercase btn-block">
            {{ __('Restablecer') }} <i class="icon-lock"></i>
        </button>
    </div>
</form>
<!-- END REGISTRATION FORM -->
@endsection