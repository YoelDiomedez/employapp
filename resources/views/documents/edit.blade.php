@section('styles')
    @parent
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}"  rel="stylesheet" />
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection
@extends('layouts.app')
@section('pagetitle', 'Documentos')
@section('pagesubtitle', 'Documents')
@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ route('documents.edit') }}">Documentos</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Edición</span>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="portlet light">
            <div class="portlet-body">
    
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::open([
                    'route'  => ['documents.update'],
                    'method' => 'PUT',
                    'files'  => true
                ]) !!}
                    
                    @include('documents.partials.form')

                <div class="form-group">
                    {{ Form::submit('Actualizar', ['class' => 'btn btn-warning']) }}
                    {{ Form::reset('Cancelar', ['class' => 'btn btn-default']) }}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@include('documents.modals.affidavit')
@include('documents.modals.dni')
@include('documents.modals.vacancy')
@include('documents.modals.aditional')

@endsection
@section('scripts')
    @parent
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
@endsection