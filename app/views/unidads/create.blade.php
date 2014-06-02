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
					<td class="padding-lg">
						<a href='/cursos/{{$curso->id}}'>
							<div class="label label-secondary">{{ $curso->curso }}</div>
						</a>
						<a href='/cursos/{{$curso->id}}/unidads'>
							<div class="label label-secondary">Unidades</div>
						</a>
					</td>

				</div>

				<div class="panel-options">

				</div>
			</div>

			<div class="panel-body">




				{{ Form::open(array('url' => '/cursos/' . $curso->id . '/unidads', 'class' => 'form-horizontal form-groups-bordered', "autocomplete"=>"off")) }}
				{{ Form::hidden('_method', 'POST') }}

					<div class="form-group">
						<label for="Pais" class="col-sm-3 control-label">Unidad</label>
						<div class="col-sm-5">
						{{ Form::text('unidad', '', array('class' => 'form-control', 'name' => 'unidad', 'id' => 'unidad', 'placeholder' => 'Ingrese una unidad')) }}<br>
						<?php if ($errors->first('unidad')) { ?>
								<span class="badge bg-danger">{{ $errors->first('unidad') }}</span>
						<?php } ?>

						</div>
					</div>


					<div class="form-group">
						<label for="Pais" class="col-sm-3 control-label">Numero</label>
						<div class="col-sm-3">
						{{ Form::text('numero', '', array('class' => 'form-control', 'name' => 'numero', 'id' => 'numero', 'placeholder' => 'Ingrese numero de unidad')) }}<br>
						<?php if ($errors->first('numero')) { ?>
								<span class="badge bg-danger">{{ $errors->first('numero') }}</span>
						<?php } ?>

						</div>
					</div>



					<br>
				{{ Form::submit('Agregar', array('class' => 'btn btn-success')) }}

			</div>

		</div>



@stop
