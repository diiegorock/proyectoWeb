@extends('layouts.not-signed')

@section('content')

    <div class="col-sm-6">
        <br/>
        <span class="text-lg text-bold text-primary">Reestablecer contraseña</span>
        <br/><br/>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
        @endif

        <form class="form floating-label" role="form" method="POST" action="{{ url('/password/reset') }}" accept-charset="utf-8" method="post">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" id="email" name="email" value="{{ $email or old('email') }}" required>
                <label for="email">Correo</label>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" id="password" name="password" required>
                <label for="password">Nueva contraseña</label>
                @if($errors->has('password'))
                    <p class="help-block">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                <label for="password-confirm">Confirmar contraseña</label>
            </div>
            <br/>
            <div class="row">
                <div class="col-xs-6 text-left">
                    <button class="btn btn-primary btn-raised" type="submit">Cambiar mi contraseña</button>
                </div><!--end .col -->
            </div><!--end .row -->
        </form>
    </div><!--end .col -->

    <div class="col-sm-5 col-sm-offset-1 text-center">
        <br><br>
        <h3 class="text-light">
            Volver al inicio
        </h3>
        <a class="btn btn-block btn-raised btn-primary" href="{{ url('/register') }}">Llévame</a> 
        <br><br>
    </div><!--end .col -->

@endsection
