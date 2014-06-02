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
									<div class="label label-secondary">Preguntas</div>
								</a>
						</td>

					</div>

					<div class="panel-options">
						<a href='/unidads/create' class='btn btn-success btn-sm btn-icon icon-left'>
							<i class='entypo-plus'></i>
							Nuevo
						</a>

					</div>
				</div>


		<div class="panel panel-primary" data-collapsed="0">


			<div class="panel-body">

				{{ Form::open(array('url' => URL::to('/cursos/' . $curso->id . '/unidads/' . $unidad->id . '/capitulos/' . $capitulo->id . '/capitulospreguntas/' . $capitulospregunta->id), 'method' => 'PUT', 'role' => 'form', 'class' => 'form-horizontal form-groups-bordered')) }}


					<div class="form-group">
						<label for="capitulospregunta" class="col-sm-2 control-label">Capitulo Pregunta</label>
						<div class="col-sm-10">
									<textarea class="form-control wysihtml5" name="capitulospregunta" id="capitulospregunta" rows="10">{{ $capitulospregunta->capitulospregunta }}</textarea>
									<br>
									<?php if ($errors->first('capitulospregunta')) { ?>
											<span class="badge bg-danger">{{ $errors->first('capitulospregunta') }}</span>
									<?php } ?>
						</div>

					</div>



					<br>
				{{ Form::submit('Editar', array('class' => 'btn btn-success')) }}

			</div>

		</div>



@stop
