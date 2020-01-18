<div class="form-group">
    {{ Form::label('description', 'Capacitación') }}
    @if(!empty($training->description) && $training->description != null)
        {{ Form::text('description', $training->description, ['class' => 'form-control uppercase', 'required' => 'true', 'maxlength' => '60']) }}
    @else
        {{ Form::text('description', null, ['class' => 'form-control uppercase', 'required' => 'true']) }}
    @endif
</div>

<div class="form-group">
    {{ Form::label('start_date', 'Fecha de Inicio') }}
    @if(!empty($training->start_date) && $training->start_date != null)
        <div id="startDatePicker" class="input-group date" data-link-field="start_date">
            {!! Form::text(null, Carbon\Carbon::parse($training->start_date)->format('d F Y'), ['class' => 'form-control', 'required'=>'required', 'readonly'=>'true']); !!}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {!! Form::hidden('start_date', $training->start_date, ['id' => 'start_date', 'required'=>'required']); !!}
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
    @if(!empty($training->end_date) && $training->end_date != null)
        <div id="endDatePicker" class="input-group date" data-link-field="end_date">
            {!! Form::text(null, Carbon\Carbon::parse($training->end_date)->format('d F Y'), ['class' => 'form-control', 'required'=>'required', 'readonly'=>'true']); !!}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {!! Form::hidden('end_date', $training->end_date, ['id' => 'end_date', 'required'=>'required']); !!}
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
    {{ Form::label('institution', 'Institución') }}
    @if(!empty($training->institution) && $training->institution != null)
        {{ Form::text('institution', $training->institution, ['class' => 'form-control uppercase', 'required' => 'true']) }}
    @else
        {{ Form::text('institution', null, ['class' => 'form-control uppercase', 'required' => 'true']) }}
    @endif
</div>

<div class="form-group">
    {{ Form::label('city', 'Ciudad') }}
    @if(!empty($training->city) && $training->city != null)
        {{ Form::text('city', $training->city, ['class' => 'form-control uppercase', 'required' => 'true']) }}
    @else
        {{ Form::text('city', null, ['class' => 'form-control uppercase', 'required' => 'true']) }}
    @endif
</div>

<div class="form-group">
    {{ Form::label('country_id', 'País') }}
    {{ Form::select(
        'country_id', 
        $countries,
        (!empty($training->country_id) && $training->country_id != null) ? $training->country_id : null, 
        ['id' =>'countrySelector', 'placeholder' => 'Seleccione un País', 'class' => 'form-control', 'required' => 'required']
        ) 
    }}
</div>

<div class="form-group">
    {{ Form::label('hours', 'Horas Lectivas') }}
    @if(!empty($training->hours) && $training->hours != null)
        {{ Form::number('hours', $training->hours, ['class' => 'form-control', 'required' => 'true', 'min' => '0']) }}
    @else
        {{ Form::number('hours', null, ['class' => 'form-control', 'required' => 'true', 'min' => '0']) }}
    @endif
</div>

{{ Form::label('file', 'Archivo') }}

@if(!empty($training->file) && $training->file != null) 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal" href="#trainingFile">
            Mostrar <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
@else 
    <div id="trainingInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
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