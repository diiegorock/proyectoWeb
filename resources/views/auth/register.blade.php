@extends('layouts.not-signed')

@section('content')

    <div class="col-sm-6">
        <br/>
        <span class="text-lg text-bold text-primary">Login</span>
        <br/><br/>
        <form class="form floating-label" role="form" method="POST" action="{{ url('/register') }}" accept-charset="utf-8" method="post">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" class="form-control" id="name" name="name" required>
                <label for="name">Nombre completo</label>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                <label for="email">Correo</label>
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" id="password" name="password" required>
                <label for="password">Password</label>
                @if($errors->has('password'))
                    <p class="help-block">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                <label for="password-confirm">Password</label>
            </div>
            <br/>
            <div class="row">
                <div class="col-xs-6 text-left">
                    <button class="btn btn-primary btn-raised" type="submit">Registrarme</button>
                </div><!--end .col -->
            </div><!--end .row -->
        </form>
    </div><!--end .col -->
    <div class="col-sm-5 col-sm-offset-1 text-center">
        <br><br>
        <h3 class="text-light">
            ¿Ya tienes cuenta?
        </h3>
        <a class="btn btn-block btn-raised btn-primary" href="{{ url('/login') }}">Ingresa ahora</a> 
        <br><br>
    </div><!--end .col -->
    
@endsection
