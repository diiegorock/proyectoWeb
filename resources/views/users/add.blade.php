<section>
	<div class="section-header">
		<ol class="breadcrumb">
			<li><a href="{{ url('home') }}">Home</a></li>
			<li><a href="{{ url('usuarios') }}">Usuarios</a></li>
			<li class="active">Agregar Usuario</li>
		</ol>
	</div><!--end .section-header -->
	
	<div class="section-body contain-lg">

		<!-- BEGIN VERTICAL FORM -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="text-primary">Agregar usuarios</h1>
			</div><!--end .col -->
			<div class="col-lg-3 col-md-4">
				<article class="margin-bottom-xxl">
					<p class="lead">
						Puedes agregar usuarios al sistema de administración de edifcios. 
					</p>
					<p>
						Recuerda asignar los permisos que poseerá el usuario que estas creando. Puede ser Administrador, Propietario o Personal del edificio.
					</p>
				</article>
			</div><!--end .col -->
			<div class="col-lg-offset-1 col-md-8">

				@if(session('status'))
				<div class="alert alert-success" role="alert">
					<strong>¡Bien hecho! </strong>{{ session('status') }} 
				</div>
				@endif

				<form class="form" method="POST" action="{{ url('/usuarios/add') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="card">
						<div class="card-head style-primary">
							<header>Crea una cuenta</header>
						</div>
						<div class="card-body floating-label">
							<br/>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
										<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
										<label for="name">Nombre</label>
										<p class="help-block">{{ $errors->first('name') }}</p>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
										<select id="role" name="role" class="form-control">
											<option value="">&nbsp;</option>
											<option value="1">Administrador</option>
											<option value="2">Propietario</option>
											<option value="3">Personal</option>
										</select>
										<label for="role">Permiso</label>
										<p class="help-block">{{ $errors->first('role') }}</p>
									</div>
								</div>
							</div>
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
								<label for="email">Correo electrónico</label>
								<p class="help-block">{{ $errors->first('email') }}</p>
							</div>
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<input type="password" class="form-control" id="password" name="password">
								<label for="password">Contraseña</label>
								<p class="help-block">{{ $errors->first('password') }}</p>
							</div>
							<div class="form-group{{ $errors->has('confirm-password') ? ' has-error' : '' }}">
								<input type="password" class="form-control" id="confirm-password" name="confirm-password">
								<label for="confirm-password">Repite contraseña</label>
								<p class="help-block">{{ $errors->first('confirm-password') }}</p>
							</div>
							<div class="checkbox checkbox-styled">
								<label>
									<input type="checkbox" value="verify" id="verify" name="verify">
									<span>Enviar correo al usuario para verificar cuenta</span>
								</label>
							</div>
						</div><!--end .card-body -->
						<div class="card-actionbar">
							<div class="card-actionbar-row">
								<button type="submit" class="btn btn-flat btn-primary ink-reaction">Crear usuario</button>
							</div>
						</div>
					</div><!--end .card -->
				</form>	
			</div><!--end .col -->
		</div><!--end .row -->
		<!-- END VERTICAL FORM -->

	</div>
</section>