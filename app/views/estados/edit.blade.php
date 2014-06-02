@extends('layouts.default')

@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


<div class="main-content">

		<div class="container">
				<div class="row">
						<div class="col-md-12">




				<div class="panel-heading">
					<div class="panel-title">
						<h4>{{ $title }}</h4>
					</div>

					<div class="panel-options">
						<a href='/estados/create' class='btn btn-success btn-sm btn-icon icon-left'>
							<i class='entypo-plus'></i>
							Nuevo
						</a>

					</div>
				</div>


		<div class="panel panel-primary" data-collapsed="0">


			<div class="panel-body">

				{{ Form::open(array('url' => URL::to('/estados/' . $estado->id), 'method' => 'PUT', 'role' => 'form', 'class' => 'form-horizontal form-groups-bordered')) }}

					<div class="form-group">
						<label for="estado" class="col-sm-3 control-label">estado</label>
						<div class="col-sm-5">

								{{ Form::text('estado', $estado->estado, array('class' => 'form-control', 'name' => 'estado', 'id' => 'estado', 'placeholder' => 'Ingrese un estado')) }}
									<br>

						<?php if ($errors->first('estado')) { ?>
									<span class="badge bg-danger">{{ $errors->first('estado') }}</span>
						<?php } ?>



						</div>
					</div>

					<div class="form-group">
						<label for="estado" class="col-sm-3 control-label">estado</label>
						<div class="col-sm-5">
							  <?php
										$pais = Pais::find($estado->paiss_id);
								?>
								{{ Form::text('pais', $pais->pais, array('class' => 'form-control typeahead', 'data-remote' => '/paiss/search?term=%QUERY', 'name' => 'pais', 'id' => 'pais', 'placeholder' => 'Ingrese un pais')) }}
									<br>

						<?php if ($errors->first('estado')) { ?>
									<span class="badge bg-danger">{{ $errors->first('estado') }}</span>
						<?php } ?>



						</div>
					</div>


					<br>
				{{ Form::submit('Editar', array('class' => 'btn btn-success')) }}

			</div>

		</div>


	<link rel="stylesheet" href="/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="/js/select2/select2.css"  id="style-resource-2">
	<link rel="stylesheet" href="/js/selectboxit/jquery.selectBoxIt.css"  id="style-resource-3">
	<link rel="stylesheet" href="/js/daterangepicker/daterangepicker-bs3.css"  id="style-resource-4">

	<script src="/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="/js/joinable.js" id="script-resource-4"></script>
	<script src="/js/resizeable.js" id="script-resource-5"></script>
	<script src="/js/neon-api.js" id="script-resource-6"></script>
	<script src="/js/select2/select2.min.js" id="script-resource-7"></script>
	<script src="/js/bootstrap-tagsinput.min.js" id="script-resource-8"></script>
	<script src="/js/typeahead.min.js" id="script-resource-9"></script>
	<script src="/js/selectboxit/jquery.selectBoxIt.min.js" id="script-resource-10"></script>
	<script src="/js/bootstrap-datepicker.js" id="script-resource-11"></script>
	<script src="/js/bootstrap-timepicker.min.js" id="script-resource-12"></script>
	<script src="/js/bootstrap-colorpicker.min.js" id="script-resource-13"></script>
	<script src="/js/daterangepicker/moment.min.js" id="script-resource-14"></script>
	<script src="/js/daterangepicker/daterangepicker.js" id="script-resource-15"></script>
	<script src="/js/jquery.multi-select.js" id="script-resource-16"></script>
	<script src="/js/neon-chat.js" id="script-resource-17"></script>
	<script src="/js/neon-custom.js" id="script-resource-18"></script>
	<script src="/js/neon-demo.js" id="script-resource-19"></script>


@stop
