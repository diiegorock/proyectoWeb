@extends('layouts.app')

@section('content')

	<!-- BEGIN CONTENT-->
	<div id="content">
			
		<!-- BEGIN BLANK SECTION -->
		@if($method == 'index')
			
			@include('gastocomun.index')

		@elseif($method == 'show')

			@include('gastocomun.show')
			
		@endif

		<!-- BEGIN BLANK SECTION -->

	</div><!--end #content-->		
	<!-- END CONTENT -->

@endsection