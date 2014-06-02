@extends('layouts.defaultlight')

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
						<td class="padding-lg">
							<a href='/cursos/{{$curso->id}}'>
								<div class="label label-secondary">{{ $curso->curso }}</div>
							</a>
							<a href='/cursos/{{$curso->id}}/unidads'>
								<div class="label label-secondary">{{ $unidad->unidad }}</div>
							</a>
								<a href='/cursos/{{$curso->id}}/unidads/{{$unidad->id}}/capitulos'>
									<div class="label label-secondary">{{ $capitulo->capitulo }}</div>
								</a>
								<a href='/cursos/{{$curso->id}}/unidads/{{$unidad->id}}/capitulos/{{$capitulo->id}}/capitulospreguntas'>
									<div class="label label-secondary">{{ $capitulospregunta->capitulospregunta }}</div>
								</a>
										<a href='/cursos/{{$curso->id}}/unidads/{{$unidad->id}}/capitulos/{{$capitulo->id}}/capitulospreguntas/{{$capitulospregunta->id}}/capitulosrespuestas'>
											<div class="label label-secondary">Capitulos Respuestas</div>
										</a>
						</td>
						<br><br>
						<h3>{{ $title }}</h3>

					</div>

					<div class="panel-options">
						<a href='/cursos/{{$curso->id}}/unidads/{{$unidad->id}}/capitulos/{{$capitulo->id}}/capitulospreguntas/{{$capitulospregunta->id}}/capitulosrespuestas/create' class='btn btn-success btn-sm btn-icon icon-left'>
							<i class='entypo-plus'></i>
							Nuevo
						</a>

					</div>
				</div>


		<div class="panel panel-primary" data-collapsed="0">


			<div class="panel-body">

				{{ Form::open(array('url' => URL::to('/cursos/' . $curso->id . '/unidads/' . $unidad->id . '/capitulos/' . $capitulo->id . '/capitulospreguntas/' . $capitulospregunta->id . '/capitulosrespuestas/' . $capitulosrespuesta->id), 'method' => 'PUT', 'role' => 'form', 'class' => 'form-horizontal form-groups-bordered')) }}


					<div class="form-group">
						<label for="capitulosrespuesta" class="col-sm-2 control-label">Capitulo Respuesta</label>
						<div class="col-sm-10">
									<textarea class="form-control wysihtml5" name="capitulosrespuesta" id="capitulosrespuesta" rows="10">{{ $capitulosrespuesta->capitulosrespuesta }}</textarea>
									<br>
									<?php if ($errors->first('capitulosrespuesta')) { ?>
											<span class="badge bg-danger">{{ $errors->first('capitulosrespuesta') }}</span>
									<?php } ?>
						</div>

					</div>

					<?php

						$chequeado = "";
						if ($capitulosrespuesta->correcta) {
							$chequeado = "checked";
						}



					?>


				<div class="form-group">
					<label class="col-sm-2 control-label">Correcta</label>
					<div class="col-sm-5">
						<div id="label-switch" class="make-switch" data-on-label="<i class='entypo-check'></i>" data-off-label="<i class='entypo-cancel'></i>">
							<input type="checkbox"  id="correcta" name="correcta" {{$chequeado}}>
						</div>
					</div>
				</div>



					<br>
				{{ Form::submit('Editar', array('class' => 'btn btn-success')) }}

			</div>

		</div>

<script src="/assets/js/bootstrap-switch.min.js" id="script-resource-7"></script>

@stop
