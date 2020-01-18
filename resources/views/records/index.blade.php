@section('styles')
    @parent
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('assets/pages/css/invoice.min.css') }}" rel="stylesheet"/>
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection
@extends('layouts.app')
@section('pagetitle', 'Hoja de Vida')
@section('pagesubtitle', 'Curriculum')
@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('records.index') }}">Curriculum</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>CV</span>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="portlet light">
            <div class="invoice">

                <div class="row invoice-logo">
                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                        @if(!Auth::user()->profile_picture)
                            <img src="{{ asset('assets/layouts/layout2/img/user_default.png') }}" class="img-responsive img-thumbnail center-block" style="margin-top: 20px; max-height: 260px;" alt=""> 
                        @else
                            <img src="{{ asset('storage/profile/'.Auth::user()->profile_picture) }}" class="img-responsive img-thumbnail center-block" style="margin-top: 20px; max-height: 260px;" alt=""> 
                        @endif 
                    </div>
                    <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12">
                        <h3>Datos Personales</h3>
                        <ul class="list-unstyled">
                            <li>
                                <strong>Escuela(s) Profesional(es):</strong>
                                @foreach (Auth::user()->careers as $career)
                                    @php
                                     $resultstr[] = $career->name 
                                    @endphp
                                @endforeach
                                {{ implode(' / ',$resultstr) }}
                            </li>
                            <li>
                                <strong>Nombres y Apellidos:</strong>
                                {{ Auth::user()->name }} {{ Auth::user()->paternal_surname }} {{ Auth::user()->maternal_surname }}
                            </li>
                            <li>
                                <strong>Fecha de Nacimiento:</strong> 
                                {{ Carbon\Carbon::parse(Auth::user()->birth_date)->format('d/m/Y') }}
                            </li>
                            <li>
                                <strong>DNI:</strong>
                                {{ Auth::user()->dni }}
                            </li>
                            <li>
                                <strong>RUC:</strong> 
                                {{ $applicant->ruc }}
                            </li>
                            <li>
                                <strong>Estado Civil:</strong>
                                @if($applicant->marital_status == 'S')
                                    SOLTERO(A)
                                @elseif ($applicant->marital_status == 'C')
                                    CASADO(A)
                                @elseif($applicant->marital_status == 'D' )
                                    DIVORCIADO(A)
                                @elseif($applicant->marital_status == 'V' )
                                    VIUDO(A)
                                @endif
                            </li>
                            <li>
                                <strong>Dirección:</strong>
                                {{ $applicant->address }}
                            </li>
                            <li>
                                <strong>Departamento / Provincia / Distrito :</strong> 
                                @if ($applicant->department != null &&
                                    $applicant->province    != null &&
                                    $applicant->district)

                                    {{ $applicant->department->name }} / 
                                    {{ $applicant->province->name }} / 
                                    {{ $applicant->district->name }}
                                @endif
                            </li>
                            <li>
                                <strong>Número Celular:</strong> 
                                {{ $applicant->cellphone_number }}
                            </li>
                            
                            <li>
                                <strong>E-mail:</strong> 
                                {{ Auth::user()->email }}
                            </li>
                            <li class="{{ $applicant->tuition_number == null ? "hidden-xs": ""}}">
                                <strong>№ de Colegiatura:</strong>
                                {{ $applicant->tuition_number }}
                            </li>
                        </ul>    
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-xs-12">
                        <h3>Estudios</h3>    
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Titulo / Grado</th>
                                        <th>Especialidad</th>
                                        <th>Expedición</th>
                                        <th>Universidad</th>
                                        <th>Ciudad / País</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($education as $e)
                                    <tr>
                                        <td>{{ $e->degree->description }}</td>
                                        <td>{{ $e->specialty }}</td>
                                        @if($e->degree_date != null)
                                            <td class="uppercase">{{ Carbon\Carbon::parse($e->degree_date)->formatLocalized('%B de %Y') }}</td>
                                        @else
                                            <td>
                                                @if($e->degree_status == 'E')
                                                    ES EGRESADO
                                                @elseif ($e->degree_status == 'T')
                                                    EN TRAMITE
                                                @elseif($e->degree_status == 'C' )
                                                    ESTUDIO EN CURSO
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                        @endif
                                        <td>{{ $e->college }}</td>
                                        <td>{{ $e->city }} / {{ $e->country->name }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No tiene ningún Estudio agregado.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <h3>Capacitaciones</h3> 
                        <div class="table-responsive">
                           <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Especialidad</th>
                                        <th>F. Inicio</th>
                                        <th>F. Fin</th>
                                        <th>Institución</th>
                                        <th>Ciudad / País</th>
                                        <th>H. Lectivas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($trainings as $training)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $training->description }}</td>
                                        <td class="uppercase">{{ Carbon\Carbon::parse($training->start_date)->formatLocalized('%d de %B de %Y') }}</td>
                                        <td class="uppercase">{{ Carbon\Carbon::parse($training->end_date)->formatLocalized('%d de %B de %Y') }}</td>
                                        <td>{{ $training->institution }}</td>
                                        <td>{{ $training->city }} / {{ $training->country->name }}</td>
                                        <td>{{ $training->hours }}</td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No tiene ningúna Capacitación agregado.</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row"> 
                    <div class="col-xs-12">
                        <h3>Experiencia Laboral</h3> 
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Entidad / Empresa</th>
                                        <th>Cargo Desempeñado</th>
                                        <th>F. Inicio</th>
                                        <th>F. Fin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse ($experiences as $experience)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $experience->company }}</td>
                                        <td>{{ $experience->position }}</td>
                                        <td class="uppercase">{{ Carbon\Carbon::parse($experience->start_date)->formatLocalized('%d de %B de %Y') }}</td>
                                        <td class="uppercase">{{ Carbon\Carbon::parse($experience->end_date)->formatLocalized('%d de %B de %Y') }}</td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">No tiene ningúna Experiencia Laboral agregado.</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 invoice-block">
                        <a class="btn btn-lg green hidden-print margin-bottom-5" onclick="javascript:window.print();"> Imprimir CV
                            <i class="fa fa-print"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection