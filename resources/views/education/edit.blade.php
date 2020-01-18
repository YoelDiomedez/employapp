@section('styles')
    @parent
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">    
    <link href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}"  rel="stylesheet" />
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection
@extends('layouts.app')
@section('pagetitle', 'Estudios')
@section('pagesubtitle', 'Education')
@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ route('education.index') }}">Estudios</a>
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
                    'route'  => ['education.update', $education->id],
                    'method' => 'PUT',
                    'files'  => true
                ]) !!}
                    
                    @include('education.partials.form')

                <div class="form-group">
                    {{ Form::submit('Actualizar', ['class' => 'btn btn-warning']) }}
                    {{ Form::reset('Cancelar', ['class' => 'btn btn-default']) }}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@include('education.modals.degree')

@endsection
@section('scripts')
    @parent
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/select2/js/i18n/es.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js') }}" charset="UTF-8"></script>    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script>
    $(document).ready(function() {

        $('#degreeDatePicker').datetimepicker({
            language:  'es',
            format: 'MM yyyy',
            startView: 'year',
            viewMode: 'month',
            minView: 'year',
            todayHighlight: 1,
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            collapse: 1,
            forceParse: 0
        });

        $('#countrySelector').select2({
            language: 'es',
            placeholder: 'Busque y Seleccione un País',
            allowClear: true
        });

        $('#degreeSelector').on('change', function (e) {
            
            var valueSelected = this.value;

            console.log(valueSelected);

            if (valueSelected == 10) {

                console.log('Mostrar input descripción');

                $('#description').append(`
                    <label for="description">Descripción</label>
                    <input type="text" name="description" value="" class="form-control uppercase" required/>
                `);

            } else {
                console.log('Ocultar input descripción');
                $('#description').empty();
            }
        });

        $('#noDegree').change(function() {

            if(this.checked) {

                console.log('Mostrar dropdown Especificar');

                $('#dateDegreeStatus').empty();

                $('#dateDegreeStatus').append(`
                    <label for="description">Especificar</label>
                    <select id="degreeStatus" name="degree_status" class="form-control" required>
                        <option selected="selected" value="">Seleccione una Opción</option>
                        <option value="E">ES EGRESADO</option>
                        <option value="T">EN TRAMITE</option>
                        <option value="C">ESTUDIO EN CURSO</option>
                    </select>                
                `);

                $('#degreeStatus').selectpicker();
            }else{

                console.log('Borrar dropdown Especificar, Mostrar input Fecha');

                $('#dateDegreeStatus').empty();

                $('#dateDegreeStatus').append(`
                <label for="degree_date">Fecha de Expedición del Título o Grado</label>  
                <div id="degreeDatePicker2" class="input-group date" data-link-field="degree_date">
                    <input type"text" name="" class="form-control" readonly required/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                </div>
                <input type="hidden" name="degree_date" id="degree_date" required/>             
                `);
                
                $('#degreeDatePicker2').datetimepicker({
                    language:  'es',
                    format: 'MM yyyy',
                    startView: 'year',
                    viewMode: 'month',
                    minView: 'year',
                    todayHighlight: 1,
                    weekStart: 1,
                    todayBtn:  1,
                    autoclose: 1,
                    collapse: 1,
                    forceParse: 0
                });
            }
        });
    });
    </script>
@endsection