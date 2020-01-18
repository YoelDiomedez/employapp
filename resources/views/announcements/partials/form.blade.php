<div class="form-group">
    {{ Form::label('company', 'Entidad o Empresa Solicitante') }}
    {{ Form::text('company', $company->business_name, ['class' => 'form-control uppercase', 'readonly' => 'true']) }}
</div>

@if(!empty($announcement->careers))
    @foreach ($announcement->careers as $career)
        @php
            $selected[] = $career->id
        @endphp
    @endforeach
@endif

<div class="form-group">
    {{ Form::label('start_date', 'Escuela(s) Profesional(es) Solicitada(s)') }}    
    <select name="career_ids[]" id="careers" class="form-control" multiple required> 
        <optgroup label="Escuelas Profesionales de Ingenierías">
            @foreach ($careers as $career)
                <option value="{{ $career->id }}" 
                    @isset ($selected)
                        {{ (in_array($career->id, $selected) ? 'selected' : '') }}
                    @endisset             
                >
                    {{ $career->name }}
                </option>
                @break($career->id == 16)
            @endforeach
        </optgroup>

        <optgroup label="Escuelas Profesionales de Biomédicas">
            @foreach ($careers as $career)
                @continue($career->id < 17)
                    <option value="{{ $career->id }}"
                        @isset ($selected)
                            {{ (in_array($career->id, $selected) ? 'selected' : '') }}
                        @endisset 
                    >
                        {{ $career->name }}
                    </option>
                @break($career->id == 22)
            @endforeach
        </optgroup>

        <optgroup label="Escuelas Profesionales de Sociales">
            @foreach ($careers as $career)
                @continue($career->id < 23)
                    <option value="{{ $career->id }}"
                        @isset ($selected)
                            {{ (in_array($career->id, $selected) ? 'selected' : '') }}
                        @endisset 
                    >
                        {{ $career->name }}
                    </option>
            @endforeach
        </optgroup>
    </select>            
</div>

<div class="form-group">
    {{ Form::label('start_date', 'Fecha de Inicio') }}
    @if(!empty($announcement->start_date) && $announcement->start_date != null)
        <div id="startDatePicker" class="input-group date" data-link-field="start_date">
            {!! Form::text(null, Carbon\Carbon::parse($announcement->start_date)->format('d F Y'), ['class' => 'form-control', 'required'=>'required', 'readonly'=>'true']); !!}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {!! Form::hidden('start_date', $announcement->start_date, ['id' => 'start_date', 'required'=>'required']); !!}
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
    @if(!empty($announcement->end_date) && $announcement->end_date != null)
        <div id="endDatePicker" class="input-group date" data-link-field="end_date">
            {!! Form::text(null, Carbon\Carbon::parse($announcement->end_date)->format('d F Y'), ['class' => 'form-control', 'required'=>'required', 'readonly'=>'true']); !!}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {!! Form::hidden('end_date', $announcement->end_date, ['id' => 'end_date', 'required'=>'required']); !!}
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
    {{ Form::label('position', 'Cargo') }}
    {{ Form::text('position', null, ['class' => 'form-control uppercase', 'required' => 'true']) }}
</div>

{{ Form::label('bases', 'Bases') }}

@if(!empty($announcement->bases) && $announcement->bases != null) 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal" href="#bases">
            Mostrar <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
@else 
    <div id="basesInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ Form::file('bases', ['accept' => '.pdf', 'required' => 'required']) }} 
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
@endif

{{ Form::label('annexes', 'Anexos') }}

@if(!empty($announcement->annexes) && $announcement->annexes != null) 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal" href="#annexes">
            Mostrar <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
@else 
    <div id="annexesInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ Form::file('annexes', ['accept' => '.pdf']) }} 
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
@endif

{{ Form::label('partial_results', 'Resultado de Evaluación Curricular') }}

@if(!empty($announcement->partial_results) && $announcement->partial_results != null) 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal" href="#presults">
            Mostrar <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
@else 
    <div id="presultsInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ Form::file('partial_results', ['accept' => '.pdf']) }} 
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
@endif

{{ Form::label('final_results', 'Resultado Final') }}

@if(!empty($announcement->final_results) && $announcement->final_results != null) 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal" href="#fresults">
            Mostrar <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
@else 
    <div id="fresultsInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ Form::file('final_results', ['accept' => '.pdf']) }} 
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
@endif