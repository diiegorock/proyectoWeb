<section>
	<div class="section-header">
			<ol class="breadcrumb">
				<li><a href="{{ url('home') }}">Home</a></li>
				<li><a href="{{ url('/usuarios') }}">Usuarios</a></li>
				<li class="active">Editar Usuario</li>
			</ol>
	</div><!--end .section-header -->
	
	<div class="section-body">
		<div class="card">

			<!-- BEGIN CONTACT DETAILS HEADER -->
			<div class="card-head style-primary">
				<div class="tools">
					<a class="btn btn-flat hidden-xs" href="{{ url('/usuarios') }} "><span class="glyphicon glyphicon-arrow-left"></span> &nbsp;Volver a lista de Usuarios</a>
				</div><!--end .tools -->
			</div><!--end .card-head -->
			<!-- END CONTACT DETAILS HEADER -->

			<!-- BEGIN CONTACT DETAILS -->
			<div class="card-tiles">
				<div class="hbox-md col-md-12">
					<div class="hbox-column col-md-12">
						<div class="row">
							<!-- BEGIN CONTACTS MAIN CONTENT -->
							<div class="col-sm-7 col-md-8 col-lg-9">
								<h1 class="text-primary">Editar Usuario</h1>

								@if(session('message'))
								<div class="alert alert-success" role="alert">
									<strong>¡Bien hecho! </strong>{{ session('message') }} 
								</div>
								@endif
								@if(session('errorMessage'))
								<div class="alert alert-danger" role="alert">
									<strong>¡Oh no! </strong>{{ session('errorMessage') }} 
								</div>
								@endif
								<form class="form" method="POST" action="{{ action('UsuariosController@update',$usuario->id) }}">
									<div class="card-body">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
											<input type="text" class="form-control" id="name" name="name" value="{{ $usuario->name }}">
											<label for="name">Nombre</label>
											<p class="help-block">{{ $errors->first('name') }}</p>
										</div>
										<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
											<input type="text" class="form-control" id="email" name="email" value="{{ $usuario->email }}">
											<label for="email">Email</label>
											<p class="help-block">{{ $errors->first('email') }}</p>
										</div>
										<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
											<select id="role" name="role" class="form-control">
												<option value="">&nbsp;</option>
												<option value="1" {{ $usuario->role == '1' ? 'selected' : '' }}>Administrador</option>
												<option value="2" {{ $usuario->role == '2' ? 'selected' : '' }}{{ $usuario->role == '1' ? 'required' : '' }}>Propietario</option>
												<option value="3" {{ $usuario->role == '3' ? 'selected' : '' }}>Personal</option>
											</select>
											<label for="role">Permiso</label>
											<p class="help-block">{{ $errors->first('role') }}</p>
										</div>
										<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
											<input type="password" class="form-control" id="password" name="password">
											<label for="password">Password</label>
											<p class="help-block">{{ $errors->first('password') }}</p>
										</div>
										<div class="form-group{{ $errors->has('confirm-password') ? ' has-error' : '' }}">
											<input type="password" class="form-control" id="confirm-password" name="confirm-password">
											<label for="confirm-password">Confirma contraseña</label>
											<p class="help-block">{{ $errors->first('confirm-password') }}</p>
										</div>
									</div><!--end .card-body -->
									<div class="card-actionbar">
										<div class="card-actionbar-row">
											<button type="submit" class="btn btn-raised btn-primary ink-reaction">Confirmar cambios</button>
										</div>
									</div>
								</form>
							</div><!--end .col -->
							<!-- END CONTACTS MAIN CONTENT -->

						</div><!--end .row -->
					</div><!--end .hbox-column -->

				</div><!--end .hbox-md -->
			</div><!--end .card-tiles -->
			<!-- END CONTACT DETAILS -->

		</div><!--end .card -->
	</div><!--end .section-body -->

</section>