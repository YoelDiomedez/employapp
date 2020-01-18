<!-- PERSONAL INFO TAB -->
<div class="tab-pane active" id="tab_1_1">
    {!! Form::open([
                'route'  => ['applicants.update', $applicant->id],
                'method' => 'PUT',
                'files'  => true
    ]) !!}

    <div class="form-group">
        {{ Form::label('ruc', 'RUC') }}
        {{ Form::number('ruc', $applicant->ruc, ['class' => 'form-control', 'min' => 0, 'required' => 'true']) }}
    </div>

    <div class="form-group">
        {{ Form::label('cellphone_number', 'Número Celular') }}
        {{ Form::number('cellphone_number', $applicant->cellphone_number, ['class' => 'form-control', 'min' => 0, 'required' => 'true']) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'E-Mail') }}
        {{ Form::text('email', Auth::user()->email, ['class' => 'form-control', 'required' => 'true']) }}
    </div>

    <div class="form-group">
        {{ Form::label('marital_status', 'Estado Civil') }}
        {{ Form::select(
            'marital_status', 
            [
                'S' => 'SOLTERO(A)', 
                'C' => 'CASADO(A)',
                'D' => 'DIVORCIADO(A)',
                'V' => 'VIUDO(A)'
            ], 
            $applicant->marital_status,
            ['placeholder' => 'Seleccione un Estado', 'class' => 'form-control selectpicker', 'required' => 'true']
        ) }}
    </div>

    <div class="form-group">
        {{ Form::label('address', 'Dirección') }}
        {{ Form::text('address', $applicant->address, ['class' => 'form-control uppercase', 'required' => 'true']) }}
    </div>

    <div class="form-group">
        {{ Form::label('department_id', 'Departamento') }}
        {!! Form::select(
            'department_id', 
            [],
            null, 
            [
                'id' => 'departments', 
                'class' => 'form-control', 
                'required' => 'true',
                'placeholder' => 'Busque y Seleccione un Departamento'
            ]
        )!!}
    </div>
    <div class="form-group">
        {{ Form::label('province_id', 'Provincia') }}
        {!! Form::select(
            'province_id', 
            [], 
            null, 
            [
                'id' => 'provinces', 
                'class' => 'form-control', 
                'required' => 'true',
                'placeholder' => 'Busque y Seleccione una Provincia'
            ]
        )!!}
    </div>

    <div class="form-group">
        {{ Form::label('district_id', 'Distrito') }}
        {!! Form::select(
            'district_id', 
            [], 
            null, 
            [
                'id' => 'districts', 
                'class' => 'form-control', 
                'required' => 'true',
                'placeholder' => 'Busque y Seleccione un Distrito'
            ]
        )!!}
    </div>

    <div class="form-group">
        {{ Form::label('tuition_number', '№ de Colegiatura (solo si aplica)') }}
        {{ Form::number('tuition_number', $applicant->tuition_number, ['class' => 'form-control', 'min' => 0]) }}
    </div>

    {{ Form::label('ffaa_file', '¿Perteneció a las FF. AA.?') }}
    @if(!$applicant->ffaa_file)
    <div id="FFAAInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ Form::file('ffaa_file', ['accept' => '.pdf']) }}
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
    @else 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal"  href="#ffaaFile">
            Ver Archivo <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
    @endif

    {{ Form::label('disability_file', '¿Es usted una persona con discapacidad?') }}
    @if(!$applicant->disability_file)
    <div id="disabilityInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ Form::file('disability_file', ['accept' => '.pdf']) }} 
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
    @else 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal"  href="#disabilityFile">
            Ver Archivo <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
    @endif
    <div class="form-group">
        {{ Form::submit('Actualizar', ['class' => 'btn btn-warning']) }}
        {{ Form::reset('Cancelar', ['class' => 'btn btn-default']) }}
    </div>
    {!! Form::close() !!}
</div>
<!-- END PERSONAL INFO TAB -->