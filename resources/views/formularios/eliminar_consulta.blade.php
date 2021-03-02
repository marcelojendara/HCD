<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span></button>
      <h4 class="modal-title">¡ATENCION!</h4>
    </div>
    <div class="modal-body">
      <p style="font-size: 1.5em;">¿Estas seguro que quiere eliminar consulta?</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
      <form  method="post" action="{{action('PacienteController@eliminar_consulta')}}">
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <input type="hidden" name="idturno_c" value="{{$hse->IDTurno_C}}">
        <button type="submit" class="btn btn-outline">Si</button>
      </form>

    </div>
  </div>
  <!-- /.modal-content -->
</div>
