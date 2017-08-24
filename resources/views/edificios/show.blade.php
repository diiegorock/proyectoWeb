<section>
	<div class="section-header">
			<ol class="breadcrumb">
				<li><a href="{{ url('home') }}">Home</a></li>
				<li><a href="{{ url('/edi') }}">Comunidades</a></li>
				<li class="active">{{ $edificio->nombre }}</li>
			</ol>
	</div><!--end .section-header -->
	
	<div class="section-body">

		<div class="row">
			
			<div class="col-lg-3 col-lg-offset-2">
				<h1 class="text-primary">{{ $edificio->nombre }}</h1>
				<article class="margin-bottom-xxl">
					<p class="lead">
						Este es el detalle del edificio. 
					</p>
					<p>
						Aquí encontrarás información relevante del edificio y las unidades que posee.
					</p>
				</article>
			</div><!--end .col -->

			<!-- BEGIN INFO COMUNIDAD -->
			<div class="col-lg-offset-1 col-lg-5 col-md-4">
				<div class="card card-underline style-primary-dark">
					<div class="card-head">
						<header class="opacity-75"><small>Info Edificio</small></header>
						<div class="tools">
							<a class="btn btn-icon-toggle ink-reaction" id="editEdificio" data-id="{{ $edificio->id }}"><i class="md md-edit"></i></a>
						</div><!--end .tools -->
					</div><!--end .card-head -->
					<div class="card-body no-padding" id="cardInfoEdificio">
						<ul class="list">
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-account-box"></i>
									</div>
									<div class="tile-text" id="nombreCard">
										{{ $edificio->nombre }}
										<small>Nombre</small>
									</div>
								</a>
							</li>
							<li class="divider-inset"></li>
							<li class="tile">
								<a class="tile-content ink-reaction">
									<div class="tile-icon">
										<i class="md md-more"></i>
									</div>
									<div class="tile-text">
										{{ $edificio->descripcion }}
										<small>Descripción</small>
									</div>
								</a>
							</li>
						</ul>
					</div><!--end .card-body -->
				</div><!--end .card -->
			</div><!--end .col -->
			<!-- END INFO COMUNIDAD -->
		</div>

		@if(isset($edificio->unidades))
		<div class="card">
			<!-- BEGIN CONTACT DETAILS -->
			<div class="card-tiles">
				<div class="hbox-md col-md-12">
					<div class="hbox-column col-md-12">
						<div class="row">
							<h2 class="text-light text-center">Unidades {{ $edificio->nombre }}<br/><small class="text-primary">Estas son las unidades de este edificio</small></h2>
							<br/>
							<div class="tools text-center">
								<button class="btn btn-floating-action btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Agregar unidad" id="addUnidadModal"><i class="fa fa-plus"></i></button>
							</div
							<div class="col-md-10">
								<h4>Unidades </h4>
							</div><!--end .col -->
							<div class="col-lg-12">
								<div class="table-responsive">
									<table id="datatable1" class="table table-hover">
										<thead>
											<tr>
												<th>Tipo</th>
												<th>Número</th>
												<th>Descripción</th>
												<th>Propietario</th>
												<th class="text-right">Acciones</th>
											</tr>
										</thead>
										<tbody>
											@foreach($edificio->unidades as $unidad)
											<tr data-id="unidad-{{ $unidad->id }}">
												<td>{{ $unidad->getTipo() }}</td>
												<td>{{ $unidad->numero }}</td>
												<td>{{ $unidad->descripcion }}</td>
												<td>{{ $unidad->propietario->name or 'Sin propietario' }}</td>
												<td class="text-right" data-id="{{ $unidad->id }}">
													<button type="button" class="btn btn-icon-toggle editUnidadModal" data-toggle="tooltip" data-placement="top" data-original-title="Editar unidad"><i class="fa fa-pencil"></i></button>
													<button type="button" class="btn btn-icon-toggle deleteUnidadModal" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar unidad"><i class="fa fa-trash-o"></i></button>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div><!--end .table-responsive -->
							</div><!--end .col -->
						</div><!--end .row -->
					</div><!--end .hbox-column -->

				</div><!--end .hbox-md -->
			</div><!--end .card-tiles -->
			<!-- END CONTACT DETAILS -->
		</div><!--end .card -->
		@endif 
	</div><!--end .section-body -->

	<!-- BEGIN EDIT EDIFICIO MODAL -->
		<div class="modal fade" id="editEdificioModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<form class="form" id="editEdificioForm">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="id_comunidad" value="{{ $edificio->condominio->id }}">
					<div class="card">
						<div class="card-head style-primary">
							<header>Editar edificio</header>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="form-group">
									<input type="text" class="form-control" id="editEdificioNombre" name="nombre">
									<label for="nombre">Nombre</label>
									<p class="help-block"></p>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" id="editEdificioDescripcion" name="descripcion">
									<label for="descripcion">Descripcion</label>
									<p class="help-block"></p>
								</div>
							</div>
						</div><!--end .card-body -->
						<div class="card-actionbar">
							<div class="card-actionbar-row">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
								<button type="button" class="btn btn-flat btn-primary ink-reaction" id="editEdificio-btn">Editar edificio</button>
							</div>
						</div>
					</div><!--end .card -->
				</form>
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<!-- END EDIT EDIFICIO MODAL -->

	<!-- BEGIN CONFIRM DELETE MODAL -->
		<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="simpleModalLabel">Eliminar unidad</h4>
					</div>
					<div class="modal-body">
						<p>¿Estás seguro que deseas eliminar esta unidad?</p>
					</div>
					<div class="modal-footer">
					<input type="hidden" id="hiddenId"/>
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-primary" id="deleteUnidad">Si, seguro</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<!-- END CONFIRM DELETE MODAL -->

	<!-- BEGIN ADD MODAL -->
		<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<form class="form" id="createForm">
					<div class="card">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id_edificio" value="{{ $edificio->id }}">
						<div class="card-head style-primary">
							<header>Crear una unidad</header>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="card-body floating-label">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<select id="tipo" name="tipo" class="form-control" required>
											<option value="">&nbsp;</option>
											<option value="1">Departamento</option>
											<option value="2">Bodega</option>
											<option value="3">Estacionamiento</option>
										</select>
										<label for="tipo">Tipo de unidad</label>
										<p class="help-block"></p>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" id="number" name="number" required>
										<label for="number">Número de unidad</label>
										<p class="help-block"></p>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="form-group">
									<textarea class="form-control" id="descripcion" name="descripcion"></textarea>
									<label for="descripcion">Descripción</label>
									<p class="help-block"></p>
								</div>
							</div>
						</div><!--end .card-body -->
						<div class="card-actionbar">
							<div class="card-actionbar-row">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
								<button type="button" class="btn btn-flat btn-primary ink-reaction" id="addUnidad-btn">Crear</button>
							</div>
						</div>
					</div><!--end .card -->
				</form>
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<!-- END ADD MODAL -->

	<!-- BEGIN EDIT UNIDAD MODAL -->
		<div class="modal fade" id="editUnidadModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<form class="form" id="editUnidadForm">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="id_comunidad" value="{{ $edificio->condominio->id }}">
					<div class="card">
						<div class="card-head style-primary">
							<header>Editar edificio</header>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<select id="editUnidadTipo" name="tipo" class="form-control" required>
											<option value="">&nbsp;</option>
											<option value="1">Departamento</option>
											<option value="2">Bodega</option>
											<option value="3">Estacionamiento</option>
										</select>
										<label for="nombre">Tipo</label>
										<p class="help-block"></p>
									</div>
								</div>	
								<div class="col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" id="editUnidadNumero" name="numero">
										<label for="descripcion">Número</label>
										<p class="help-block"></p>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<textarea class="form-control" id="editUnidadDescripcion" name="descripcion"></textarea>
										<label for="descripcion">Descripcion</label>
										<p class="help-block"></p>
									</div>
								</div>
							</div>
						</div><!--end .card-body -->
						<div class="card-actionbar">
							<div class="card-actionbar-row">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
								<button type="button" class="btn btn-flat btn-primary ink-reaction" id="editUnidad-btn">Editar edificio</button>
							</div>
						</div>
					</div><!--end .card -->
				</form>
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<!-- END EDIT UNIDAD MODAL -->

	<meta name="_token" content="{!! csrf_token() !!}" />

</section>

<script type="text/javascript">
	
	$('#datatable1').DataTable({
		"dom": 'lCfrtip',
		"order": [],
		"colVis": {
			"buttonText": "Columns",
			"overlayFade": 0,
			"align": "right"
		},
		"language": {
			"lengthMenu": '_MENU_ unidades por página',
			"search": '<i class="fa fa-search"></i>',
			"paginate": {
				"previous": '<i class="fa fa-angle-left"></i>',
				"next": '<i class="fa fa-angle-right"></i>'
			}
		}
	});

	function getTipoUnidad(tipo){
		switch(tipo){
			case '1':
				return "Departamento"
				break;
			case '2':
				return "Bodega"
				break;
			case '3':
				return "Estacionamiento"
				break;
		}
	}

	$(document).ready(function(){

		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

		var urlEdificios = '{{ url('/edificios') }}'
		var url = '{{ url('/unidades') }}'
		var edificio_id
		var unidad_id
		var table = $("#datatable1").DataTable()
		var row

		// Editar edificio
		$(document).on("click", "#editEdificio", function(e){

			e.preventDefault()
			edificio_id = $(this).attr('data-id')

			$.ajax({

	            type: "GET",
	            url: urlEdificios+'/'+edificio_id+'/edit',
	            success: function (data) {
	            	console.log(data)
	            	$("#editEdificioForm input").each(function(){
	            		$(this).siblings(".help-block").text("")
	            		$(this).parent().removeClass('has-error')
	            	})

	            	$("#editEdificioNombre").val(data.nombre)
	                $("#editEdificioDescripcion").val(data.descripcion)

	                $("#editEdificioModal").modal("show")    
	            },
	            error: function (data) {
	                console.log('Error:', data);
	            }
	        });
		})

		$(document).on("click", "#editEdificio-btn", function(e){
			e.preventDefault()

			e.preventDefault();
			var formData =  getFormData($("#editEdificioForm"))

			$.ajax({

	            type: "PUT",
	            data: formData,
	            dataType: 'json',
	            url: urlEdificios+'/'+edificio_id,
	            success: function (data) {
	                $('#editEdificioForm').trigger("reset")
	                $('#editEdificioModal').modal('hide')

	                var card = '<div class="card-body no-padding" id="cardInfoEdificio"><ul class="list"><li class="tile"><a class="tile-content ink-reaction"><div class="tile-icon"><i class="md md-account-box"></i></div><div class="tile-text" id="nombreCard">'+data.nombre+' 										<small>Nombre</small></div></a></li>'
							
					card += '<li class="divider-inset"></li><li class="tile"><a class="tile-content ink-reaction">									<div class="tile-icon"><i class="md md-more"></i></div><div class="tile-text">'+data.descripcion+'<small>Descripción</small></div></a></li></ul></div></div>'

	                $("#cardInfoEdificio").replaceWith(card)
	                swal("Listo!", "Edificio editado", "success")
	            },
	            error: function (data) {
	                var errors = data.responseJSON;
	                console.log(errors)

	                if(errors.nombre) 
	                	$("#editEdificioNombre").parent().addClass('has-error')
	                	$("#editEdificioNombre").siblings(".help-block").text(errors.nombre)

	                if(errors.descripcion)
	                	$("#editEdificioDescripcion").parent().addClass('has-error')
	                	$("#editEdificioDescripcion").siblings(".help-block").text(errors.descripcion)
	            }
	        });
		})

		// Agregar Unidad
		$(document).on("click", "#addUnidadModal", function(e){

			e.preventDefault()
			$("#addModal").modal("show")
			$("#createForm").trigger("reset")
		})

		$(document).on("click", "#addUnidad-btn", function(e){

			e.preventDefault()
			var formData = getFormData($("#createForm"))

			$.ajax({

				type: "POST",
				url: url,
				data: formData,
				dataType: 'json',
				success: function (data) {

					var unidad = '<tr data-id="unidad-'+data.id+'">'

					unidad += '<td>'+getTipoUnidad(data.tipo)+'</td><td>'+data.numero+'</td><td>'+data.descripcion+'</td><td>Sin propietario</td>'

					unidad += '<td class="text-right" data-id="'+data.id+'"><button type="button" class="btn btn-icon-toggle editUnidadModal" data-toggle="tooltip" data-placement="top" data-original-title="Editar unidad"><i class="fa fa-pencil" ></i></button><button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar unidad"><i class="fa fa-trash-o"></i></button></td></tr>'

					table.row.add($(unidad)[0]).draw();

					$('#createForm').trigger("reset");
	                $('#addModal').modal('hide')
	                swal("Listo!", "Comunidad agregada", "success")
				},
				error: function (data) {

					var errors = data.responseJSON;
	               	console.log(errors)

	                if(errors.tipo) 
	                	$("#tipo").parent().addClass('has-error')
	                	$("#tipo").siblings(".help-block").text(errors.tipo)
					
					if(errors.number) 
	                	$("#number").parent().addClass('has-error')
	                	$("#number").siblings(".help-block").text(errors.number)
	                
	                if(errors.descripcion)
	                	$("#descripcion").parent().addClass('has-error')
	                	$("#descripcion").siblings(".help-block").text(errors.descripcion)
	                
				}
			})
		})

		// Editar Unidad
		$(document).on("click", ".editUnidadModal", function(e){

			e.preventDefault()
			$("#editUnidadModal").modal("show")
			unidad_id = $(this).parent().attr("data-id")
			row = $(this).parent().parent()

			$.ajax({

	            type: "GET",
	            url: url+'/'+unidad_id+'/edit',
	            success: function (data) {
	            	$("#editUnidadForm input").each(function(){
	            		$(this).siblings(".help-block").text("")
	            		$(this).parent().removeClass('has-error')
	            	})

	            	$("#editUnidadTipo").val(data.tipo)
	                $("#editUnidadNumero").val(data.numero)
	                $("#editUnidadDescripcion").val(data.descripcion)

	                $("#editComunidadModal").modal("show")    
	            },
	            error: function (data) {
	                console.log('Error:', data);
	            }
	        });
		})

		$(document).on("click", "#editUnidad-btn", function(e){

			e.preventDefault()
			var formData =  getFormData($("#editUnidadForm"))
			var propietario = table.row(row).data()[3]

			$.ajax({

	            type: "PUT",
	            data: formData,
	            dataType: 'json',
	            url: url+'/'+unidad_id,
	            success: function (data) {

	            	var acciones = '<button type="button" class="btn btn-icon-toggle editUnidadModal" data-toggle="tooltip" data-placement="top" data-original-title="Editar unidad" data-id='+data.id+'""><i class="fa fa-pencil"></i></button><button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" sata-original-title="Eliminar unidad"><i class="fa fa-trash-o"></i></button>'
	                var data = [getTipoUnidad(data.tipo), data.numero, data.descripcion, propietario, acciones]
					table.row(row).data(data)
					$('#editUnidadForm').trigger("reset")
	                $('#editUnidadModal').modal('hide')
	                swal("Listo!", "Comunidad editada", "success")
	            },
	            error: function (data) {
	                var errors = data.responseJSON;
	                console.log(errors)

	                
	                if(errors.tipo) 
	                	$("#editUnidadTipo").parent().addClass('has-error')
	                	$("#editUnidadTipo").siblings(".help-block").text(errors.tipo)

	                if(errors.numero)
	                	$("#editUnidadNumero").parent().addClass('has-error')
	                	$("#editUnidadNumero").siblings(".help-block").text(errors.numero)

	                if(errors.descripcion)
	                	$("#editUnidadDescripcion").parent().addClass('has-error')
	                	$("#editUnidadDescripcion").siblings(".help-block").text(errors.descripcion)
	                
	            }
	        });
		})

		// Eliminar Unidad
		$(document).on("click", ".deleteUnidadModal", function(e){

			e.preventDefault()
			unidad_id = $(this).parent().attr('data-id')
			$("#confirmModal").modal("show")
			row = $(this).parent().parent()
		})

		$(document).on("click", "#deleteUnidad", function(){

			$.ajax({
	            type: "DELETE",
	            url: url + '/' + unidad_id,
	            success: function (data) {
	                $('#confirmModal').modal('hide')
	                table.row(row).remove().draw()
	                swal("Listo!", "Edificio eliminado", "success")
	            },
	            error: function (data) {
	                console.log('Error:', data);
	                swal("Error!", "Error al eliminar este edificio", "error")
	            }
	        });
		})
	})
</script>