<section>
	<div class="section-header">
			<ol class="breadcrumb">
				<li><a href="{{ url('home') }}">Home</a></li>
				<li><a href="{{ url('/comunidades') }}">Comunidades</a></li>
				<li class="active">{{ $comunidad->nombre }}</li>
			</ol>
	</div><!--end .section-header -->
	
	<div class="section-body">
		<div class="row">
			
			<div class="col-lg-3 col-lg-offset-2">
				<h1 class="text-primary">{{ $comunidad->nombre }}</h1>
				<article class="margin-bottom-xxl">
					<p class="lead">
						Este es el detalle de la comunidad. 
					</p>
					<p>
						Aquí encontrarás información relevante de la comunidad y los edificios que la conforman.
					</p>
				</article>
			</div><!--end .col -->

			<!-- BEGIN INFO COMUNIDAD -->
			<div class="col-lg-offset-1 col-lg-5 col-md-4">
				<div class="card card-underline style-primary-dark">
					<div class="card-head">
						<header class="opacity-75"><small>Info Comunidad</small></header>
						<div class="tools">
							<a class="btn btn-icon-toggle ink-reaction" id="editComunidad" data-id="{{ $comunidad->id }}"><i class="md md-edit"></i></a>
						</div><!--end .tools -->
					</div><!--end .card-head -->
					<div class="card-body no-padding" id="cardInfoComunidad">
						<ul class="list">
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-account-box"></i>
									</div>
									<div class="tile-text" id="nombreCard">
										{{ $comunidad->nombre }}
										<small>Nombre</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-location-on"></i>
									</div>
									<div class="tile-text">
										{{ $comunidad->descripcion }}
										<small>Dirección</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-account-balance"></i>
									</div>
									<div class="tile-text">
										{{ $comunidad->razonsocial }}
										<small>Razon social</small>
									</div>
								</a>
							</li>
						</ul>
					</div><!--end .card-body -->
				</div><!--end .card -->
			</div><!--end .col -->
			<!-- END INFO COMUNIDAD -->
		</div>

		@if(isset($comunidad->edificios))
		<br>
		<h2 class="text-normal text-center">Edificios<br/><small class="text-primary">{{ count($comunidad->edificios)==0 ? 'No existen edificios en esta comunidad. Agrega algunos!' : 'Estos son los edificios pertenecientes a esta comunidad' }}</small></h2>
		<div class="text-center"><a class="btn btn-floating-action btn-primary-dark" data-toggle="modal" data-target="#addModal" href=""><i class="fa fa-plus"></i></a></div>
		<br> 

		<div class="row" id="edificiosContainer">
			@foreach($comunidad->edificios as $edificio)
			<div class="col-md-6" id="edificio-{{ $edificio->id }}">
				<div class="card style-default-primary">
					<div class="card-head">
						<header id="nombre-edificio"><i class="fa fa-building-o"></i>    <span>{{ $edificio->nombre }}</span></header>
						<div class="tools">
							<div class="btn-group">
								<a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
								<a class="btn btn-icon-toggle" href="/edificios/{{ $edificio->id }}"><i class="fa fa-eye"></i>
								</a>
								<a class="btn btn-icon-toggle editEdificioModal" data-id="{{ $edificio->id }}"><i class="md md-mode-edit"></i></a>
								<a class="btn btn-icon-toggle deleteEdificioModal" data-id="{{ $edificio->id }}"><i class="md md-close"></i></a>
							</div>

						</div>
					</div><!--end .card-head -->
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<h1 class="text-xxxl text-center">{{ count($edificio->departamentos) }}</h1>
								<p class="text-center"><i class="glyphicon glyphicon-home text-center" style="margin-right: 7px"></i><em>Departamento(s)</em></p>
							</div>
							<div class="col-md-4">
								<h1 class="text-xxxl text-center">{{ count($edificio->bodegas) }}</h1>
								<p class="text-center"><i class="fa fa-cubes text-center" style="margin-right: 7px"></i><em>Bodega(s)</em></p>
							</div>
							<div class="col-md-4">
								<h1 class="text-xxxl text-center">{{ count($edificio->estacionamientos) }}</h1>
								<p class="text-center"><i class="fa fa-car text-center" style="margin-right: 7px"></i><em>Estacionamiento(s)</em></p>
							</div>
						</div>
						<hr class="ruler-xl">
						<p id="descripcion-edificio">{{ $edificio->descripcion }}</p>
					</div><!--end .card-body -->
				</div><!--end .card -->
			</div><!--end .col -->
			@endforeach	
		</div>
		@endif
	</div><!--end .section-body -->

	<!-- BEGIN CONFIRM DELETE MODAL -->
		<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="simpleModalLabel">Eliminar edificio</h4>
					</div>
					<div class="modal-body">
						<p>¿Estás seguro que deseas eliminar este edificio?</p>
					</div>
					<div class="modal-footer">
					<input type="hidden" id="hiddenId"/>
						<button type="button" class="btn btn-default" data-dismiss="modal" onclick="">Cancelar</button>
						<button type="button" class="btn btn-primary" id="delete-btn">Si, seguro</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<!-- END CONFIRM DELETE MODAL -->

	<!-- BEGIN EDIT COMUNIDAD MODAL -->
		<div class="modal fade" id="editComunidadModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<form class="form" id="editComunidadForm">
					<div class="card">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="card-head style-primary">
							<header>Editar comunidad</header>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="card-body floating-label">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" id="nombreEdit" name="nombre" required>
										<label for="nombre">Nombre comunidad</label>
										<p class="help-block"></p>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" id="direccionEdit" name="direccion" required>
										<label for="direccion">Dirección / Descripción</label>
										<p class="help-block"></p>
									</div>
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="razonEdit" name="razon" required>
								<label for="razon">Razón Social</label>
								<p class="help-block"></p>
							</div>
						</div><!--end .card-body -->
						<div class="card-actionbar">
							<div class="card-actionbar-row">
								<button type="button" class="btn btn-default" data-dismiss="modal" onclick="">Cancelar</button>
								<button type="button" class="btn btn-flat btn-primary ink-reaction" id="editComunidad-btn">Confirmar</button>
							</div>
						</div>
					</div><!--end .card -->
				</form>
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<!-- END EDIT COMUNIDAD MODAL -->

	<!-- BEGIN ADD MODAL -->
		<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
			<div class="modal-dialog">	
				<!-- BEGIN VERTICAL FORM -->
				<div class="row">
					<div class="col-lg-offset-1 col-md-10">

						<form class="form" id="createForm">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="id_comunidad" value="{{ $comunidad->id }}">
							<div class="card">
								<div class="card-head style-primary">
									<header>Agrega un edificio</header>
								</div>
								<div class="card-body floating-label">
									<br/>
									<div class="form-group">
										<input type="text" class="form-control" id="nameAdd" name="name">
										<label for="name">Nombre</label>
										<p class="help-block"></p>
									</div>
									<div class="form-group">
										<input type="text" class="form-control" id="descripcionAdd" name="descripcion">
										<label for="descripcion">Descrpción</label>
										<p class="help-block"></p>
									</div>
								</div><!--end .card-body -->
								<div class="card-actionbar">
									<div class="card-actionbar-row">
										<button type="button" class="btn btn-default" data-dismiss="modal" onclick="">Cancelar</button>
										<button type="button" class="btn btn-flat btn-primary ink-reaction" id="btn-add">Crear edificio</button>
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

						<form class="form" id="editEdificioForm">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="id_comunidad" value="{{ $comunidad->id }}">
							<div class="card">
								<div class="card-head style-primary">
									<header>Editar edificio</header>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="form-group">
											<input type="text" class="form-control" id="editNombre" name="nombre">
											<label for="nombre">Nombre</label>
											<p class="help-block"></p>
										</div>
										<div class="form-group">
											<input type="text" class="form-control" id="editDescripcion" name="descripcion">
											<label for="descripcion">Descripcion</label>
											<p class="help-block"></p>
										</div>
									</div>
								</div><!--end .card-body -->
								<div class="card-actionbar">
									<div class="card-actionbar-row">
										<button type="button" class="btn btn-default" data-dismiss="modal" onclick="">Cancelar</button>
										<button type="button" class="btn btn-flat btn-primary ink-reaction" id="edit-btn">Editar edificio</button>
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

	$(document).ready(function(){

		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

		var urlComunidad = '{{ url('/comunidades') }}'
		var url = '{{ url('/edificios') }}'
		var comunidad_id
		var edificio_id

		// Editar Comunidad
		$(document).on("click", "#editComunidad", function(e){

			e.preventDefault()
			comunidad_id = $(this).attr('data-id')

			$.ajax({

	            type: "GET",
	            url: urlComunidad+'/'+comunidad_id+'/edit',
	            success: function (data) {
	            	console.log(data)
	            	$("#editComunidadForm input").each(function(){
	            		$(this).siblings(".help-block").text("")
	            		$(this).parent().removeClass('has-error')
	            	})

	            	$("#nombreEdit").val(data.nombre)
	                $("#direccionEdit").val(data.descripcion)
	                $("#razonEdit").val(data.razonsocial)

	                $("#editComunidadModal").modal("show")    
	            },
	            error: function (data) {
	                console.log('Error:', data);
	            }
	        });
		})

		$(document).on("click", "#editComunidad-btn", function(e){

			e.preventDefault();
			var formData =  getFormData($("#editComunidadForm"))

			$.ajax({

	            type: "PUT",
	            data: formData,
	            dataType: 'json',
	            url: urlComunidad+'/'+comunidad_id,
	            success: function (data) {
	                $('#editComunidadForm').trigger("reset")
	                $('#editComunidadModal').modal('hide')

	                var card = '<div class="card-body no-padding" id="cardInfoComunidad">				<ul class="list"><li class="tile"><a class="tile-content ink-reaction"><div class="tile-icon"><i class="md md-account-box"></i></div><div class="tile-text" id="nombreCard">'+data.nombre+'<small>Nombre</small></div></a></li>'
	                card += '<li class="divider-inset"></li><li class="tile"><a class="tile-content ink-reaction"><div class="tile-icon"><i class="md md-location-on"></i></div><div class="tile-text">'+data.descripcion+'<small>Dirección</small></div></a></li>'
	                card += '<li class="divider-inset"></li>'
	                card += '<li class="tile"><a class="tile-content ink-reaction"><div class="tile-icon"><i class="md md-account-balance"></i></div><div class="tile-text">'+data.razonsocial+'<small>Razon social</small></div></a></li></ul></div>'

	                $("#cardInfoComunidad").replaceWith(card)
	                swal("Listo!", "Comunidad editada", "success")
	            },
	            error: function (data) {
	                var errors = data.responseJSON;
	                console.log(errors)

	                if(errors.nombre) 
	                	$("#nombreEdit").parent().addClass('has-error')
	                	$("#nombreEdit").siblings(".help-block").text(errors.nombre)

	                if(errors.razon)
	                	$("#razonEdit").parent().addClass('has-error')
	                	$("#razonEdit").siblings(".help-block").text(errors.razon)

	                if(errors.descripcion)
	                	$("#direccionEdit").parent().addClass('has-error')
	                	$("#direccionEdit").siblings(".help-block").text(errors.descripcion)
	            }
	        });
		})

		// Agregar Edificio
		$('#addModal').on('show.bs.modal', function () {
			$("#createForm").trigger("reset")
		})

		$(document).on("click", "#btn-add", function(e){

			e.preventDefault()

			var formData = getFormData($("#createForm"))
			console.log(formData)

			$.ajax({

				type: "POST",
				url: url,
				data: formData,
				dataType: 'json',
				success: function (data) {

					var edificio = '<div class="col-md-6" id="edificio-'+data.id+'">				<div class="card style-default-primary"><div class="card-head"><header><i class="fa fa-building-o"></i>    <span>'+data.nombre+'</span></header>'	 

					edificio += '<div class="tools"><div class="btn-group"><a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a><a class="btn btn-icon-toggle editEdificioModal" data-id="'+data.id+'"><i class="md md-mode-edit"></i></a><a class="btn btn-icon-toggle deleteEdificioModal" data-id="'+data.id+'"><i class="md md-close"></i></a></div></div></div>'

					edificio += '<div class="card-body"><div class="row"><div class="col-md-4"><h1 class="text-xxxl text-center">0</h1><p class="text-center"><i class="glyphicon glyphicon-home text-center" style="margin-right: 7px"></i><em>Departamento(s)</em></p></div><div class="col-md-4"><h1 class="text-xxxl text-center">0</h1><p class="text-center"><i class="fa fa-cubes text-center" style="margin-right: 7px"></i><em>Bodega(s)</em></p></div><div class="col-md-4"><h1 class="text-xxxl text-center">0</h1><p class="text-center"><i class="fa fa-car text-center" style="margin-right: 7px"></i><em>Estacionamiento(s)</em></p></div></div><hr class="ruler-xl"><p>'+data.descripcion+'</p></div></div></div>'

					$("#edificiosContainer").append(edificio)
					$('#createForm').trigger("reset");
	                $('#addModal').modal('hide')
	                swal("Listo!", "Comunidad agregada", "success")
				},
				error: function (data) {

					var errors = data.responseJSON;
	               	console.log(errors)

	                if(errors.name) 
	                	$("#nameAdd").parent().addClass('has-error')
	                	$("#nameAdd").siblings(".help-block").text(errors.name)

	                if(errors.descripcion)
	                	$("#descripcionAdd").parent().addClass('has-error')
	                	$("#descripcionAdd").siblings(".help-block").text(errors.descripcion)
				}
			})
		})

		// Eliminar Edificio
		$(document).on("click", ".deleteEdificioModal", function(e){
			e.preventDefault()
			$("#confirmModal").modal('show')
			edificio_id = $(this).attr('data-id')
		})

		$(document).on("click", "#delete-btn", function(e){

			e.preventDefault()

			$.ajax({
	            type: "DELETE",
	            url: url + '/' + edificio_id,
	            success: function (data) {
	                $('#confirmModal').modal('hide')
	                $("#edificio-" + edificio_id).remove();
	                swal("Listo!", "Edificio eliminado", "success")
	            },
	            error: function (data) {
	            	console.log(edificio_id)
	                console.log('Error:', data);
	                swal("Error!", "Error al eliminar este edificio", "error")
	            }
	        });
		})

		// Editar Edificio
		$(document).on("click", ".editEdificioModal", function(e){

			e.preventDefault()

			edificio_id = $(this).attr('data-id')

			$.ajax({

	            type: "GET",
	            url: url+'/'+edificio_id+'/edit',
	            success: function (data) {
	            	$("#editForm input").each(function(){
	            		$(this).siblings(".help-block").text("")
	            		$(this).parent().removeClass('has-error')
	            	})

	                $("#editModal").modal("show")

	                $("#editNombre").val(data.nombre)
	                $("#editDescripcion").val(data.descripcion)
	            },
	            error: function (data) {
	                console.log('Error:', data);
	            }
	        });   
		})

		$(document).on("click", "#edit-btn", function(e){

			e.preventDefault();
			var formData =  getFormData($("#editEdificioForm"))
			console.log(formData)

			$.ajax({

	            type: "PUT",
	            data: formData,
	            dataType: 'json',
	            url: url+'/'+edificio_id,
	            success: function (data) {
	            	console.log(data)
	                $("#edificio-"+edificio_id).find("#nombre-edificio span").append('<i class="fa fa-building-o"></i>').text(data.nombre)
	                $("#edificio-"+edificio_id).find("#descripcion-edificio").text(data.descripcion)
	                $('#editForm').trigger("reset");
	                $('#editModal').modal('hide')
	            },
	            error: function (data) {
	            	console.log(data)
	                var errors = data.responseJSON;
	                console.log(errors)

	                if(errors.nombre) 
	                	$("#nameEdit").parent().addClass('has-error')
	                	$("#nameEdit").siblings(".help-block").text(errors.nombre)

	                if(errors.descripcion)
	                	$("#roleEdit").parent().addClass('has-error')
	                	$("#roleEdit").siblings(".help-block").text(errors.descripcion)
	            }
	        });
		})
	})

	
</script>