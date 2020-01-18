@section('styles')
    @parent
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">    
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection

@extends('layouts.app')
@section('pagetitle', 'Usuarios')
@section('pagesubtitle', 'Users')
@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('users.index') }}">Usuarios</a>
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
            
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="portlet-body">
                    {!! Form::model(
                        $user,
                        [
                            'route'  => ['users.update', $user->id],
                            'method' => 'PUT'
                        ] 
                    ) !!}

                    @include('users.partials.form')
                    
                    <div class="form-group">
                        {{ Form::submit('Actualizar', ['class' => 'btn btn-warning']) }}
                        {{ Form::reset('Cancelar', ['class' => 'btn btn-default']) }}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/select2/js/i18n/es.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js') }}" charset="UTF-8"></script>    <!-- END PAGE LEVEL PLUGINS -->
    <script>
    $(document).ready(function() {
        
        $('#birthDatePicker').datetimepicker({
            language:  'es',
            format: "dd MM yyyy",
            minView: 'month',
            todayHighlight: 1,
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            collapse: 1,
            forceParse: 0
        });

        $('#careers').select2({
            maximumSelectionLength: 2,
            language: 'es',
            placeholder: 'Seleccione su(s) Escuela(s) Profesional(es)',
            allowClear: true
        });
    });
    </script>
@endsection