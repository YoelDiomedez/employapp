@section('styles')
    @parent
    <!-- BEGIN PAGE LEVEL STYLES -->
    <style> textarea { resize: vertical; } </style>
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection
@extends('layouts.app')
@section('pagetitle', 'Roles')
@section('pagesubtitle', 'Roles')
@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('roles.index') }}">Roles</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Nuevo</span>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="portlet light">
            <div class="portlet-body">
                {!! Form::open(['route' => 'roles.store']) !!}
                    
                    @include('roles.partials.form')

                    <div class="form-group">
                        {{ Form::submit('Registrar', ['class' => 'btn btn-primary']) }}
                        {{ Form::reset('Cancelar', ['class' => 'btn btn-default']) }}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection