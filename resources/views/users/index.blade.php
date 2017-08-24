<section>
	<div class="section-header">
			<ol class="breadcrumb">
				<li><a href="{{ url('home') }}">Home</a></li>
				<li class="active">Usuarios</li>
			</ol>
	</div><!--end .section-header -->
	
	<div class="section-body">
		<div class="card">
			<!-- BEGIN SEARCH HEADER -->
			<div class="card-head style-primary">
				<div class="tools pull-left">
					<form class="navbar-search" role="search">
						<div class="form-group">
							<input type="text" class="form-control" name="contactSearch" placeholder="Enter your keyword">
						</div>
						<button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
					</form>
				</div>
				<div class="tools">
					<a class="btn btn-floating-action btn-default-light" data-toggle="modal" data-target="#addModal" href=""><i class="fa fa-plus"></i></a>
				</div>
			</div><!--end .card-head -->
			<!-- END SEARCH HEADER -->

			<!-- BEGIN SEARCH RESULTS -->
			<div class="card-body">
				<div class="row">

					@if(isset($usuarios))
					<table class="table table-hover" id="usersTable">
						<thead>
							<tr>
								<th>Avatar</th>
								<th>Nombre</th>
								<th>Correo</th>
								<th>Perfil</th>
								<th class="text-right">Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach($usuarios as $usuario)
							<tr id="user-{{ $usuario->id }}">
								<td><img class="img-circle width-1" src="/uploads/avatars/{{ $usuario->avatar }}" alt="" /></td>
								<td>{{ $usuario->name }}</td>
								<td>{{ $usuario->email }}</td>
								<td>{{ getUserPermisos($usuario->role) }}</td>
								<td class="text-right">
									<a href="" class="editUserModal" data-id="{{ $usuario->id }}">
										<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Editar usuario"><i class="fa fa-pencil"></i></button>
									</a>
									<a href="" class="deleteUserModal" data-id="{{ $usuario->id }}">
										<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar usuario"><i class="fa fa-trash-o"></i></button>
									</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@endif

				</div><!--end .row -->

			</div><!--end .card-body -->
			<!-- END SEARCH RESULTS -->
		</div><!--end .card -->
	</div><!--end .section-body -->

	<!-- BEGIN CONFIRM DELETE MODAL -->
		<div class="modal fade" id="simpleModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="simpleModalLabel">Eliminar usuario</h4>
					</div>
					<div class="modal-body">
						<p>¿Estás seguro que deseas eliminar este usuario?</p>
					</div>
					<div class="modal-footer">
					<input type="hidden" id="hiddenId"/>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-primary deleteUser">Si, seguro</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<!-- END CONFIRM DELETE MODAL -->

	<!-- BEGIN ADD MODAL -->
		<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
			<div class="modal-dialog">	
				<!-- BEGIN VERTICAL FORM -->
				<div class="row">
					<div class="col-lg-offset-1 col-md-10">

						<form class="form" id="createForm">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="card">
								<div class="card-head style-primary">
									<header>Crea una cuenta</header>
								</div>
								<div class="card-body floating-label">
									<br/>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<input type="text" class="form-control" id="nameAdd" name="name">
												<label for="name">Nombre</label>
												<p class="help-block"></p>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<select id="roleAdd" name="role" class="form-control">
													<option value="">&nbsp;</option>
													<option value="1">Administrador</option>
													<option value="2">Propietario</option>
													<option value="3">Personal</option>
												</select>
												<label for="role">Permiso</label>
												<p class="help-block"></p>
											</div>
										</div>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="emailAdd" name="email">
										<label for="email">Correo electrónico</label>
										<p class="help-block"></p>
									</div>
									<div class="form-group">
										<input type="password" class="form-control" id="passwordAdd" name="password">
										<label for="password">Contraseña</label>
										<p class="help-block"></p>
									</div>
									<div class="form-group">
										<input type="password" class="form-control" id="addconfirm-password" name="confirm-password">
										<label for="confirm-password">Repite contraseña</label>
										<p class="help-block"></p>
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
										<button type="button" class="btn btn-default" data-dismiss="modal" onclick="">Cancelar</button>
										<button type="button" class="btn btn-flat btn-primary ink-reaction" id="btn-add">Crear usuario</button>
									</div>
								</div>
							</div><!--end .card -->
						</form>	
					</div><!--end .col -->
				</div><!--end .row -->
				<!-- END VERTICAL FORM -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<!-- END ADD MODAL -->

	<!-- BEGIN EDIT MODAL -->
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
			<div class="modal-dialog">	
				<!-- BEGIN VERTICAL FORM -->
				<div class="row">
					<div class="col-lg-offset-1 col-md-10">

						<form class="form" id="editForm">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="card">
								<div class="card-head style-primary">
									<header>Editar usuario</header>
								</div>
								<div class="card-body floating-label">
									<br/>
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<input type="text" class="form-control" id="nameEdit" name="name">
												<label for="name">Nombre</label>
												<p class="help-block"></p>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<select id="roleEdit" name="role" class="form-control">
													<option value="">&nbsp;</option>
													<option value="1">Administrador</option>
													<option value="2">Propietario</option>
													<option value="3">Personal</option>
												</select>
												<label for="role">Permiso</label>
												<p class="help-block"></p>
											</div>
										</div>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="emailEdit" name="email">
										<label for="email">Correo electrónico</label>
										<p class="help-block"></p>
									</div>
									<div class="form-group">
										<input type="password" class="form-control" id="password" name="password">
										<label for="password">Contraseña</label>
										<p class="help-block"></p>
									</div>
									<div class="form-group">
										<input type="password" class="form-control" id="editconfirm-password" name="confirm-password">
										<label for="confirm-password">Repite contraseña</label>
										<p class="help-block"></p>
									</div>
								</div><!--end .card-body -->
								<div class="card-actionbar">
									<div class="card-actionbar-row">
										<button type="button" class="btn btn-default" data-dismiss="modal" onclick="">Cancelar</button>
										<button type="button" class="btn btn-flat btn-primary ink-reaction" id="btn-edit">Editar usuario</button>
									</div>
								</div>
							</div><!--end .card -->
						</form>	
					</div><!--end .col -->
				</div><!--end .row -->
				<!-- END VERTICAL FORM -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<!-- END EDIT MODAL -->

	<meta name="_token" content="{!! csrf_token() !!}" />

</section>

<script type="text/javascript">
	
	function getUserPermisos(role){
		switch(role){
			case '1':
				return "Administrador"
				break;
			case '2':
				return "Propietario"
				break;
			case '3':
				return "Personal"
				break;
		}
	}

	$(document).ready(function(){

		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

		var url = '{{ url('/usuarios') }}'
		var user_id

		// Agregar usuario
		$("#btn-add").click(function(e){

	        e.preventDefault();
	        
	        var formData =  getFormData($("#createForm"))

		   	$.ajax({

	            type: "POST",
	            url: url,
	            data: formData,
	            dataType: 'json',
	            success: function (data) {

	                var usuario = '<tr id="user-'+data.id+'"><td><img class="img-circle width-1" src="/uploads/avatars/'+data.avatar+'" alt="" /></td>'
	                usuario += '<td>'+data.name+'</td><td>'+data.email+'</td><td>'+getUserPermisos(data.role)+'</td>'
	                usuario += '<td class="text-right">	<a class="editUserModal" data-id="'+data.id+'">'
					usuario += '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Editar usuario"><i class="fa fa-pencil"></i></button></a>'
					usuario += '<a href="" class="deleteUserModal" data-id="'+data.id+'">'
					usuario += '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar usuario"><i class="fa fa-trash-o"></i></button></a></td></tr>'

					$("#usersTable").append(usuario)
	                $('#createForm').trigger("reset");
	                $('#addModal').modal('hide')
	                swal("Listo!", "Usuario agregado", "success")
	            },
	            error: function (data) {
	                var errors = data.responseJSON;
	               
	                if(errors.name) 
	                	$("#nameAdd").parent().addClass('has-error')
	                	$("#nameAdd").siblings(".help-block").text(errors.name)

	                if(errors.role)
	                	$("#roleAdd").parent().addClass('has-error')
	                	$("#roleAdd").siblings(".help-block").text(errors.role)

	                if(errors.email)
	                	$("#emailAdd").parent().addClass('has-error')
	                	$("#emailAdd").siblings(".help-block").text(errors.email)

	                if(errors.password)
	                	$("#passwordAdd").parent().addClass('has-error')
	                	$("#passwordAdd").siblings(".help-block").text(errors.password)

	               	if(errors.confirm-password)
	                	$("#addconfirm-password").parent().addClass('has-error')
	                	$("#addconfirm-password").siblings(".help-block").text(errors.confirm-password)
	            }
	        });
		})
	
		//Borrar usuario
		$(".deleteUserModal").click(function(e){

			e.preventDefault()
			$("#simpleModal").modal('show')
			user_id = $(this).attr('data-id')
		})

		$(".deleteUser").click(function(){

			$.ajax({
	            type: "DELETE",
	            url: url + '/' + user_id,
	            success: function (data) {
	                $('#simpleModal').modal('hide')
	                $("#user-" + user_id).remove();
	            },
	            error: function (data) {
	                console.log('Error:', data);
	                swal("Error!", "Error al eliminar este usuario", "error")
	            }
	        });
		})

		//Editar usuario
		$(".editUserModal").click(function(e){
			e.preventDefault()

			user_id = $(this).attr('data-id')

			$.ajax({

	            type: "GET",
	            url: url+'/'+user_id+'/edit',
	            success: function (data) {
	            	$("#editForm input, #editForm select").each(function(){
	            		$(this).siblings(".help-block").text("")
	            		$(this).parent().removeClass('has-error')
	            	})

	                $("#editModal").modal("show")

	                $("#nameEdit").val(data.name)
	                $("#emailEdit").val(data.email)
	                $("#roleEdit").val(data.role)
	            },
	            error: function (data) {
	                console.log('Error:', data);
	            }
	        });
		})

		$("#btn-edit").click(function(e){
			e.preventDefault();
			var formData =  getFormData($("#editForm"))

			$.ajax({

	            type: "PUT",
	            data: formData,
	            dataType: 'json',
	            url: url+'/'+user_id,
	            success: function (data) {

	                var usuario = '<tr id="user-'+data.id+'"><td><img class="img-circle width-1" src="/uploads/avatars/'+data.avatar+'" alt="" /></td>'
	                usuario += '<td>'+data.name+'</td><td>'+data.email+'</td><td>'+getUserPermisos(data.role)+'</td>'
	                usuario += '<td class="text-right">	<a class="editUserModal" data-id="'+data.id+'">'
					usuario += '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Editar usuario"><i class="fa fa-pencil"></i></button></a>'
					usuario += '<a href="" class="deleteUserModal" data-id="'+data.id+'">'
					usuario += '<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar usuario"><i class="fa fa-trash-o"></i></button></a></td></tr>'

	                $("#user-"+user_id).replaceWith(usuario)
	                $('#editForm').trigger("reset");
	                $('#editModal').modal('hide')
	            },
	            error: function (data) {
	                var errors = data.responseJSON;

	                if(errors.name) 
	                	$("#nameEdit").parent().addClass('has-error')
	                	$("#nameEdit").siblings(".help-block").text(errors.name)

	                if(errors.role)
	                	$("#roleEdit").parent().addClass('has-error')
	                	$("#roleEdit").siblings(".help-block").text(errors.role)

	                if(errors.email)
	                	$("#emailEdit").parent().addClass('has-error')
	                	$("#emailEdit").siblings(".help-block").text(errors.email)

	               	if(errors.confirm-password)
	                	$("#editconfirm-password").parent().addClass('has-error')
	                	$("#editconfirm-password").siblings(".help-block").text(errors.confirm-password)
	            }
	        });
		})
	})

</script>
