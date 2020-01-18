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
            <span>Lista</span>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="portlet light">
            <div class="portlet-title">
                <a href="{{ route('education.create') }}" class="btn blue btn-outline"> 
                    <i class="fa fa-plus"></i> Agregar
                </a>                
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Titulo / Grado</th>
                            <th class="text-center">Especialidad</th>
                            <th class="text-center">Expedición</th>
                            <th class="text-center">Universidad</th>
                            <th class="text-center">Ciudad / País</th>
                            <th class="text-center" colspan="3">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($education as $e)
                        <tr>
                            <td>{{ $e->degree->description }}</td>
                            <td>{{ $e->specialty }}</td>
                            @if($e->degree_date != null)
                                <td class="uppercase">{{ Carbon\Carbon::parse($e->degree_date)->formatLocalized('%B de %Y')}}</td>
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

                            <td>
                                @if($e->degree_file)
                                <a href="{{ asset('storage/education/'.$e->degree_file) }}" class="btn dark btn-outline" target="_blank">
                                    <i class="fa fa-file-pdf-o"></i>
                                </a>
                                @else
                                <button class="btn dark btn-outline" disabled="disabled">
                                    <i class="fa fa-file-pdf-o"></i> 
                                </button>
                                @endif
                            </td>

                            @can('education.edit')
                            <td class="text-center">
                                <a href="{{ route('education.edit', $e->id) }}" class="btn yellow btn-outline">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            @endcan 

                            @can('education.destroy')
                            <td class="text-center">
                                {!! Form::open([
                                    'route' => ['education.destroy', $e->id],
                                    'method' => 'DELETE'
                                ]) !!}
                                    <button class="btn red btn-outline">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                {!! Form::close() !!}
                            </td>
                            @endcan 
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No tiene ningún Estudio agregado.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $education->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
