@extends('layouts.admin1')


@section('content')

<section class="content">

  <div class="col-md-6 col-md-offset-3">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Cambiar contraseña</h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form class="form-horizontal" method="post" action="{{action('UsuariosController@guardar_nueva_contraseña')}}">

        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
        <div class="box-body">
          <div class="form-group">
            <label for="InputNumDoc" class="col-sm-2 control-label">Nueva contraseña</label>

            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" id="InputNumDoc" placeholder="">
            </div>
          </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">

          <button type="submit" class="btn btn-info pull-right">Guardar</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>

  </div>

</section>


@endsection
