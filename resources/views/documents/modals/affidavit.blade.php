<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="affidavitFile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            {!! Form::open([
                'route'  => ['documents.destroy'],
                'method' => 'DELETE'
            ]) !!}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title text-center">
                    Declaración Jurada
                </h4>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('uploads/document/'.$document->affidavit_file) }}" type="application/pdf" width="100%" height="500">
                    {{ Form::hidden('affidavit_file', $document->affidavit_file)  }}
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