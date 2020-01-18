@section('styles')
    @parent
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}"  rel="stylesheet" />
    <link href="{{ asset('assets/pages/css/profile.min.css') }}"  rel="stylesheet" />
    <link href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet"  />
    <link href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" />
   <!-- END PAGE LEVEL SCRIPTS -->
@endsection

@extends('layouts.app')
@section('pagetitle', 'Datos')
@section('pagesubtitle', 'About')
@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('applicants.edit') }}">Datos</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Edición</span>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">

            <!-- PORTLET MAIN -->
            <div class="portlet light ">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    @if(!Auth::user()->profile_picture)
                    <img src="{{ asset('assets/layouts/layout2/img/user_default.png') }}" class="img-responsive" alt=""> 
                    @else
                    <img src="{{ asset('storage/profile/'.Auth::user()->profile_picture) }}" class="img-responsive" alt=""> 
                    @endif
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">{{ Auth::user()->name }} {{ Auth::user()->paternal_surname }} {{ Auth::user()->maternal_surname }}</div>
                    <div class="profile-usertitle-job">
                        @foreach (Auth::user()->careers as $career)
                            @php
                                $resultstr[] = $career->name 
                            @endphp
                        @endforeach
                        {{ implode(' / ',$resultstr) }}
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- STAT -->
                <div class="row list-separated profile-stat">
                
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="uppercase profile-stat-title"> {{ $education }} </div>
                        <div class="uppercase profile-stat-text"> Estudios </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="uppercase profile-stat-title"> {{ $trainings }} </div>
                        <div class="uppercase profile-stat-text"> Capacitaciones </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="uppercase profile-stat-title"> {{ $experiences }} </div>
                        <div class="uppercase profile-stat-text"> Experiencias </div>
                    </div>
                
                </div>
                <!-- END STAT -->
                <div>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-envelope-o"></i>
                        <a href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <p class="uppercase">
                            <i class="fa fa-calendar"></i>
                            {{ Carbon\Carbon::parse(Auth::user()->birth_date)->formatLocalized('%d de %B de %Y') }}
                        </p>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <p>
                            <i class="fa fa-credit-card"></i> 
                            {{ Auth::user()->dni }}
                        </p>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <p>
                            @if(Auth::user()->gender == 'F')
                            <i class="fa fa-venus"></i> 
                            {{ Auth::user()->gender }}
                            @else
                            <i class="fa fa-mars"></i> 
                            {{ Auth::user()->gender }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <!-- END PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->
        <!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light">
                        <div class="portlet-title tabbable-line">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">Resumen</a>
                                </li>
                                <li>
                                    <a href="#tab_1_2" data-toggle="tab">Fotografía</a>
                                </li>
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab">Contraseña</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                                
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @include('applicants.partials.info')

                                @include('applicants.partials.avatar')

                                @include('applicants.partials.password')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>

@include('applicants.modals.ffaa')
@include('applicants.modals.disability')

@endsection

@section('scripts')
    @parent
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/select2/js/i18n/es.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script> 
        $(document).ready(function () {

            var department_id = @json($applicant->department_id);
            var province_id   = @json($applicant->province_id);
            var district_id   = @json($applicant->district_id);

            $.get('{{ route('departments.index') }}', function(data){
                
                console.log(data);

                $('#departments').empty(); 
                $('#departments').append($('<option></option>').val(''));

                $.each(data, function (index, department) {

                    if (department.id === department_id) {

                        $('#departments').append($('<option>', {
                            value: department.id,
                            text:  department.name,
                            selected: true                   
                        }));

                        $.ajax({

                            type: 'GET',
                            url: '{{ url('departments') }}' + '/' + department_id,
                                    
                            success: function (data) {

                                console.log(data);

                                $('#provinces').empty(); 
                                $('#provinces').append($('<option></option>').val(''));


                                $.each(data, function (index, province) {

                                    if (province.id === province_id) {
                                        
                                        $('#provinces').append($('<option>', {
                                            value: province.id,
                                            text:  province.name,
                                            selected: true  
                                        }));

                                        $.ajax({

                                            type: 'GET',
                                            url: '{{ url('provinces') }}' + '/' + province_id,
                                                    
                                            success: function (data) {

                                                console.log(data);

                                                $('#districts').empty(); 
                                                $('#districts').append($('<option></option>').val(''));

                                                $.each(data, function (index, district) {

                                                    if (district.id === district_id) {

                                                        $('#districts').append($('<option>', {
                                                            value: district.id,
                                                            text:  district.name,
                                                            selected: true
                                                        }));

                                                    } else {

                                                        $('#districts').append($('<option>', {
                                                            value: district.id,
                                                            text:  district.name
                                                        }));
                                                    }
                                                }); 

                                                $('#districts').select2({
                                                    language: 'es',
                                                    placeholder: 'Busque y Seleccione un Distrito',
                                                    allowClear: true
                                                });
                                            }
                                        });

                                    } else {

                                        $('#provinces').append($('<option>', {
                                            value: province.id,
                                            text:  province.name
                                        }));
                                    }
                                }); 

                                $('#provinces').select2({
                                    language: 'es',
                                    placeholder: 'Busque y Seleccione una Provincia',
                                    allowClear: true
                                });
                            }
                        });

                    } else {

                        $('#departments').append($('<option>', {
                            value: department.id,
                            text:  department.name
                        })); 
                    } 
                }); 

                $('#departments').select2({
                    language: 'es',
                    placeholder: 'Busque y Seleccione un Departamento',
                    allowClear: true
                });  
            });

            $('#departments').change(function(){

                var id = $('#departments').val();

                console.log(id);

                $.ajax({

                    type: 'GET',
                    url: '{{ url('departments') }}' + '/' + id,
                            
                    success: function (data) {

                        console.log(data);

                        $('#provinces').empty(); 
                        $('#provinces').append($('<option></option>').val(''));

                        $('#districts').empty(); 
                        $('#districts').append($('<option></option>').val(''));

                        $.each(data, function (index, province) {
                            
                            $('#provinces').append($('<option>', {
                                value: province.id,
                                text:  province.name
                            }));
                            
                        }); 

                        $('#provinces').select2({
                            language: 'es',
                            placeholder: 'Busque y Seleccione una Provincia',
                            allowClear: true
                        });
                        
                        $('#districts').select2({
                            language: 'es',
                            placeholder: 'Busque y Seleccione un Distrito',
                            allowClear: true
                        });
                    }
                });
            });

            $('#provinces').change(function(){

                var id = $('#provinces').val();

                console.log(id);

                $.ajax({

                    type: 'GET',
                    url: '{{ url('provinces') }}' + '/' + id,
                            
                    success: function (data) {

                        console.log(data);

                        $('#districts').empty(); 
                        $('#districts').append($('<option></option>').val(''));

                        $.each(data, function (index, district) {
                            
                            $('#districts').append($('<option>', {
                                value: district.id,
                                text:  district.name
                            }));
                            
                        }); 

                        $('#districts').select2({
                            language: 'es',
                            placeholder: 'Busque y Seleccione un Distrito',
                            allowClear: true
                        });
                    }
                });
            });
        });
    </script>
@endsection