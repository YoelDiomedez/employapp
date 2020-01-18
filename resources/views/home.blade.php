@extends('layouts.app')
@section('pagesubtitle', 'Home')
@section('content')
    @if (session('status'))
    <div class="alert alert-success text-center">
        <button class="close" data-close="alert"></button>
        <span  role="alert">
            <strong>{{ session('status') }}</strong>
        </span>
    </div>
    @endif
@endsection