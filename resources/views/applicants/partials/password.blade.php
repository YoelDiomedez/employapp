<!-- CHANGE PASSWORD TAB -->
<div class="tab-pane" id="tab_1_3">
    {!! Form::open([
        'route'  => ['applicants.change'],
        'method' => 'PATCH'
    ]) !!}
        <div class="form-group">
            <label class="control-label">Contraseña Actual</label>
            {{ Form::password('current_password', ['class' => 'form-control', 'required' => 'true']) }}
        </div>
        <div class="form-group">
            <label class="control-label">Nueva Contraseña</label>
            {{ Form::password('password', ['class' => 'form-control', 'required' => 'true']) }}
        </div>
        <div class="form-group">
            <label class="control-label">Confirmar Contraseña</label>
            {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'true']) }}
        </div>
        <div class="margin-top-10">
            {{ Form::submit('Actualizar', ['class' => 'btn btn-warning']) }}
            {{ Form::reset('Cancelar', ['class' => 'btn btn-default']) }}
        </div>
    {!! Form::close() !!}
</div>
<!-- END CHANGE PASSWORD TAB -->