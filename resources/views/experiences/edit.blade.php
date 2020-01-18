@section('styles')
    @parent
    <!-- BEGIN PAGE LEVEL STYLES -->
    <style> textarea { resize: vertical; } </style>
    <link href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">    
    <link href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}"  rel="stylesheet" />
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection
@extends('layouts.app')
@section('pagetitle', 'Experiencia Laboral')
@section('pagesubtitle', 'Experience')
@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ route('experiences.index') }}">Experiencia Laboral</a>
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
                    'route'  => ['experiences.update', $experience->id],
                    'method' => 'PUT',
                    'files'  => true
                ]) !!}
                    
                    @include('experiences.partials.form')

                <div class="form-group">
                    {{ Form::submit('Actualizar', ['class' => 'btn btn-warning']) }}
                    {{ Form::reset('Cancelar', ['class' => 'btn btn-default']) }}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@include('experiences.modals.file')

@endsection
@section('scripts')
    @parent
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/select2/js/i18n/es.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js') }}" charset="UTF-8"></script>    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script>
    $(document).ready(function() {

        $('#startDatePicker').datetimepicker({
            language:  'es',
            format: 'dd MM yyyy',
            startView: 'year',
            viewMode: 'month',
            minView: 'month',
            todayHighlight: 1,
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            collapse: 1,
            forceParse: 0
        });

        $('#endDatePicker').datetimepicker({
            language:  'es',
            format: 'dd MM yyyy',
            startView: 'year',
            viewMode: 'month',
            minView: 'month',
            todayHighlight: 1,
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            collapse: 1,
            forceParse: 0
        });
    });
    </script>
@endsection