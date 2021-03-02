

<div class="modal-dialog modal-lg" role="document" style="  width: 90%;">
  <div class="modal-content">

    <!-- general form elements disabled -->
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Posibles familiares</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" id="minimizar-nueva-hcd" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" id="cerrar-nueva-consulta" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table cellpadding="5" cellspacing="0" border="0" class="table table-hover table-striped">
          <tr>
            <th><strong>Nombre</strong></th>
            <th><strong>Apellido</strong></th>
            <th><strong>Dirección</strong></th>
            <th><strong>Teléfono</strong></th>
          </tr>

          @foreach ($familiares as $familiar)
            <tr>
              <td>{{$familiar['PA_NOMBRE']}}</td>
              <td>{{$familiar['PA_APELLIDO']}}</td>
              <td>{{$familiar['calle']['Nombre']}}</td>
              <td>{{$familiar['PA_TELEF']}}</td>
            </tr>
          @endforeach
        </table>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->


  </div>
</div>
