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
						<a href='/capitulos/create' class='btn btn-success btn-sm btn-icon icon-left'>
							<i class='entypo-plus'></i>
							Nuevo
						</a>

					</div>
				</div>


		<div class="panel panel-primary" data-collapsed="0">


			<div class="panel-body">

				{{ Form::open(array('url' => '/cursos/' . $curso->id . '/unidads/' . $unidad->id . '/capitulos/' . $capitulo->id, 'class' => 'form-horizontal form-groups-bordered')) }}
				{{ Form::hidden('_method', 'DELETE') }}


					<div class="form-group">
						<label for="capitulo" class="col-sm-3 control-label">Capitulo</label>
						<div class="col-sm-5">
								<input type="text" value="{{ $capitulo->capitulo }}" class="form-control" disabled>
						</div>
					</div>

					<div class="form-group">
						<label for="capitulo" class="col-sm-3 control-label">Numero</label>
						<div class="col-sm-5">
								<input type="text" value="{{ $capitulo->numero }}" class="form-control" disabled>
						</div>
					</div>

					<div class="form-group">
						<label for="html_contenido" class="col-sm-3 control-label">Contenido</label>
						<div class="col-sm-5">
								{{ $capitulo->html_contenido }}
						</div>
					</div>


					<br>

					{{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
					{{ Form::close() }}


			</div>

		</div>



@stop
