<section>
	<div class="section-header">
			<ol class="breadcrumb">
				<li><a href="{{ url('home') }}">Home</a></li>
				<li class="active">Gastos Comunes</li>
			</ol>
	</div><!--end .section-header -->

	<div class="section-body">
		<div class="container">
			
			<div class="row">
				<h2 class="text-light text-center">Gastos Comunes<br/><small class="text-primary">Estos son los gastos comunes actuales de las comunidades que administras</small></h2>
				<br/>
				<div class="tools pull-left">
					<h2 id="dateTime"></h2>
				</div>
				<div class="tools pull-right">
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
				<div class="col-md-3" id="comunidad-{{ $comunidad->id }}">
					<div class="card card-type-pricing">
						<div class="card-head style-gray">
							<div class="tools">
								<div class="btn-group">
									<a href="/comunidades/{{ $comunidad->id }}">
										<button type="button" class="btn btn-icon-toggle" data-toggle="tooltip" data-placement="top" data-original-title="Ver comunidad"><i class="fa fa-eye"></i></button>
									</a>
								</div>
							</div>
						</div><!--end .card-head -->
						<div class="card-body text-center style-gray">
							<h3 class="text-light">{{ $comunidad->nombre }}</h3>
							<div class="price">
									<span class="text-lg">$ </span><h2><span class="text-xl">{{ number_format($comunidad->gastosComunesMes(8), 0, '', '.') }}</span></h2>
							</div>
							<br/>
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

	$(document).ready(function(){

		var monthNames = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

		var d = new Date();
		var month = d.getMonth()
		var year = d.getFullYear().toString()

		$("#dateTime").text(monthNames[month]+' del '+year)

		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

		var url = '{{ url('/comunidades') }}'
		var comunidad_id
	})
</script>