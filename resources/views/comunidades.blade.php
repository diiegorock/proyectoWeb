@extends('layouts.app')

@section('content')

	<!-- BEGIN CONTENT-->
	<div id="content">
			
		<!-- BEGIN BLANK SECTION -->
		@if($method == 'index')
			
			@include('comunidades.index')

		@elseif($method == 'show')

			@include('comunidades.show')
			
		@endif

		<!-- BEGIN BLANK SECTION -->

	</div><!--end #content-->		
	<!-- END CONTENT -->

@endsection