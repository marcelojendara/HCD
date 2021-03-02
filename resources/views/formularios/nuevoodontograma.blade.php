<div class="modal-dialog modal-lg" role="document" style="  width: 90%;">
  <div class="modal-content">
    <link href="css/base.css?version2.1" rel="stylesheet">


    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Odontograma</h3>
      </div>
      <div class="box-body">

        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="col-md-3">
              <div class="form-group">
                <label>Posición</label>
                <select class="form-control select2" style="width: 100%;" id="select-posicion">
                  <option selected="selected" value="c">Oclusal/Incisal</option>
                  <option value="r">Mesial</option>
                  <option value="l">Distal</option>
                  <option value="t">Vestibular</option>
                  <option value="b">Palatino/lingual</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <label>Num diente</label>
              <input type="text" class="form-control"  placeholder="" name="numero_diente" id="input-num-diente" value="">
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Tratamiento</label>
                <select class="form-control select2" style="width: 100%;" id="select-tratamiento">
                  <option selected="selected" value="Caries">Caries</option>
                  <option value="restauracion">Restauración</option>
                  <option value="extraccion">Restauración deficiente</option>
                  <option value="surco profundo">Surcos profundos</option>
                  <option value="Sellador">Sellador</option>
                  <option value="puente">Fractura dentaria</option>
                  <option value="Pieza con indicación de extracción">Pieza con indicación de extracción</option>
                  <option value="Pieza ausente">Pieza ausente</option>
                  <option value="Pieza no erupcionada">Pieza no erupcionada</option>
                  <option value="Corona">Corona</option>
                  <option value="puente">Corona deficiente</option>
                  <option value="Corona indicada">Corona indicada</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">

                <button type="button" class="btn pull-left btn-primary" style="margin-top: 23px;" id="agregar-tratamiento">Agregar</button>
              </div>
            </div>
            <table id="table-odontograma" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Posición</th>
                <th>Num diente</th>
                <th>Tratamiento</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>



            <div id="tr" class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
            </div>
            <div id="tl" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            </div>
            <div id="br" class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
            </div>
            <div id="bl" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            </div>

        </div>
        <div class="row" style="margin-top:25px;">
          <div id="tlr" class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
          </div>
          <div id="tll" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
          </div>
            <div id="blr" class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
            </div>
            <div id="bll" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            </div>

        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-left">
                            <div style="height: 20px; width:20px; display:inline-block;" class="click-red"></div> <span style="color:red">COLOR ROJO</span>= Prestación existente
                            <br>
                            <div style="height: 20px; width:20px; display:inline-block;" class="click-blue"></div> <span style="color:blue">COLOR AZUL</span>= Prestación requerida
                            <br>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                            <img style="display:inline:block;" src="images/rojo.png"> = Pieza ausente
                            <br>
                            <img style="display:inline:block;" src="images/azul.png"> = Pieza no erupcionada

                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                          <img style="display:inline:block;" src="images/estraccion.png"> = Pieza con indicación de extracción
                          <br>
                          <img style="display:inline:block;" src="images/coronaind.png"> = corona indicada

                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                          <img style="display:inline:block;" src="images/corona.png"> = corona
                          <br>
                          <img style="display:inline:block;" src="images/coronadef.png"> = corona deficiente
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                          <img style="display:inline:block;" src="images/surcos.png"> = surcos profundos
                          <br>
                          <img style="display:inline:block;" src="images/sellador.png"> = sellador
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <form  method="post" action="{{action('PacienteController@guardar_odontograma')}}" id="form-guarda-odontograma">
          <div class="hide" id="renglonesdinamicos">
            <input type="hidden" name="paciente_id" value="{{$idpaciente_odontograma}}">
          </div>
      </form>
        <div class="modal-footer">
          <button class="btn" data-number="2">Cerrar</button>
          <button type="button" class="btn btn-primary " id="button-guardar-odontograma">Guardar</button>
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- <div class="modal fade" tabindex="-1" role="dialog" id="modal-tratramiento">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close"  aria-label="Close" data-number="2"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Seleccione tratamiento</h4>
          </div>
          <div class="modal-body">
            <input type="hidden" name="" value="" id="input-diente-modal">
            <div class="form-group">
              <label>Tratamiento</label>
              <select class="form-control select2" style="width: 100%;" id="select-tratamiento-modal">
                <option selected="selected" value="fractura">Fractura</option>
                <option value="restauracion">Restauración</option>
                <option value="extraccion">Restauración deficiente</option>
                <option value="extraer">Surcos profundos</option>
                <option value="puente">Sellador</option>
                <option value="puente">Fractura dentaria</option>
                <option value="puente">Pieza con indicación de extracción</option>
                <option value="puente">Pieza ausente</option>
                <option value="puente">Pieza no erupcionada</option>
                <option value="puente">Corona</option>
                <option value="puente">Corona deficiente</option>
                <option value="puente">Corona indicada</option>



              </select>
            </div>
          </div>


        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --> -->


    <script type="text/javascript">

    $(document).ready( function () {
      $("button[data-number=2]").click(function(){

        $('#modal-tratramiento').modal('hide');
      });



    });

    </script>
    <script type="text/javascript">
    function replaceAll(find, replace, str) {
        return str.replace(new RegExp(find, 'g'), replace);
    }


    function createOdontogram() {
        var htmlLecheLeft = "",
            htmlLecheRight = "",
            htmlLeft = "",
            htmlRight = "",
            a = 1;
        for (var i = 9 - 1; i >= 1; i--) {
            //Dientes Definitivos Cuandrante Derecho (Superior/Inferior)
            htmlRight += '<div data-name="value" id="dienteindex' + i + '" style="left: -25%;" class="diente">' +
                '<span style="margin-left: 45px; margin-bottom:5px; display: inline-block !important; border-radius: 10px !important;" class="label label-info">index' + i + '</span>' +
                '<div id="tindex' + i + '" class="cuadro click">' +
                '</div>' +
                '<div id="lindex' + i + '" class="cuadro izquierdo click">' +
                '</div>' +
                '<div id="bindex' + i + '" class="cuadro debajo click">' +
                '</div>' +
                '<div id="rindex' + i + '" class="cuadro derecha click click">' +
                '</div>' +
                '<div id="cindex' + i + '" class="centro click">' +
                '</div>' +
                '</div>';
            //Dientes Definitivos Cuandrante Izquierdo (Superior/Inferior)
            htmlLeft += '<div id="dienteindex' + a + '" class="diente">' +
                '<span style="margin-left: 45px; margin-bottom:5px; display: inline-block !important; border-radius: 10px !important;" class="label label-info">index' + a + '</span>' +
                '<div id="tindex' + a + '" class="cuadro click">' +
                '</div>' +
                '<div id="lindex' + a + '" class="cuadro izquierdo click">' +
                '</div>' +
                '<div id="bindex' + a + '" class="cuadro debajo click">' +
                '</div>' +
                '<div id="rindex' + a + '" class="cuadro derecha click click">' +
                '</div>' +
                '<div id="cindex' + a + '" class="centro click">' +
                '</div>' +
                '</div>';
            if (i <= 5) {
                //Dientes Temporales Cuandrante Derecho (Superior/Inferior)
                htmlLecheRight += '<div id="dienteLindex' + i + '" style="left: -25%;" class="diente-leche">' +
                    '<span style="margin-left: 45px; margin-bottom:5px; display: inline-block !important; border-radius: 10px !important;" class="label label-primary">index' + i + '</span>' +
                    '<div id="tlecheindex' + i + '" class="cuadro top click">' +
                    '</div>' +
                    '<div id="llecheindex' + i + '" class="cuadro izquierdo click">' +
                    '</div>' +
                    '<div id="blecheindex' + i + '" class="cuadro debajo click">' +
                    '</div>' +
                    '<div id="rlecheindex' + i + '" class="cuadro derecha click click">' +
                    '</div>' +
                    '<div id="clecheindex' + i + '" class="centro click">' +
                    '</div>' +
                    '</div>';
            }
            if (a < 6) {
                //Dientes Temporales Cuandrante Izquierdo (Superior/Inferior)
                htmlLecheLeft += '<div id="dienteLindex' + a + '" class="diente-leche">' +
                    '<span style="margin-left: 45px; margin-bottom:5px; display: inline-block !important; border-radius: 10px !important;" class="label label-primary">index' + a + '</span>' +
                    '<div id="tlecheindex' + a + '" class="cuadro top click">' +
                    '</div>' +
                    '<div id="llecheindex' + a + '" class="cuadro izquierdo click">' +
                    '</div>' +
                    '<div id="blecheindex' + a + '" class="cuadro debajo click">' +
                    '</div>' +
                    '<div id="rlecheindex' + a + '" class="cuadro derecha click click">' +
                    '</div>' +
                    '<div id="clecheindex' + a + '" class="centro click">' +
                    '</div>' +
                    '</div>';
            }
            a++;
        }
        $("#tr").append(replaceAll('index', '1', htmlRight));
        $("#tl").append(replaceAll('index', '2', htmlLeft));
        $("#tlr").append(replaceAll('index', '5', htmlLecheRight));
        $("#tll").append(replaceAll('index', '6', htmlLecheLeft));


        $("#bl").append(replaceAll('index', '3', htmlLeft));
        $("#br").append(replaceAll('index', '4', htmlRight));
        $("#bll").append(replaceAll('index', '7', htmlLecheLeft));
        $("#blr").append(replaceAll('index', '8', htmlLecheRight));
    }
    var arrayPuente = [];
    $(document).ready(function() {
        createOdontogram();

        $("#agregar-tratamiento").click(function(event){
          var control = $("#select-tratamiento").val();
          var cuadro = $("#select-posicion").val()+$("#input-num-diente").val();
          console.log(cuadro);
          marcar_odontograma(control,cuadro);
        });

        $('#button-marcar-odontograma').on('click', function (event) {
          var control = $('#select-tratamiento-modal').val();
          var cuadro = $('#input-diente-modal').val();
          marcar_odontograma(control,cuadro);
          agregar_tratamiento_tabla(control,cuadro);


          $('#modal-tratramiento').modal('hide');
      });



        $(".click").click(function(event) {
            var cuadro = $(this).find("input[name=cuadro]:hidden").val();
            var numero = $(this).attr('id').substring(1);
            var lado = $(this).attr('id').charAt(0);
            $('#select-posicion').val(lado).change();

            $('#input-num-diente').val(numero);
            $('#select-tratamiento').select2('open');


            return false;
        });


        //--------eliminar trataminto------------//
        $(document).on('click','.borrartratamiento',function(){

          var cuadro = $(this).data("cuadro");

          var control = $(this).data("control");

          desmarcar_odontograma(control,cuadro);

          table_odontograma.row( $(this).parents('tr') ).remove().draw();


        });

        //-------- fin eliminar trataminto------------//

        var table_odontograma = $('#table-odontograma').DataTable({
          'paging'      : false,
           'lengthChange': false,
           'searching'   : false,
           'ordering'    : false,
           'info'        : false,
           'autoWidth'   : false,
           'destroy': false,
           'language': {
             "sEmptyTable":     " ",
           }
        });



        $( "#button-guardar-odontograma" ).click(function() {

          $('tr.renglonesarray').each(function( index ) {

    			var lado = $( this ).children( ":nth-child(1)" ).html();
    			var numero = $( this ).children( ":nth-child(3)" ).html();
    			var tratamiento = $( this ).children( ":nth-child(4)" ).html();

        console.log(lado+' - '+numero+' - '+tratamiento);

    			 var input_tratamiento_lado = '<input type="hidden" name="renglones[' + index + '][input_tratamiento_lado]" value="'+ lado +'">';
    			 var input_tratamiento_numero = '<input type="hidden" name="renglones[' + index + '][input_tratamiento_numero]" value="'+ numero +'">';
    			 var input_tratamiento = '<input type="hidden" name="renglones[' + index + '][input_tratamiento]" value="'+ tratamiento +'">';

    			 $('#renglonesdinamicos').append(input_tratamiento_lado);
    			 $('#renglonesdinamicos').append(input_tratamiento_numero);
    			 $('#renglonesdinamicos').append(input_tratamiento);
    			// $('#renglonesdinamicos').append(inputbonifart);
    			// $('#renglonesdinamicos').append(inputtotart);


    		});


    		$('#form-guarda-odontograma').submit();
      });



        function agregar_tratamiento_tabla(control,cuadro){

          var lado =  $('#'+cuadro).attr('id').charAt(0);
          var numero = $('#'+cuadro).attr('id').substring(1);
          var lado_table = '';
          switch (lado) {
            case 'c':
              lado_table = 'Centro';

              break;
            case 'l':
            lado_table = 'Izquierdo';

              break;
            case 'r':
            lado_table = 'Derecho';

              break;
            case 't':
            lado_table = 'Arriba';

              break;
            case 'b':
            lado_table = 'Abajo';

              break;

            default:

          }


          // table_odontograma.row.add( [
          //     lado_table,
          //     numero,
          //     control,
          //     '<i class="fa fa-trash"></i>'
          // ] ).draw( false );


          $('#table-odontograma').append('<tr data-idrenglonarray="'+ 0 +'" class="renglonesarray"><td class="hide">' + lado + '</td><td>' + lado_table + '</td><td>' + numero + '</td><td>' + control + '</td><td style="text-align: center;"><div class="borrartratamiento" data-control="'+ control +'" data-cuadro="'+ cuadro +'"><i class="fa fa-trash"></i></div></td> </tr>');

        }





        function marcar_odontograma(control,cuadro){
          console.log(control);
          switch (control) {
            case "Caries":
                          $('#'+cuadro).addClass('click-red');

                          agregar_tratamiento_tabla(control,cuadro);
                  break;
            case "restauracion":

                          $('#'+cuadro).addClass('click-blue');

                          agregar_tratamiento_tabla(control,cuadro);
                  break;
            case "surco profundo":

                          var numero = cuadro.substring(1);
                          $('#c'+numero).html('<div style="    width: 100%;  height: 100%;display: flex;  justify-content: center;align-items: center;"><span style="position: absolute;color: #0000ff;">SP</span></div>');

                          agregar_tratamiento_tabla(control,cuadro);
                  break;
            case "Sellador":

                          var numero = cuadro.substring(1);
                          $('#c'+numero).html('<div style="    width: 100%;  height: 100%;display: flex;  justify-content: center;align-items: center;"><span style="position: absolute;color: red;">Se</span></div>');

                          agregar_tratamiento_tabla(control,cuadro);
                  break;
            case "Pieza con indicación de extracción":

                          var numero = cuadro.substring(1);
                          $('#c'+numero).html('<div style="width: 100%;height: 3px;margin-top: 25%;background-color: blue;"></div> <div style="width: 100%;height: 3px;margin-top: 25%;background-color: blue;"></div>');

                          agregar_tratamiento_tabla(control,cuadro);
                  break;
            case "Pieza no erupcionada":

                          var numero = cuadro.substring(1);
                          $('#c'+numero).html('<div style="width: 100%;height: 100%;background-image: url(images/cruza.png);background-repeat: no-repeat;background-size: cover;"></div>');

                          agregar_tratamiento_tabla(control,cuadro);
                  break;
            case "Pieza ausente":

                        var numero = cuadro.substring(1);
                        $('#c'+numero).html('<div style="width: 100%;height: 100%;background-image: url(images/cruzr.png);background-repeat: no-repeat;background-size: cover;"></div>');

                        agregar_tratamiento_tabla(control,cuadro);
                break;

              case "extraccion":
              var numero = $('#'+cuadro).attr('id').substring(1);
              console.log(numero);
                      $('#l'+numero).addClass('click-gray');
                      $('#r'+numero).addClass('click-gray');
                      $('#t'+numero).addClass('click-gray');
                      $('#b'+numero).addClass('click-gray');
                      $('#c'+numero).addClass('click-gray');


                      agregar_tratamiento_tabla(control,cuadro);
                  break;
              case "extraer":
              var numero = $('#'+cuadro).attr('id').substring(1);

                      $('#l'+numero).addClass('click-purple');
                      $('#r'+numero).addClass('click-purple');
                      $('#t'+numero).addClass('click-purple');
                      $('#b'+numero).addClass('click-purple');
                      $('#c'+numero).addClass('click-purple');


                      agregar_tratamiento_tabla(control,cuadro);

                  break;
              case "Corona":
                  var dientePosition = $('#'+cuadro).offset(), leftPX;
                  console.log($('#'+cuadro)[0].offsetLeft)
                  var noDiente = $('#'+cuadro).parent().children().first().text();
                  var cuadrante = $('#'+cuadro).parent().parent().attr('id');
                  var left = 0,
                      width = 0;
                  if (arrayPuente.length < 1) {
                      $('#'+cuadro).parent().children('.cuadro').css('border-color', 'red');
                      arrayPuente.push({
                          diente: noDiente,
                          cuadrante: cuadrante,
                          left: $(this)[0].offsetLeft,
                          father: null
                      });
                  } else {
                      $('#'+cuadro).parent().children('.cuadro').css('border-color', 'red');
                      arrayPuente.push({
                          diente: noDiente,
                          cuadrante: cuadrante,
                          left: $('#'+cuadro)[0].offsetLeft,
                          father: arrayPuente[0].diente
                      });
                      var diferencia = Math.abs((parseInt(arrayPuente[1].diente) - parseInt(arrayPuente[1].father)));
                      if (diferencia == 1) width = diferencia * 60;
                      else width = diferencia * 50;

                      if(arrayPuente[0].cuadrante == arrayPuente[1].cuadrante) {
                          if(arrayPuente[0].cuadrante == 'tr' || arrayPuente[0].cuadrante == 'tlr' || arrayPuente[0].cuadrante == 'br' || arrayPuente[0].cuadrante == 'blr') {
                              if (arrayPuente[0].diente > arrayPuente[1].diente) {
                                  console.log(arrayPuente[0])
                                  leftPX = (parseInt(arrayPuente[0].left)+10)+"px";
                              }else {
                                  leftPX = (parseInt(arrayPuente[1].left)+10)+"px";
                                  //leftPX = "45px";
                              }
                          }else {
                              if (arrayPuente[0].diente < arrayPuente[1].diente) {
                                  leftPX = "-45px";
                              }else {
                                  leftPX = "45px";
                              }
                          }
                      }
                      console.log(leftPX)
                      /*$(this).parent().append('<div style="z-index: 9999; height: 5px; width:' + width + 'px;" id="puente" class="click-red"></div>');
                      $(this).parent().children().last().css({
                          "position": "absolute",
                          "top": "80px",
                          "left": "50px"
                      });*/

                        agregar_tratamiento_tabla(control,cuadro);

                  }

                  break;
              case "Corona indicada":
                  var dientePosition = $('#'+cuadro).offset(), leftPX;
                  console.log($('#'+cuadro)[0].offsetLeft)
                  var noDiente = $('#'+cuadro).parent().children().first().text();
                  var cuadrante = $('#'+cuadro).parent().parent().attr('id');
                  var left = 0,
                      width = 0;
                  if (arrayPuente.length < 1) {
                      $('#'+cuadro).parent().children('.cuadro').css('border-color', 'blue');
                      arrayPuente.push({
                          diente: noDiente,
                          cuadrante: cuadrante,
                          left: $(this)[0].offsetLeft,
                          father: null
                      });
                  } else {
                      $('#'+cuadro).parent().children('.cuadro').css('border-color', 'blue');
                      arrayPuente.push({
                          diente: noDiente,
                          cuadrante: cuadrante,
                          left: $('#'+cuadro)[0].offsetLeft,
                          father: arrayPuente[0].diente
                      });
                      var diferencia = Math.abs((parseInt(arrayPuente[1].diente) - parseInt(arrayPuente[1].father)));
                      if (diferencia == 1) width = diferencia * 60;
                      else width = diferencia * 50;

                      if(arrayPuente[0].cuadrante == arrayPuente[1].cuadrante) {
                          if(arrayPuente[0].cuadrante == 'tr' || arrayPuente[0].cuadrante == 'tlr' || arrayPuente[0].cuadrante == 'br' || arrayPuente[0].cuadrante == 'blr') {
                              if (arrayPuente[0].diente > arrayPuente[1].diente) {
                                  console.log(arrayPuente[0])
                                  leftPX = (parseInt(arrayPuente[0].left)+10)+"px";
                              }else {
                                  leftPX = (parseInt(arrayPuente[1].left)+10)+"px";
                                  //leftPX = "45px";
                              }
                          }else {
                              if (arrayPuente[0].diente < arrayPuente[1].diente) {
                                  leftPX = "-45px";
                              }else {
                                  leftPX = "45px";
                              }
                          }
                      }
                      console.log(leftPX)
                      /*$(this).parent().append('<div style="z-index: 9999; height: 5px; width:' + width + 'px;" id="puente" class="click-red"></div>');
                      $(this).parent().children().last().css({
                          "position": "absolute",
                          "top": "80px",
                          "left": "50px"
                      });*/

                        agregar_tratamiento_tabla(control,cuadro);

                  }

                  break;
              default:
                  console.log("borrar case");
          }
        }

        function desmarcar_odontograma(control,cuadro){
          console.log(control);
          switch (control) {
              case "Caries":
                          $('#'+cuadro).removeClass('click-red');
                  break;
              case "restauracion":
                          $('#'+cuadro).removeClass('click-blue');
                  break;
              case "extraccion":
              var numero = $('#'+cuadro).attr('id').substring(1);
              console.log(numero);
                      $('#l'+numero).removeClass('click-gray');
                      $('#r'+numero).removeClass('click-gray');
                      $('#t'+numero).removeClass('click-gray');
                      $('#b'+numero).removeClass('click-gray');
                      $('#c'+numero).removeClass('click-gray');

                  break;
              case "extraer":
              var numero = $('#'+cuadro).attr('id').substring(1);

                      $('#l'+numero).removeClass('click-purple');
                      $('#r'+numero).removeClass('click-purple');
                      $('#t'+numero).removeClass('click-purple');
                      $('#b'+numero).removeClass('click-purple');
                      $('#c'+numero).removeClass('click-purple');
                  break;
              case "puente":
                  var dientePosition = $('#'+cuadro).offset(), leftPX;
                  console.log($('#'+cuadro)[0].offsetLeft)
                  var noDiente = $('#'+cuadro).parent().children().first().text();
                  var cuadrante = $('#'+cuadro).parent().parent().attr('id');
                  var left = 0,
                      width = 0;
                  if (arrayPuente.length < 1) {
                      $('#'+cuadro).parent().children('.cuadro').css('border-color', 'red');
                      arrayPuente.push({
                          diente: noDiente,
                          cuadrante: cuadrante,
                          left: $(this)[0].offsetLeft,
                          father: null
                      });
                  } else {
                      $('#'+cuadro).parent().children('.cuadro').css('border-color', 'red');
                      arrayPuente.push({
                          diente: noDiente,
                          cuadrante: cuadrante,
                          left: $('#'+cuadro)[0].offsetLeft,
                          father: arrayPuente[0].diente
                      });
                      var diferencia = Math.abs((parseInt(arrayPuente[1].diente) - parseInt(arrayPuente[1].father)));
                      if (diferencia == 1) width = diferencia * 60;
                      else width = diferencia * 50;

                      if(arrayPuente[0].cuadrante == arrayPuente[1].cuadrante) {
                          if(arrayPuente[0].cuadrante == 'tr' || arrayPuente[0].cuadrante == 'tlr' || arrayPuente[0].cuadrante == 'br' || arrayPuente[0].cuadrante == 'blr') {
                              if (arrayPuente[0].diente > arrayPuente[1].diente) {
                                  console.log(arrayPuente[0])
                                  leftPX = (parseInt(arrayPuente[0].left)+10)+"px";
                              }else {
                                  leftPX = (parseInt(arrayPuente[1].left)+10)+"px";
                                  //leftPX = "45px";
                              }
                          }else {
                              if (arrayPuente[0].diente < arrayPuente[1].diente) {
                                  leftPX = "-45px";
                              }else {
                                  leftPX = "45px";
                              }
                          }
                      }
                      console.log(leftPX)
                      /*$(this).parent().append('<div style="z-index: 9999; height: 5px; width:' + width + 'px;" id="puente" class="click-red"></div>');
                      $(this).parent().children().last().css({
                          "position": "absolute",
                          "top": "80px",
                          "left": "50px"
                      });*/
                      $('#'+cuadro).parent().append('<div style="z-index: 9999; height: 5px; width:' + width + 'px;" id="puente" class="click-red"></div>');
                      $('#'+cuadro).parent().children().last().css({
                          "position": "absolute",
                          "top": "80px",
                          "left": leftPX
                      });
                  }

                  break;
              default:
                  console.log("borrar case");
          }
        }
    });
    </script>


    <script>
        $(document).ready(function() {
        //Initialize Select2 Elements
        $('.select2').select2({
          dropdownParent: $("#capa_formularios")
        });
      });

  </script>

  </div>
  </div>
