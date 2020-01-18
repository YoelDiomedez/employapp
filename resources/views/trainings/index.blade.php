@extends('layouts.app')
@section('pagetitle', 'Capacitaciones')
@section('pagesubtitle', 'Trainings')
@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ route('trainings.index') }}">Capacitaciones</a>
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
                <a href="{{ route('trainings.create') }}" class="btn blue btn-outline"> 
                    <i class="fa fa-plus"></i> Agregar
                </a>                
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Especialidad</th>
                            <th class="text-center">F. Inicio</th>
                            <th class="text-center">F. Fin</th>
                            <th class="text-center">Institución</th>
                            <th class="text-center">Ciudad / País</th>
                            <th class="text-center">Horas Lectivas</th>
                            <th class="text-center" colspan="3">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($trainings as $training)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $training->description }}</td>
                            <td class="uppercase">{{ Carbon\Carbon::parse($training->start_date)->formatLocalized('%d de %B de %Y') }}</td>
                            <td class="uppercase">{{ Carbon\Carbon::parse($training->end_date)->formatLocalized('%d de %B de %Y') }}</td>
                            <td>{{ $training->institution }}</td>
                            <td>{{ $training->city }} / {{ $training->country->name }}</td>
                            <td>{{ $training->hours }}</td>
                            <td>
                                @if($training->file)
                                <a href="{{ asset('storage/training/'.$training->file) }}" class="btn dark btn-outline" target="_blank">
                                    <i class="fa fa-file-pdf-o"></i>
                                </a>
                                @else
                                <button class="btn dark btn-outline" disabled="disabled">
                                    <i class="fa fa-file-pdf-o"></i> 
                                </button>
                                @endif
                            </td>

                            @can('trainings.edit')
                            <td class="text-center">
                                <a href="{{ route('trainings.edit', $training->id) }}" class="btn yellow btn-outline">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            @endcan 

                            @can('trainings.destroy')
                            <td class="text-center">
                                {!! Form::open([
                                    'route' => ['trainings.destroy', $training->id],
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
                            <td colspan="8" class="text-center">No tiene ningúna Capacitación agregado.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $trainings->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
