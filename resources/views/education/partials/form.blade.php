<div class="form-group">
    {{ Form::label('degree_id', 'Título o Grado') }}
    
    {{ Form::select(
            'degree_id', 
            $degrees,
            (!empty($education->degree_id) && $education->degree_id != null) ? $education->degree_id : null, 
            ['id' =>'degreeSelector', 'placeholder' => 'Seleccione un Título o Grado', 'class' => 'form-control selectpicker', 'required' => 'required']
        ) 
    }}
</div>

<div id="description" class="form-group">
    @if(!empty($education->description) && $education->description != null)
    {{ Form::label('description', 'Descripción') }}
    {{ Form::text('description', $education->description, ['class' => 'form-control uppercase', 'required' => 'true']) }}
    @endif
</div>

<div class="form-group">
    {{ Form::label('specialty', 'Especialidad') }}
    @if(!empty($education->specialty) && $education->specialty != null)
    {{ Form::text('specialty', $education->specialty, ['class' => 'form-control uppercase', 'required' => 'true', 'maxlength' => '60']) }}
    @else
    {{ Form::text('specialty', null, ['class' => 'form-control uppercase', 'required' => 'true', 'maxlength' => '60']) }}
    @endif
</div>

<div class="form-group">
    {{ Form::label('specialty', '¿No tiene Título o Grado?') }}
    <label class="mt-checkbox"> 
        @if(!empty($education->degree_status) && $education->degree_status != null )
        <input type="checkbox" id="noDegree" name="lDegree" value="degree" checked />
        @else 
        <input type="checkbox" id="noDegree" name="lDegree" value="degree"/>
        @endif
        <span></span>
    </label> 
</div>


<div id="dateDegreeStatus" class="form-group">
    {{ Form::label('degree_date', 'Fecha de Expedición del Título o Grado') }}
@if(!empty($education->degree_date) && $education->degree_date != null)
    <div id="degreeDatePicker" class="input-group date" data-link-field="degree_date">
        {!! Form::text(null, Carbon\Carbon::parse($education->degree_date)->format('F Y'), ['class' => 'form-control', 'required'=>'required', 'readonly'=>'true']); !!}
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
    </div>
    {!! Form::hidden('degree_date', $education->degree_date, ['id' => 'degree_date', 'required'=>'required']); !!}
@else
    @if(!empty($education->degree_status) && $education->degree_status != null)
        {{ Form::label('degree_status', 'Especificar') }}
        {{ Form::select(
            'degree_status', 
            [
                'E' => 'ES EGRESADO', 
                'T' => 'EN TRAMITE',
                'C' => 'ESTUDIO EN CURSO'
            ], 
            $education->degree_status,
            ['placeholder' => 'Seleccione una Opción', 'class' => 'form-control selectpicker', 'required' => 'true']
        ) }}
    @else
        <div id="degreeDatePicker" class="input-group date" data-link-field="degree_date">
            {!! Form::text(null, null, ['class' => 'form-control', 'required'=>'required', 'readonly'=>'true']); !!}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {!! Form::hidden('degree_date', null, ['id' => 'degree_date', 'required'=>'required']); !!}
    @endif
@endif
</div>

<div class="form-group">
    {{ Form::label('college', 'Universidad') }}
    @if(!empty($education->college) && $education->college != null)
    {{ Form::text('college', $education->college, ['class' => 'form-control uppercase', 'required' => 'true']) }}
    @else
    {{ Form::text('college', null, ['class' => 'form-control uppercase', 'required' => 'true']) }}
    @endif
</div>

<div class="form-group">
    {{ Form::label('city', 'Ciudad') }}
    @if(!empty($education->city) && $education->city != null)
    {{ Form::text('city', $education->city, ['class' => 'form-control uppercase', 'required' => 'true']) }}
    @else
    {{ Form::text('city', null, ['class' => 'form-control uppercase', 'required' => 'true']) }}
    @endif
</div>

<div class="form-group">
    {{ Form::label('country_id', 'País') }}
    {{ Form::select(
            'country_id', 
            $countries,
            (!empty($education->country_id) && $education->country_id != null) ? $education->country_id : null, 
            ['id' =>'countrySelector', 'placeholder' => 'Seleccione un País', 'class' => 'form-control', 'required' => 'required']
        ) 
    }}
</div>

{{ Form::label('degree_file', 'Archivo') }}

@if(!empty($education->degree_file) && $education->degree_file != null) 
<div class="form-group">
    <a class="btn dark btn-outline" data-toggle="modal" href="#degreeFile">
        Mostrar <i class="fa fa-file-pdf-o"></i> 
    </a>
</div>
@else 
<div id="degreeInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
    <div class="form-control" data-trigger="fileinput">
        <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
    </div>
    <span class="input-group-addon btn btn-default btn-file">
        <span class="fileinput-new">Seleccionar</span>
        <span class="fileinput-exists">Cambiar</span>
        {{ Form::file('degree_file', ['accept' => '.pdf']) }} 
    </span>
    <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
</div>
@endif
