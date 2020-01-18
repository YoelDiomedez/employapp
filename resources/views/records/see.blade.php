@extends('layouts.app')
@section('pagetitle', 'Postulaciones')
@section('pagesubtitle', 'Record')
@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('records.see') }}">Postulaciones</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Historial</span>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="portlet light">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead >
                        <tr>
                            <th class="text-center">Convocatoria</th>
                            <th class="text-center">Cargo</th>
                            <th class="text-center">Inicio </th>
                            <th class="text-center">Fin</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Resultado</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    @forelse ($announcements as $announcement)
                        <tr>
                            <td>
                                PROCESO CAS № {{ str_pad($announcement->id,3,"0",STR_PAD_LEFT) }}-{{Carbon\Carbon::parse($announcement->posted_date)->format('Y') }}
                            </td>
                            <td>{{ $announcement->position }}</td>
                            <td>{{ Carbon\Carbon::parse($announcement->start_date)->format('d/m/Y') }}</td>
                            <td>{{ Carbon\Carbon::parse($announcement->end_date)->format('d/m/Y') }}</td>
                            <td>
                                @if($announcement->state)
                                    <span class="label label-default">EN PROCESO</span>
                                @else
                                    <span class="label label-success">FINALIZADO</span>
                                @endif 
                            </td>
                            <td>
                                @if($announcement->pivot->selected === null)
                                    <span class="badge badge-warning">EN EVALUACIÓN</span>
                                @elseif($announcement->pivot->selected === 1)
                                    <span class="badge badge-primary">SELECCIONADO</span>
                                @elseif($announcement->pivot->selected === 0)
                                    <span class="badge badge-danger">NO SELECCIONADO</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Usted aún no ha Postulado a una Convocatoria.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                {{ $announcements->render() }}
            </div>
        </div>
    </div>
</div>
@endsection