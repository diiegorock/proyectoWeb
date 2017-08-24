@extends('layouts.not-signed')

@section('content')

    <div class="col-sm-6">
        <br/>
        <span class="text-lg text-bold text-primary">Login</span>
        <br/><br/>
        <form class="form floating-label" role="form" method="POST" action="{{ url('/login') }}" accept-charset="utf-8" method="post">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                <label for="email">Correo</label>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" required>
                <label for="password">Password</label>
                <p class="help-block"><a href="{{ url('/password/reset') }}">¿La olvidaste?</a></p>
            </div>
            <br/>
            <div class="row">
                <div class="col-xs-6 text-left">
                    <div class="checkbox checkbox-inline checkbox-styled">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> <span>Recuerdame</span>
                        </label>
                    </div>
                </div><!--end .col -->
                <div class="col-xs-6 text-right">
                    <button class="btn btn-primary btn-raised" type="submit">Entrar</button>
                </div><!--end .col -->
            </div><!--end .row -->
        </form>
    </div><!--end .col -->
    <div class="col-sm-5 col-sm-offset-1 text-center">
        <br><br>
        <h3 class="text-light">
            ¿No tienes cuenta?
        </h3>
        <a class="btn btn-block btn-raised btn-primary" href="{{ url('/register') }}">Regístrate aquí</a> 
        <br><br>
    </div><!--end .col -->
                    
@endsection