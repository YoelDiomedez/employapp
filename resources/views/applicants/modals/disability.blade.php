<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="disabilityFile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {!! Form::open([
                'route'  => ['applicants.destroy'],
                'method' => 'DELETE'
            ]) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title text-center">
                    Certificado de Discapacidad
                </h4>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('uploads/applicant/'.$applicant->disability_file) }}" type="application/pdf" width="100%" height="500">
                {{ Form::hidden('disability_file_name', $applicant->disability_file)  }}
            </div>
            <div class="modal-footer">
                {{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->