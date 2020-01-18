@extends('layouts.app')
@section('pagetitle', 'Convocatorias')
@section('pagesubtitle', 'Announcements')
@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ route('announcements.index') }}">Convocatorias</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Selección</span>
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

                {!! Form::model(
                    $announcement,
                    [
                        'route'  => ['announcements.select', $announcement->id],
                        'method' => 'POST'
                    ] 
                ) !!}

                <h3 class="form-section">
                    PROCESO CAS № {{ str_pad($announcement->id,3,"0",STR_PAD_LEFT) }}-{{Carbon\Carbon::parse($announcement->posted_date)->format('Y') }}
                </h3>

                <div class="form-group">
                    <div class="mt-checkbox-list">
                        @foreach($announcement->users as $user)

                            <label class="mt-checkbox"> 
                                
                                <a href="JavaScript:;" onclick="showCV({{ $user->id }})" class="btn dark btn-sm btn-outline">
                                    Ver CV <i class="fa fa-eye"></i>
                                </a>

                                {{ $user->name }} {{ $user->paternal_surname }} {{ $user->maternal_surname }}

                                {{ Form::checkbox('selected[]', $user->id, $user->pivot->selected) }}

                                <span style="margin-top: 5px;"></span>

                            </label>
                        @endforeach
                    </div>
                </div>

                @if(count($announcement->users) > 0 && $announcement->state)

                <div class="form-group">
                    <div class="mt-radio-inline">
                        <label class="mt-radio">
                            {{ Form::radio('state', '1') }}
                            Mantener Convocatoria
                            <span></span>
                        </label>
                        <label class="mt-radio">
                            {{ Form::radio('state', '0') }}
                            Finalizar Convocatoria
                            <span></span>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::submit('Seleccionar', ['class' => 'btn btn-primary']) }}
                    {{ Form::reset('Cancelar', ['class' => 'btn btn-default']) }}
                </div>
                
                @else
                    <div class="alert alert-warning">
                        <strong>¡Atención!</strong>
                        Esta <strong>Convocatoria</strong>
                         no tiene ningún 
                        <strong>Postulante</strong>                        
                    </div>
                @endif

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@include('announcements.modals.cv')

@endsection

@section('scripts')
    @parent
    <script>

    function showCV(id){

        console.log(id);
        
        $.ajax({

            type: 'GET',
            url: '{{ url('curriculum') }}' + '/' + id,
                    
            success: function (data) {

                console.log(data);

                $("#cvModalBody").html(data);
            }
        });

        $("#cv").modal('show');
    }

    </script>
@endsection