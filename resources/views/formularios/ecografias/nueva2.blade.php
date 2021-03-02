<script src="/js/tinymce.js" referrerpolicy="origin"></script>
  <script>
  tinymce.init({
    selector:'textarea',
    height : "920",
    plugins: 'print preview fullpage table ',
    language: 'es'



  });
</script>
  <style media="screen">
  .ML__keyboard.is-visible {
z-index: 9999;
}
.ML__keyboard div .rows > ul > li {
background: #fff !important;
border-bottom-color: #8d8f92 !important;

&.separator {
  background: transparent !important;
  border: none !important;
  pointer-events: none !important;
}
}

.ML__keyboard div .rows > ul > li.action.font-glyph,
.ML__keyboard div .rows > ul > li.modifier.font-glyph {
&[data-alt-keys="delete"] {
  font-size: 34px;
  align-items: center;
}
}

.sr-only {
position: absolute !important;
width: 1px !important;
height: 1px !important;
overflow: hidden;
}

.tox {
.mathlive-input {
  border: 1px solid #207ab7 !important;
  border-radius: 4px !important;
  min-height: 40px !important;
  //height: 40px !important;
  box-sizing: border-box !important;
  position: static !important;

  * {
    position: relative;
  }
  .ML__textarea__textarea {
    width: 1px;
    height: 1px;
    position: absolute;
  }
  .ML__fieldcontainer__field {
    width: 100%;
  }
  .ML__virtual-keyboard-toggle {
    width: 34px;
    height: 34px;
  }
}
.tox-dialog-wrap {
  position: fixed;
}
.tox-dialog.mathlive {
  overflow: visible;

  .tox-dialog__body-content {
    overflow: visible;
    max-width: 100%;
  }
}

}
.tox-notification { display: none !important }
.tox-statusbar { display: none !important }

  </style>

<div class="modal-dialog modal-lg" role="document" style="  width: 90%;height: 90%;">
  <div class="modal-content">

    <!-- general form elements disabled -->
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Nueva Ecografía</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" id="minimizar-nueva-hcd" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" id="cerrar-nueva-consulta" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="" style="margin-bottom: 30px;">
          <h4>ECOGRAFÍA</h4>
          <select class="form-control select2" style="width: 100%;" required="true" id="plantillas_tipo" name="dependencia">
              <option value=""></option>
              @foreach($plantillas as $plantilla)
              <option value="{{$plantilla->plantila}}" id="{{$plantilla->id}}"> {{$plantilla->nombre}}</option>

              @endforeach

          </select>
        </div>

        <textarea id="editor">

</textarea>

<form  method="post" id="form-nueva-eco" action="{{action('EcografiaController@nueva_ecografia')}}" enctype="multipart/form-data">
  <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
  <input type="hidden" name="pacienteid" value="{{$idpaciente}}">
  <input type="hidden" name="eco_id" id="eco_id" value="">
  <input type="hidden" id="form-plantilla" name="plantilla" value="">
  <div class="">
    <h3>Subir imagenes</h3>
    <p>
    <input id="files-upload" type="file" name="imagenes[]" multiple>
    </p>
  </div>


</form>

  <button type="button" class="btn pull-right btn-primary" id="guardar_ecografia">Guardar</button>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->


  </div>
</div>
<script type="text/javascript">
$('.select2').select2({

});
</script>
<script type="text/javascript">

$( document ).ready(function() {

  $('#plantillas_tipo').on('select2:select', function (e) {

    var d = new Date();
    var d = $.datepicker.formatDate('dd/mm/yy', new Date());
  //  alert (d);
  var plantilla = $('#plantillas_tipo').val();
  //console.log(plantilla);
  var idplantilla = $(this).find('option:selected').attr('id');
  console.log(idplantilla);
  tinymce.activeEditor.setContent(plantilla, {format: 'raw'});
  $('#editor').html('');
  $('#editor').append(plantilla);


});


$(document).on('click', '#guardar_ecografia', function () {



  var informe = $('#editor').html();
  var idplantilla = $('#plantillas_tipo').find('option:selected').attr('id');
  $('#eco_id').val(idplantilla);
  $('#form-plantilla').val(informe);
  $('#form-nueva-eco').submit();
  $('form#form-nueva-eco').submit();
  console.log(informe);


});
});
</script>
