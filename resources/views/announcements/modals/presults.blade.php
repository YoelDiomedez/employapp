<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="presults" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            {!! Form::model(
                $announcement,
                [
                    'route'  => ['announcements.delete', $announcement->id],
                    'method' => 'PATCH',
                    'files'  => true
                ] 
            ) !!}

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title text-center">
                    Resultado de Evaluación Curricular
                </h4>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('uploads/announcement/'.$announcement->partial_results) }}" type="application/pdf" width="100%" height="500">
                    {{ Form::hidden('partial_results', $announcement->partial_results)  }}
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