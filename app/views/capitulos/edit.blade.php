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
									<div class="label label-secondary">Capitulos</div>
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

				{{ Form::open(array('url' => URL::to('/cursos/' . $curso->id . '/unidads/' . $unidad->id . '/capitulos/' . $capitulo->id), 'method' => 'PUT', 'role' => 'form', 'class' => 'form-horizontal form-groups-bordered')) }}

					<div class="form-group">
						<label for="unidad" class="col-sm-3 control-label">Capitulo</label>
						<div class="col-sm-5">
						{{ Form::text('capitulo', $capitulo->capitulo, array('class' => 'form-control', 'name' => 'capitulo', 'id' => 'capitulo', 'placeholder' => 'Ingrese un capitulo')) }}
						<br>
						<?php if ($errors->first('capitulo')) { ?>
							<span class="badge bg-danger">{{ $errors->first('capitulo') }}</span>
						<?php } ?>
						</div>
					</div>

					<div class="form-group">
						<label for="unidad" class="col-sm-3 control-label">Numero</label>
						<div class="col-sm-5">
						{{ Form::text('numero', $capitulo->numero, array('class' => 'form-control', 'name' => 'numero', 'id' => 'numero', 'placeholder' => 'Ingrese un numera de unidad')) }}
						<br>
						<?php if ($errors->first('unidad')) { ?>
							<span class="badge bg-danger">{{ $errors->first('numero') }}</span>
						<?php } ?>
						</div>
					</div>



					<div class="form-group">
						<label for="html_contenido" class="col-sm-2 control-label">Contenido</label>
						<div class="col-sm-10">
									<textarea class="form-control wysihtml5" name="html_contenido" id="html_contenido" rows="35">{{ $capitulo->html_contenido }}</textarea>
									<br>
									<?php if ($errors->first('html_contenido')) { ?>
											<span class="badge bg-danger">{{ $errors->first('html_contenido') }}</span>
									<?php } ?>
						</div>

					</div>



					<br>
				{{ Form::submit('Editar', array('class' => 'btn btn-success')) }}

			</div>

		</div>



@stop
