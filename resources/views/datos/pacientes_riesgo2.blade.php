@extends('layouts.admin1')


@section('content')
<link type='text/css' rel="stylesheet" href="/d3/dc.css">

<style type="text/css">

   .dataTables_length label {
       margin-right: 1rem;
       padding-top: 1rem;
   }
   .dataTables_filter{
       margin-top: .55rem;
   }
   .dataTables_filter input{
       font-weight: 300;
   }
   .dataTables_wrapper .row {
       margin-bottom: 1.5rem;
   }
   div.dataTables_wrapper div.dataTables_info {
       padding-top: 0;
       padding-bottom: 1rem;
   }
   .dataTables_paginate {
       float: right;
   }
   .dataTables_filter {
       float: right;
   }
   .row{
     width: 100%;
   }






</style>

<section class="content">
<div class="col-md-12">
  <div class="col-md-10 col-md-offset-1">




      <div class="box">
        <div class="box box-info">
          <h3 class="box-title">Pacientes de riego</h3>
        </div>

        <div class="box-body">
        <div class="col-md-12">
          <div class="form-group">
            <h4>Diagnosticos / Síntomas / Practicas</h4>
            <select class="form-control select2" multiple="multiple" data-placeholder="Seleccione diagnosticos"
                    style="width: 100%;" required="true" id="diags" name="diagnostico[]">
              @foreach($diagnosticos as $diagnostico)
                <option value="{{$diagnostico->DI_CODIGO}}">{{$diagnostico->DI_CODIGO}} - {{$diagnostico->Diagnostico}}</option>
              @endforeach
            </select>
          </div>

        </div>
        <div class="col-md-6">

          <div class="form-group">
            <label>Fecha Desde:</label>

            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" name="fechahasta" id="datepicker1" required="true">
            </div>
            <!-- /.input group -->
          </div>

        </div>
        <div class="col-md-6">

          <div class="form-group">
            <label>Fecha Hasta:</label>

            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right" name="fechadesde" id="datepicker2" required="true">
            </div>
            <!-- /.input group -->
          </div>

        </div>
        <button type="button"  id="button-buscar" class="btn pull-right btn-primary">Buscar</button>
        <!-- /.box-header -->
        <div class="col-md-12">
          <div class="box-body">
            <table id="historia-clinica-unidades-sanitarias" class="table table-bordered table-striped">
              <thead>
              <tr>

                <th><strong>Nombre</strong></th>
                <th><strong>Apellido</strong></th>
                <th><strong>Edad</strong></th>
                <th><strong>Diagnosticos</strong></th>
                <th><strong>Dependencias</strong></th>
                <th><strong>Dirección</strong></th>
                <th><strong>Teléfono</strong></th>
                <th>Datos</th>

              </tr>
              </thead>

            </table>
          </div>
        </div>
      </div>

        <!-- /.box-body -->
      </div>
      <input type="hidden" name="" id="inputhistoriaclinica" value="">
      <div id="capa_formularios" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="static" style="top:0 !important">

    </div>
    <div id="capa_formularios_eliminar" class="modal modal-danger" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" data-backdrop="static" style="top:0 !important">

  </div>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

    <script src="http://d3js.org/d3.v3.js"></script>


<script type="text/javascript" src="/d3/crossfilter.js"></script>
<script type="text/javascript" src="/d3/dc.js"></script>








      <script>

      $('#datepicker1').datepicker({
          todayBtn: "linked",
          language: "es",
          autoclose: true,
          todayHighlight: true,
          format: 'dd/mm/yyyy'
      });
      $('#datepicker2').datepicker({
          todayBtn: "linked",
          language: "es",
          autoclose: true,
          todayHighlight: true,
          format: 'dd/mm/yyyy'
      });

      var table = $('#historia-clinica-unidades-sanitarias').DataTable({});
      $('.select2').select2({
        dropdownParent: $("#capa_formularios")
      });
        $(function () {
          $(document).on('click', '#button-buscar', function () {
            var diags = $('#diags').val();
            var desde = $('#datepicker1').val();
            var hasta = $('#datepicker2').val();
            console.log(diags);
            $.ajax({
            url: 'info2',
            data: {
                  diagnostico: diags,
                  fechadesde: desde,
                  fechahasta: hasta,

              }

           }).done( function(resul)
            {


              var data = resul;





              var table = $('#historia-clinica-unidades-sanitarias').DataTable({

                          data : data,

                          columns: [

                                    {"data" : 'nombre',
                                    render : function(data, type, row) {
                                        var data = data;
                                        return '<span class="">'+data+'</span>'
                                    }
                                    },
                                    {"data" : 'apellido',
                                    render : function(data, type, row) {
                                        var data = data;
                                        return '<span class="">'+data+'</span>'
                                    }
                                  },
                                  {"data" : 'PA_FECNAC',
                                    render : function(data, type, row) {
                                      var hoy = new Date();
                                      var cumpleanos = new Date(data);
                                      var edad = hoy.getFullYear() - cumpleanos.getFullYear();
                                      var m = hoy.getMonth() - cumpleanos.getMonth();

                                      if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                                          edad--;
                                      }

                                      return edad;
                                        return '<span class="">'+data+'</span>'
                                    }
                                  },
                                  {"data" : 'diagnosticos',
                                    render : function(data, type, row) {
                                      var diagnostico_append = '<ul style=" padding: 0;">';
                                      $.each(data, function( index, value ) {
                                        diagnostico_append += '<li>'+value.Diagnostico+'</li>';
                                      });
                                      diagnostico_append += '</ul>';
                                        return diagnostico_append;
                                    }
                                  },
                                  {"data" : 'dependencias',
                                    render : function(data, type, row) {
                                      var diagnostico_append = '<ul style=" padding: 0;">';
                                      $.each(data, function( index, value ) {
                                        diagnostico_append += '<li>'+value.NOMBRE+'</li>';
                                      });
                                      diagnostico_append += '</ul>';
                                        return diagnostico_append;
                                    }
                                  },
                                {"data" : 'Nombre',

                                render : function(data, type, row) {
                                    var data = data;
                                    return '<span class="">'+row.Calle_Nombre+' '+row.PA_CALLE_NUMERO+'</span>'
                                }
                              },
                              {"data" : 'PA_TELEF',

                              render : function(data, type, row) {
                                  var data = data;
                                  return '<span class="">'+data+'</span>'
                              }
                            },
                                {
                                    "className":      'details-control',
                                    "orderable":      false,
                                    "searchable":     false,
                                    "data":           null,
                                    "defaultContent": '<button class="btn btn-editar" style="margin-right: 10px;font-size: 25px;padding: 0;color: green;background-color: #f0f8ff00;"><i class="fa fa-info"></i></button>'
                                },

                                    ],
                         'paging'      : true,
                          'lengthChange': true,
                          'searching'   : true,
                          'ordering'    : true,
                          'info'        : true,
                          'autoWidth'   : false,
                          dom: 'Blfrtip',
                          buttons: [
                            'excel', 'pdf'
                          ],

                          'destroy': true,
                           'language': {

                                "sProcessing":     "Procesando...",
                                "sLengthMenu":     "Mostrar _MENU_ registros",
                                "sZeroRecords":    "No se encontraron resultados",
                                "sEmptyTable":     "Ningún dato disponible ",
                                "sInfo":           "Mostrando registros  _START_ de _END_  total de _TOTAL_ registros",
                                "sInfoEmpty":      "Mostrando registros 0 de 0 total de 0 registros",
                                "sInfoFiltered":   "(filtrado total de _MAX_ registros)",
                                "sInfoPostFix":    "",
                                "sSearch":         "Buscar:",
                                "sUrl":            "",
                                "sInfoThousands":  ",",
                                "sLoadingRecords": "Cargando...",
                                "oPaginate": {
                                    "sFirst":    "Primero",
                                    "sLast":     "Último",
                                    "sNext":     "Siguinte",
                                    "sPrevious": "Anterior"
                                },
                                "oAria": {
                                    "sSortAscending":  ": Activar para ordenar a columna de maneira ascendente",
                                    "sSortDescending": ": Activar para ordenar a columna de maneira descendente"
                                }

                        },

                      });



                      $('#historia-clinica-unidades-sanitarias').on('click', 'td.details-control', function () {
                        var tr = $(this).closest('tr');
                        var row = table.row( tr );


                        if ( row.child.isShown() ) {
                            // This row is already open - close it
                            row.child.hide();
                            tr.removeClass('shown');
                        }
                        else {
                            console.log(row.data());
                            row.child( format(row.data()) ).show();
                            tr.addClass('shown');
                        }
                    } );

                    function format (d) {

                      $.ajax({
                      url: 'buscar_familiares',
                      data: {
                            d: d,

                        }

                     }).done( function(resul)
                      {
                        $("#capa_formularios").html('');
                        $("#capa_formularios").modal("show");
                        $("#capa_formularios").html(resul);
                        var familiares_append = '<table cellpadding="5" cellspacing="0" border="0" class="table table-hover table-striped">'+
                                                        '<th><strong>Nombre</strong></th>'+
                                                        '<th><strong>Apellido</strong></th>'+
                                                        '<th><strong>Dirección</strong></th>'+
                                                        '<th><strong>Teléfono</strong></th>';
                        $.each(resul, function( index, value ) {
                          familiares_append += '<tr>'+
                                                    '<td>'+value.PA_NOMBRE+'</td>'+
                                                    '<td>'+value.PA_APELLIDO+'</td>'+
                                                    '<td>'+value.PA_APELLIDO+'</td>'+
                                                    '<td>'+value.PA_APELLIDO+'</td>'+
                                                '</tr>';
                        });
                        familiares_append += '</table>';
                          return familiares_append;

                        return '<table cellpadding="5" cellspacing="0" border="0" class="table table-hover table-striped">'+
                                  '<tr>'+
                                      '<td><strong>Domicilio</strong></td>'+
                                      '<td>'+d.Calle_Nombre+'</td>'+
                                  '</tr>'+
                                  '<tr>'+
                                      '<td><strong>Telefono</strong></td>'+
                                      '<td>'+d.PA_TELEF+'</td>'+
                                  '</tr>'+
                                  '<tr>'+
                                      '<td><strong>Familiares</strong></td>'+
                                      '<td><button class="btn btn-editar" style="margin-right: 10px;font-size: 25px;padding: 0;color: green;background-color: #f0f8ff00;" data-idturno_c="">Buscar</button></td>'+
                                  '</tr>'+

                              '</table>';


                      }).fail( function()
                     {
                      $("#capa_formularios").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
                     }) ;



                 }
             //$("#capa_formularios").html(resul);
             // $('#capa_formularios').modal({backdrop: 'static', keyboard: false});

            }).fail( function()
           {
            $("#capa_formularios").html('<span>...Ha ocurrido un error, revise su conexión y vuelva a intentarlo...</span>');
           }) ;


          });









        })
      </script>

      <script>

      </script>




  </div>


</div>
</section>


    <script type="text/javascript">
    $( document ).ready(function() {
        $('.select2').select2()
    });

    </script>



@endsection
