<h3 class="form-section"></h3>
<div class="form-group">
    {{ Form::label('name', 'Nombre') }}
    {{ Form::text('name', null, ['class' => 'form-control uppercase', 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('slug', 'Slug (URL Amigable)') }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('description', 'Descripción') }}
    {{ Form::textarea('description', null, ['class' => 'form-control uppercase', 'rows' => 1]) }}
</div>

<h3 class="form-section">Especial</h3>

<div class="form-group">
    <div class="mt-radio-inline">
        <label class="mt-radio">
            {{ Form::radio('special', 'all-access') }}
            Acceso-Total
            <span></span>
        </label>
        <label class="mt-radio">
            {{ Form::radio('special', 'no-access') }}
            Ningún-Acceso
            <span></span>
        </label>
    </div>
</div>

<h3 class="form-section">Permisos</h3>

<div class="form-group">
    <div class="mt-checkbox-list">
        @foreach($permissions as $permission)
            <label class="mt-checkbox"> {{ $permission->name }} <em>({{ $permission->description ? : 'N/A' }})</em>
                {{ Form::checkbox('permissions[]', $permission->id, null) }}
                <span></span>
            </label>
        @endforeach
    </div>
</div>