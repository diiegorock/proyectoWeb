@extends('layouts.app')

@section('content')

	<!-- BEGIN CONTENT-->
	<div id="content">
			
		<!-- BEGIN BLANK SECTION -->
		@if($method == 'index')
			
			@include('users.index')

		@elseif($method == 'add')

			@include('users.add')

		@elseif($method == 'edit')

			@include('users.view')

		@endif

		<!-- BEGIN BLANK SECTION -->

	</div><!--end #content-->		
	<!-- END CONTENT -->

@endsection