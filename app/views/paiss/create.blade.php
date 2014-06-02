@extends('layouts.default')

@section('content')
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<div class="main-content">

		<div class="container">
				<div class="row">
						<div class="col-md-12">






		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">
					{{ $title }}
				</div>

				<div class="panel-options">

				</div>
			</div>

			<div class="panel-body">

				{{ Form::open(array('route' => 'paiss.store', "autocomplete"=>"off" , 'class' => 'form-horizontal form-groups-bordered', 'role' => 'form')) }}

					<div class="form-group">
						<label for="Pais" class="col-sm-3 control-label">Pais</label>
						<div class="col-sm-5">

						{{ Form::text('pais', '', array('class' => 'form-control', 'name' => 'pais', 'id' => 'pais', 'placeholder' => 'Ingrese un pais')) }}
						<br>
						<?php

							if ($errors->first('pais')) {
						?>
							<span class="badge bg-danger">{{ $errors->first('pais') }}</span>

						<?php
							}
						?>

						</div>
					</div>
					<br>
				{{ Form::submit('Agregar', array('class' => 'btn btn-success')) }}

			</div>

		</div>



@stop
