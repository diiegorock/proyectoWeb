@extends('layouts.app')

@section('content')
	
	<!-- BEGIN CONTENT-->
	<div id="content">
			
		<!-- BEGIN BLANK SECTION -->
		@if($method == 'show')
			
			@include('edificios.show')

		@elseif($method == 'edit')

			@include('edificios.edit')
			
		@endif

		<!-- BEGIN BLANK SECTION -->

	</div><!--end #content-->		
	<!-- END CONTENT -->

@endsection