<section>
	<div class="section-header">
			<ol class="breadcrumb">
				<li><a href="{{ url('home') }}">Home</a></li>
				<li class="active">Comunidades</li>
			</ol>
	</div><!--end .section-header -->

	<div class="section-body">
		<div class="container">
			
			<div class="row">
				<h2 class="text-light text-center">Comunidades<br/><small class="text-primary">Estas son las comunidades que administras</small></h2>
				<br/>
				<div class="tools text-center">
					<a href="" data-toggle="modal" data-target="#addModal" >
						<button class="btn btn-floating-action btn-primary" data-toggle="tooltip" data-placement="top" data-original-title="Agregar comunidad"><i class="fa fa-plus"></i></button>
					</a>
				</div>	
			</div>
			<br/>
			<br/>

			@if(isset($comunidades))
			<!-- BEGIN PRICING CARDS 2 -->
			<div class="row" id="comunidadesContainer">
				@foreach($comunidades as $comunidad)			
				<div class="col-md-4" id="comunidad-{{ $comunidad->id }}">
					<div class="card card-type-pricing">
						<div class="card-head style-gray">
							<div class="tools">
								<div class="btn-group">
									<a href="/comunidades/{{ $comunidad->id }}">
										<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Ver comunidad"><i class="fa fa-eye"></i></button>
									</a>
									<a href="" class="editComunidadModal" data-id="{{ $comunidad->id }}">
										<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Editar comunidad"><i class="fa fa-pencil"></i></button>
									</a>
									<a href="" class="deleteComunidadModal" data-id="{{ $comunidad->id }}">
										<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar comunidad"><i class="fa fa-trash-o"></i></button>
									</a>
								</div>
							</div>
						</div><!--end .card-head -->
						<div class="card-body text-center style-gray">
							<h2 class="text-light">{{ $comunidad->nombre }}</h2>
							<div class="price">
								<i class="fa fa-building-o"></i> <h2><span class="text-xxxl">{{ count($comunidad->edificios) }}</span></h2> <span>edificio(s)</span>
							</div>
							<br/>
							<p class="opacity-50">{{ $comunidad->razonsocial }}</p>
							<p class="opacity-50"><em>{{ $comunidad->descripcion }}</em></p>
						</div><!--end .card-body -->
					</div><!--end .card -->
				</div><!--end .col -->
				@endforeach
			</div><!--end .row -->
			<!-- END PRICING CARDS 2 -->
			@endif

		</div><!--end .container -->
	</div><!--end .section-body -->

	<!-- BEGIN CONFIRM DELETE MODAL -->
		<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="simpleModalLabel">Eliminar comunidad</h4>
					</div>
					<div class="modal-body">
						<p>¿Estás seguro que deseas eliminar esta comunidad?</p>
					</div>
					<div class="modal-footer">
					<input type="hidden" id="hiddenId"/>
						<button type="button" class="btn btn-default" data-dismiss="modal" onclick="">Cancelar</button>
						<button type="button" class="btn btn-primary deleteComunidad">Si, seguro</button>
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
						<input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
						<div class="card-head style-primary">
							<header>Crear una comunidad</header>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="card-body floating-label">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" id="nombreAdd" name="nombre" required>
										<label for="nombre">Nombre comunidad</label>
										<p class="help-block"></p>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" id="direccionAdd" name="direccion" required>
										<label for="direccion">Dirección / Descripción</label>
										<p class="help-block"></p>
									</div>
								</div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="razonAdd" name="razon" required>
								<label for="razon">Razón Social</label>
								<p class="help-block"></p>
							</div>
						</div><!--end .card-body -->
						<div class="card-actionbar">
							<div class="card-actionbar-row">
								<button type="button" class="btn btn-default" data-dismiss="modal" onclick="">Cancelar</button>
								<button type="button" class="btn btn-flat btn-primary ink-reaction" id="add-btn">Crear</button>
							</div>
						</div>
					</div><!--end .card -->
				</form>
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<!-- END ADD MODAL -->

	<!-- BEGIN EDIT MODAL -->
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<form class="form" id="editForm">
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
								<button type="button" class="btn btn-flat btn-primary ink-reaction" id="edit-btn">Confirmar</button>
							</div>
						</div>
					</div><!--end .card -->
				</form>
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	<!-- END EDIT MODAL -->

	<meta name="_token" content="{!! csrf_token() !!}" />

</section>

<script type="text/javascript">
	
	function okPress(){
        var id = document.getElementById('hiddenId').value
		window.location.href = '{{ url('/comunidades/delete') }}/'+id

	}

	$(document).ready(function(){

		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

		var url = '{{ url('/comunidades') }}'
		var comunidad_id

		// Agregar Comunidad
		$('#addModal').on('show.bs.modal', function () {
			$("#createForm").trigger("reset")
		})

		$("#add-btn").click(function(e){

			e.preventDefault()
			var formData = getFormData($("#createForm"))
			console.log(formData)

			$.ajax({

				type: "POST",
				url: url,
				data: formData,
				dataType: 'json',
				success: function (data) {

					var comunidad = '<div class="col-md-4" id="comunidad-'+data.id+'"><div class="card card-type-pricing"><div class="card-head style-gray"><div class="tools"><div class="btn-group">'
					comunidad += '<a href="" class="editComunidadModal" data-id="'+data.id+'"><button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Editar comunidad"><i class="fa fa-pencil"></i></button></a>'
					comunidad += '<a href="" class="deleteComunidadModal" data-id="'+data.id+'"><button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar comunidad"><i class="fa fa-trash-o"></i></button></a></div></div></div>'
					comunidad += '<div class="card-body text-center style-gray"><h2 class="text-light">'+data.nombre+'</h2><div class="price"><i class="fa fa-building-o"></i> <h2><span class="text-xxxl">0</span></h2><span>edificio(s)</span></div><br/><p class="opacity-50">'+data.razonsocial+'</p><p class="opacity-50"><em>'+data.descripcion+'</em></p></div><!--end .card-body -->'
					comunidad += '<div class="card-body no-padding"><ul class="list-unstyled text-left">'
					comunidad += '</div></div>'

					$("#comunidadesContainer").append(comunidad)
					$('#createForm').trigger("reset");
	                $('#addModal').modal('hide')
	                swal("Listo!", "Comunidad agregada", "success")
				},
				error: function (data) {

					var errors = data.responseJSON;
	               	
	                if(errors.nombre) 
	                	$("#nombreAdd").parent().addClass('has-error')
	                	$("#nombreAdd").siblings(".help-block").text(errors.nombre)

	                if(errors.razon)
	                	$("#razonAdd").parent().addClass('has-error')
	                	$("#razonAdd").siblings(".help-block").text(errors.razon)

	                if(errors.direccion)
	                	$("#direccionAdd").parent().addClass('has-error')
	                	$("#direccionAdd").siblings(".help-block").text(errors.direccion)
				}
			})
		})

		// Borrar Comunidad
		$(".deleteComunidadModal").click(function(e){

			e.preventDefault()

			$("#confirmModal").modal("show")
			comunidad_id = $(this).attr('data-id')
		})

		$(".deleteComunidad").click(function(){

			$.ajax({
	            type: "DELETE",
	            url: url + '/' + comunidad_id,
	            success: function (data) {
	                $('#confirmModal').modal('hide')
	                $("#comunidad-" + comunidad_id).remove();
	            },
	            error: function (data) {
	                console.log('Error:', data);
	                swal("Error!", "Error al eliminar esta comunidad", "error")
	            }
	        });
		})

		// Editar Comunidad
		$("#comunidadesContainer").on("click", ".editComunidadModal", function(e){

			e.preventDefault()
			$("#editModal").modal("show")
			comunidad_id = $(this).attr('data-id')

			$.ajax({

	            type: "GET",
	            url: url+'/'+comunidad_id+'/edit',
	            success: function (data) {
	            	console.log(data)
	            	$("#editForm input").each(function(){
	            		$(this).siblings(".help-block").text("")
	            		$(this).parent().removeClass('has-error')
	            	})

	            	$("#nombreEdit").val(data.nombre)
	                $("#direccionEdit").val(data.descripcion)
	                $("#razonEdit").val(data.razonsocial)

	                $("#editModal").modal("show")    
	            },
	            error: function (data) {
	                console.log('Error:', data);
	            }
	        });
		})

		$("#edit-btn").click(function(e){
			e.preventDefault();
			var formData =  getFormData($("#editForm"))

			$.ajax({

	            type: "PUT",
	            data: formData,
	            dataType: 'json',
	            url: url+'/'+comunidad_id,
	            success: function (data) {

	                var comunidad = '<div class="col-md-4" id="comunidad-'+data.id+'"><div class="card card-type-pricing"><div class="card-head style-gray"><div class="tools"><div class="btn-group">'
					comunidad += '<a href="" class="editComunidadModal" data-id="'+data.id+'"><button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Editar comunidad"><i class="fa fa-pencil"></i></button></a>'
					comunidad += '<a href="" class="deleteComunidadModal" data-id="'+data.id+'"><button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar comunidad"><i class="fa fa-trash-o"></i></button></a></div></div></div>'
					comunidad += '<div class="card-body text-center style-gray"><h2 class="text-light">'+data.nombre+'</h2><div class="price"><i class="fa fa-building-o"></i> <h2><span class="text-xxxl">0</span></h2><span>edificio(s)</span></div><br/><p class="opacity-50">'+data.razonsocial+'</p><p class="opacity-50"><em>'+data.descripcion+'</em></p></div><!--end .card-body -->'
					comunidad += '<div class="card-body no-padding"><ul class="list-unstyled text-left">'
					comunidad += '</div></div>'

	                $("#comunidad-"+comunidad_id).replaceWith(comunidad)
	                $('#editForm').trigger("reset")
	                $('#editModal').modal('hide')
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
	})
</script>