@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style=" padding-top: 10%;">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="background-color: #ffffff40; color: #060392;">
                <div class="panel-heading" style="background-color: #ffffff40; color: #060392;font-weight: 600;">Iniciar Sesión</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('login') ?  'has-error' : '' }}">
                           <label for="login" class="col-md-4 control-label">Usuario</label>

                          <div class="col-md-6">
                           <input id="login" type="login" class="form-control" name="login" value="{{ old('login') }}" required autofocus placeholder="Ingrese su Nombre de Usuario">

                          @if ($errors->has('login'))
                           <span class="help-block">
                           <strong>{{ $errors->first('login') }}</strong>
                           </span>
                           @endif
                           </div>
                           </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Iniciar
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
