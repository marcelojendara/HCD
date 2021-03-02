

<div class="modal-dialog modal-lg" role="document" style="  width: 90%;">
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
        <div class="form-group">
          <h4>ECOGRAFÍA</h4>
          <select class="form-control select2" style="width: 100%;" required="true" id="plantillas_tipo" name="dependencia">
              <option value=""></option>
              @foreach($plantillas as $plantilla)
              <option value="{{$plantilla->plantila}}"> {{$plantilla->nombre}}</option>

              @endforeach

          </select>

          <div class="planilla" style="margin-top: 80px; border:1px solid">




          </div>
          <button type="button" class="btn pull-right btn-primary" id="guardar_ecografia">Guardar</button>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <form  method="post" id="form-nueva-eco" action="{{action('EcografiaController@nueva_ecografia')}}">
      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
      <input type="hidden" name="pacienteid" value="{{$idpaciente}}">
      <input type="hidden" name="eco_tipo" id="eco_tipo" value="">
      <input type="hidden" id="form-plantilla" name="plantilla" value="">

    </form>

  </div>
</div>

<script type="text/javascript">

$(document).ready(function() {
$(document).on('keyup', '#input', function () {

    if ($('#input').text().length > 0) {
      $('#post-placeholder').css('display', 'none');
    } else {
      $('#post-placeholder').css('display', 'block');
    }
  });

});



$('.select2').select2({
  dropdownParent: $("#capa_formularios")
});

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

$( document ).ready(function() {

  $('#plantillas_tipo').on('select2:select', function (e) {
    var d = new Date();
    var d = $.datepicker.formatDate('dd/mm/yy', new Date());
  //  alert (d);
  var plantilla = $('#plantillas_tipo').val();
  $('.planilla').html('');
  $('.planilla').append(plantilla);
  $('#fecha_eco').append(d);
  $('#nombre_pacient_eco').append('PABLO PAEZ');

});

    $('input').keyup(function(){
        $(this).attr('value',$(this).val());
        console.log('grabo');
    });



$(document).on('keyup', 'input', function () {

$(this).attr('value',$(this).val());
    $(this).keyup(function(){

    });
});

$(document).on('keyup', 'textarea', function () {

var valor = $(this).val();

$(this).html('');
$(this).append(valor);

    $(this).keyup(function(){

    });
});
$(document).on('change', 'input:radio', function () {


    $(this).change(function(){
        $(this).prop("checked", true);
    });
});



$(document).on('click', '#guardar_ecografia', function () {



  var informe = $('.planilla').html();
  $('#form-plantilla').val(informe);
  $('#form-nueva-eco').submit();
  $('form#form-nueva-eco').submit();
  console.log(informe);


});


});


</script>
