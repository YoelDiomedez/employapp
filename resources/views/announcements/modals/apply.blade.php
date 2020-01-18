 <div class="modal fade bs-modal-sm" id="apply-{{$announcement->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content text-center">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">¿Desea Postular? </h4>
            </div>
            {!! Form::open([
                'route' => ['announcements.apply', $announcement->id],
                'method' => 'POST'
            ]) !!}
            <div class="modal-body">
                PROCESO CAS № {{ str_pad($announcement->id,3,"0",STR_PAD_LEFT) }}-{{Carbon\Carbon::parse($announcement->posted_date)->format('Y') }}
            </div>
            <div class="modal-footer">
                <div  class="center-block text-center">
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>