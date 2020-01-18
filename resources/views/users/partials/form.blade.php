@if ($user->roles[0]->id === 2) 
<div class="form-group">
    {{ Form::label('careers', 'Escuela(s) Profesinal(es)') }}
    {{ Form::select('careers[]', $careers, $selected, ['id' => 'careers', 'class' => 'form-control', 'multiple' => 'multiple', 'required' => 'required']) }}
</div>
@endif

<div class="form-group">
    {{ Form::label('dni', 'DNI') }}
    {{ Form::number('dni', null, ['class' => 'form-control', 'min' => 0, 'max'=> 99999999, 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('name', 'Nombres') }}
    {{ Form::text('name', null, ['class' => 'form-control uppercase', 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('paternal_surname', 'Apellido Paterno') }}
    {{ Form::text('paternal_surname', null, ['class' => 'form-control uppercase', 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('maternal_surname', 'Apellido Materno') }}
    {{ Form::text('maternal_surname', null, ['class' => 'form-control uppercase', 'required' => 'required']) }}
</div>

@if ($user->roles[0]->id === 1) 
    <div class="form-group">
        {{ Form::label('email', 'E-Mail') }}
        {{ Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) }}
    </div>   
@endif
 
<div class="form-group">
    {{ Form::label('birth_date', 'Fecha de Nacimiento') }}
    <div id="birthDatePicker" class="input-group date" data-link-field="birth_date">
        {!! Form::text(null, ($user->birth_date === null) ? null : Carbon\Carbon::parse($user->birth_date)->formatLocalized('%d %B %Y'), ['class' => 'form-control', 'readonly'=>'true', 'required' => 'required']) !!}
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
    </div>
    {!! Form::hidden('birth_date', $user->birth_date, ['id' => 'birth_date', 'required' => 'required']) !!}
</div>

<div class="form-group">
    {{ Form::label('birth_date', 'Sexo') }}
    <div class="mt-radio-inline">
        <label class="mt-radio">
            {{ Form::radio('gender', 'F') }}
            FEMENINO
            <span></span>
        </label>
        <label class="mt-radio">
            {{ Form::radio('gender', 'M') }}
            MASCULINO
            <span></span>
        </label>
    </div>
</div>

<h3 class="form-section">Roles</h3>

<div class="form-group">
    <div class="mt-checkbox-list">
        @foreach($roles as $role)
            <label class="mt-checkbox"> {{ $role->name }}
                {{ Form::checkbox('roles[]', $role->id, null) }}
                <span></span>
            </label>
        @endforeach
    </div>
</div>