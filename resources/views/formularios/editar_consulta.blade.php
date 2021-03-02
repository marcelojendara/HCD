<script src="js\filtrosexamenfisico.js"></script>

<div class="modal-dialog modal-lg" role="document" style="  width: 90%;">
  <div class="modal-content">

    <!-- general form elements disabled -->
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Editar Consulta - SOEP</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" id="minimizar-nueva-hcd" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" id="cerrar-nueva-consulta" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <form  method="post" action="{{action('PacienteController@editar_consulta')}}">
          <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
          <input type="hidden" name="id_paciente" value="{{$idpaciente}}">
          <input type="hidden" name="IDTurno_c" value="{{$hse->IDTurno_C}}">
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label>Fecha:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" name="fecha" id="datepicker" required="true">
                </div>
                <!-- /.input group -->
              </div>

            </div>
            <div class="col-md-6">
              @if($medico->especialidad->ES_GUARDIA == 1)
              <div class="form-group">
                <label>Espacialidad</label>
                <select class="form-control select2" id="" style="width: 100%;" required="true" name="especialidad_medico">
                  <option selected="selected" value="{{$medico->especialidad->IDESPECIALIDAD}}">{{$medico->especialidad->ES_DETALLE}}</option>
                  <option>Gaurdia</option>

                </select>
              </div>
              @else
              <!-- /.form-group -->
              <div class="form-group">
                <label>Especialidad</label>
                <select class="form-control select2" style="width: 100%;" name="especialidad_medico">
                  <option selected="selected" value="{{$medico->especialidad->IDESPECIALIDAD}}">{{$medico->especialidad->ES_DETALLE}}</option>
                </select>
              </div>
              @endif

              <div class="form-group">
                <h4>Dependencias</h4>
                <select class="form-control select2" style="width: 100%;" required="true" id="dependencia_medico" name="dependencia">
                    <option selected="selected" value="{{$medico_dependencia->ID}}">{{$medico_dependencia->NOMBRE}}</option>
                  @foreach($dependencias as $dependencia)
                    <option value="{{$dependencia->ID}}">{{$dependencia->ID}} - {{$dependencia->NOMBRE}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>






          <div class="col-md-12">
            <div class="form-group">
              <h4>Diagnosticos / Síntomas / Practicas</h4>
              <select class="form-control select2" id="select-diag" multiple="multiple" data-placeholder="Seleccione diagnosticos"
                      style="width: 100%;" required="true" name="diagnostico[]">
                @foreach($diagnosticos as $diagnostico)

                  <option value="{{$diagnostico->DI_CODIGO}}">{{$diagnostico->DI_CODIGO}} - {{$diagnostico->Diagnostico}}</option>
                @endforeach
              </select>
            </div>

          </div>
          <!-- text input -->
          <div class="col-md-6">
            <div class="box-body pad">
              <label>S</label>
                <textarea id="editor1" name="editor1" rows="2" cols="50" >
                  {{$hse->TU_SNarrativa}}
                  </textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box-body pad">
              <label>O</label>
                <textarea id="editor2" name="editor2" rows="2" cols="50" >
                  {{$hse->TU_ONarrativa}}
                  </textarea>
            </div>
          </div>

          <div class="col-md-6">
            <div class="box-body pad">
              <label>E</label>
                <textarea id="editor3" name="editor3" rows="2" cols="50" required="true" >
                  {{$hse->TU_ENarrativa}}
                  </textarea>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box-body pad">
              <label>P</label>
                <textarea id="editor4" name="editor4" rows="2" cols="50" >
                  {{$hse->TU_PNarrativa}}
                  </textarea>
            </div>
          </div>
          <div class="box-body pad ">

              <textarea id="editor5" name="editor5" rows="2" cols="50" class="hide">
                </textarea>
          </div>
          <button type="submit" class="btn pull-right btn-primary">Guardar</button>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->


  </div>
</div>
<input type="hidden" name="" id="diag" value="{{json_encode($diag_consutla,true)}}">
<script type="text/javascript">

$('#minimizar-nueva-hcd').on('click', function(event) {

  $("#capa_formularios").modal("hide");

  var nueva_consulta_minimizada = '<div class="col-md-2" id="consulta-minimizada" style=" display: inline-block;  position: fixed;bottom: 0px;right: 0px;">'
                                    +'<div class="box box-warning bg-yellow box-solid">'
                                      +'<div class="box-header with-border">'
                                        +'<h3 class="box-title">Continuar Consulta...</h3>'
                                        +'<div class="box-tools pull-right">'
                                          +'<button type="button" class="btn btn-box-tool" data-widget="collapse" id="continuar-nueva-hcd"><i class="fa fa-edit"></i>'
                                          +'</button>'
                                          +'<button type="button" class="btn btn-box-tool" id="cerrar-nueva-consulta" data-widget="collapse"><i class="fa fa-close"></i>'
                                          +'</button>'
                                        +'</div>'
                                      +'</div>'
                                    +'</div>'
                                  +'</div>';
  $( "#hcd-paciente" ).append( nueva_consulta_minimizada );
  $("#button-nueva-consulta").prop('disabled', true);

});

$(document).on('click', '#cerrar-nueva-consulta', function () {


  $("#capa_formularios").modal("hide");
  $("#button-nueva-consulta").prop('disabled', false);
  $( "#consulta-minimizada" ).remove();

});


$(document).on('click', '#continuar-nueva-hcd', function () {


  $("#capa_formularios").modal("show");

  $( "#consulta-minimizada" ).remove();

});


</script>

<script>

$('.select2').select2({
  dropdownParent: $("#capa_formularios")
});
var diag = $('#diag').val();
diag = jQuery.parseJSON(diag);
console.log(diag);
$('#select-diag').val(diag).change();
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('editor2');

    var editor = CKEDITOR.replace( 'editor3');


    CKEDITOR.replace('editor4');

  })


// $("#datepicker").datepicker("setDate",moment(new Date()).format("DD/MM/YYYY"));


//$("#datepicker").datepicker();

$('#datepicker').datepicker({
    todayBtn: "linked",
    language: "es",
    autoclose: true,
    todayHighlight: true,
    format: 'dd/mm/yyyy'
});
$('#inputfpp').datepicker({
    todayBtn: "linked",
    language: "es",
    autoclose: true,
    todayHighlight: true,
    format: 'dd/mm/yyyy'
});
$('#inputfum').datepicker({
    todayBtn: "linked",
    language: "es",
    autoclose: true,
    todayHighlight: true,
    format: 'dd/mm/yyyy'
});
$('#inputfdp').datepicker({
    todayBtn: "linked",
    language: "es",
    autoclose: true,
    todayHighlight: true,
    format: 'dd/mm/yyyy'
});
$("#datepicker").datepicker("setDate",moment(new Date()).format("DD/MM/YYYY"));



</script>

<script type="text/javascript">
<!--
function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {
              return true;
          }else if(key == 46){
                if(filter(tempValue)=== false){
                    return false;
                }else{
                    return true;
                }
          }else{
              return false;
          }
    }
}
function filter(__val__){
    var preg = /[0-3]{0,1}[0-9]{0,1}[0-9]{0,1}[^A-Za-z0-9][0-9]{0,1}[0-9]{0,1}[0-9]{0,1}/;
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }

}
-->
</script>
