<div class="form-group">
    {{ Form::label('business_name', 'Nombre de la Entidad o Empresa') }}
    {{ Form::text('business_name', null, ['class' => 'form-control uppercase', 'required' => 'true']) }}
</div>

<div class="form-group">
    {{ Form::label('ruc', 'RUC') }}
    {{ Form::number('ruc', null, ['class' => 'form-control', 'min' => 0, 'required' => 'true']) }}
</div>

<div class="form-group">
    {{ Form::label('address', 'Dirección') }}
    {{ Form::text('address', null, ['class' => 'form-control uppercase', 'required' => 'true']) }}
</div>

<div class="form-group">
    {{ Form::label('phone_or_mobile', 'Número Celular / Teléfono') }}
    {{ Form::number('phone_or_mobile', null, ['class' => 'form-control', 'min' => 0, 'required' => 'true']) }}
</div>

<h3 class="form-section">Representante</h3> <br>

<div class="form-group">
    {{ Form::label('dni', 'DNI') }}
    @if(!empty($company->user->dni) && $company->user->dni != null)
        {{ Form::number('dni', $company->user->dni, ['class' => 'form-control', 'min' => 0, 'max'=> 99999999, 'required' => 'required']) }}
    @else
        {{ Form::number('dni', null, ['class' => 'form-control', 'min' => 0, 'max'=> 99999999, 'required' => 'required']) }}
    @endif
</div>

<div class="form-group">
    {{ Form::label('name', 'Nombres') }}
    @if(!empty($company->user->name) && $company->user->name != null)
        {{ Form::text('name', $company->user->name, ['class' => 'form-control uppercase', 'required' => 'required']) }}
    @else
        {{ Form::text('name', null, ['class' => 'form-control uppercase', 'required' => 'required']) }}
    @endif
</div>

<div class="form-group">
    {{ Form::label('paternal_surname', 'Apellido Paterno') }}
    @if(!empty($company->user->paternal_surname) && $company->user->paternal_surname != null)
        {{ Form::text('paternal_surname', $company->user->paternal_surname, ['class' => 'form-control uppercase', 'required' => 'required']) }}
    @else
        {{ Form::text('paternal_surname', null, ['class' => 'form-control uppercase', 'required' => 'required']) }}
    @endif
</div>

<div class="form-group">
    {{ Form::label('maternal_surname', 'Apellido Materno') }}
    @if(!empty($company->user->maternal_surname) && $company->user->maternal_surname != null)
        {{ Form::text('maternal_surname', $company->user->maternal_surname, ['class' => 'form-control uppercase', 'required' => 'required']) }}
    @else
        {{ Form::text('maternal_surname', null, ['class' => 'form-control uppercase', 'required' => 'required']) }}
    @endif
</div>

<div class="form-group">
    {{ Form::label('birth_date', 'Fecha de Nacimiento') }}
    @if(!empty($company->user->birth_date) && $company->user->birth_date != null)
        <div id="birthDatePicker" class="input-group date" data-link-field="birth_date">
            {!! Form::text(null, Carbon\Carbon::parse($company->user->birth_date)->format('d F Y'), ['class' => 'form-control', 'required'=>'required', 'readonly'=>'true']); !!}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {!! Form::hidden('birth_date', $company->user->birth_date, ['id' => 'birth_date', 'required'=>'required']); !!}
    @else
        <div id="birthDatePicker" class="input-group date" data-link-field="birth_date">
            {!! Form::text(null, null, ['class' => 'form-control', 'required'=>'required', 'readonly'=>'true']); !!}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {!! Form::hidden('birth_date', null, ['id' => 'birth_date', 'required'=>'required']); !!}
    @endif
</div>

<div class="form-group">
    {{ Form::label('email', 'E-Mail') }}
    @if(!empty($company->user->email) && $company->user->email != null)
        {{ Form::text('email', $company->user->email, ['class' => 'form-control', 'required' => 'required']) }}
    @else
        {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) }}
    @endif
</div> 