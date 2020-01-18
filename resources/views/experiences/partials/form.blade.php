<div class="form-group">
    {{ Form::label('company', 'Nombre de la Entidad o Empresa') }}
    @if(!empty($experience->company) && $experience->company != null)
        {{ Form::text('company', $experience->company, ['class' => 'form-control uppercase', 'required' => 'true']) }}
    @else
        {{ Form::text('company', null, ['class' => 'form-control uppercase', 'required' => 'true']) }}
    @endif
</div>

<div class="form-group">
    {{ Form::label('position', 'Cargo Desempeñado') }}
    @if(!empty($experience->position) && $experience->position != null)
        {{ Form::text('position', $experience->position, ['class' => 'form-control uppercase', 'required' => 'true', 'maxlength' => '60']) }}
    @else
        {{ Form::text('position', null, ['class' => 'form-control uppercase', 'required' => 'true', 'maxlength' => '60']) }}
    @endif
</div>

<div class="form-group">
    {{ Form::label('start_date', 'Fecha de Inicio') }}
    @if(!empty($experience->start_date) && $experience->start_date != null)
        <div id="startDatePicker" class="input-group date" data-link-field="start_date">
            {!! Form::text(null, Carbon\Carbon::parse($experience->start_date)->format('d F Y'), ['class' => 'form-control', 'required'=>'required', 'readonly'=>'true']); !!}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {!! Form::hidden('start_date', $experience->start_date, ['id' => 'start_date', 'required'=>'required']); !!}
    @else
        <div id="startDatePicker" class="input-group date" data-link-field="start_date">
            {!! Form::text(null, null, ['class' => 'form-control', 'required'=>'required', 'readonly'=>'true']); !!}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {!! Form::hidden('start_date', null, ['id' => 'start_date', 'required'=>'required']); !!}
    @endif
</div>

<div class="form-group">
    {{ Form::label('end_date', 'Fecha de Finalización') }}
    @if(!empty($experience->end_date) && $experience->end_date != null)
        <div id="endDatePicker" class="input-group date" data-link-field="end_date">
            {!! Form::text(null, Carbon\Carbon::parse($experience->end_date)->format('d F Y'), ['class' => 'form-control', 'required'=>'required', 'readonly'=>'true']); !!}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {!! Form::hidden('end_date', $experience->end_date, ['id' => 'end_date', 'required'=>'required']); !!}
    @else
        <div id="endDatePicker" class="input-group date" data-link-field="end_date">
            {!! Form::text(null, null, ['class' => 'form-control', 'required'=>'required', 'readonly'=>'true']); !!}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {!! Form::hidden('end_date', null, ['id' => 'end_date', 'required'=>'required']); !!}
    @endif
</div>

<div class="form-group">
    {{ Form::label('description', 'Descripción del Trabajo Realizado') }}
    @if(!empty($experience->description) && $experience->description != null)
        {{ Form::textarea('description', $experience->description, ['class' => 'form-control uppercase', 'rows' => 4, 'required' => 'true']) }}
    @else
        {{ Form::textarea('description', null, ['class' => 'form-control uppercase', 'rows' => 4, 'required' => 'true']) }}
    @endif
</div>

{{ Form::label('file', 'Archivo') }}

@if(!empty($experience->file) && $experience->file != null) 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal" href="#experienceFile">
            Mostrar <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
@else 
    <div id="experienceInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ Form::file('file', ['accept' => '.pdf']) }} 
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
@endif