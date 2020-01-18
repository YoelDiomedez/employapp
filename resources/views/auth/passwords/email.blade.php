@extends('layouts.auth')

@section('content')
<!-- BEGIN FORGOT PASSWORD FORM -->
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    
    <h3 class="form-title font-dark">{{ __('¿Olvidate tu Contraseña?') }}</h3>

    @if (session('status'))
        <div class="alert alert-success text-center" role="alert">
            <button class="close" data-close="alert"></button>
            <span role="alert">
                <strong>{{ session('status') }}</strong>
            </span>
        </div>
    @endif

    <div class="form-group {{ $errors->has('dni') ? 'has-error' : '' }}">
        <label class="control-label visible-ie8 visible-ie9">{{ __('DNI') }}</label>
        <input id="dni" type="number" class="form-control" name="dni" value="{{ old('dni') }}" placeholder="DNI" required autofocus>
        @if ($errors->has('dni'))
            <span class="help-block text-center bold"> {{ $errors->first('dni') }} </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <label class="control-label visible-ie8 visible-ie9">{{ __('E-Mail') }}</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="E-Mail" required>
        @if ($errors->has('email'))
            <span class="help-block text-center bold"> {{ $errors->first('email') }} </span>
        @endif
    </div>

    <div class="form-actions">  
        <button type="submit" class="btn blue uppercase btn-block">
            Recuperar <i class="icon-key"></i>
        </button>
    </div>
</form>
<!-- END FORGOT PASSWORD FORM -->
@endsection