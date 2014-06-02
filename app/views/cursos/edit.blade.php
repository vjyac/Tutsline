@extends('layouts.defaultlight')

@section('content')




<?php
	$idioma = DB::table('idiomas')->where('id', '=', $curso->idiomas_id)->first();
	$areasinteres = DB::table('areasinteress')->where('id', '=', $curso->areasinteress_id)->first();
?>



		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">

						<td class="padding-lg">
							<a href='/cursos'>
								<div class="label label-secondary">Cursos</div>
							</a>
						</td>

				</div>

				<div class="panel-options">

				</div>
			</div>

			<div class="panel-body">

				{{ Form::open(array('url' => URL::to('/cursos/' . $curso->id), 'method' => 'PUT', 'role' => 'form', 'class' => 'form-horizontal form-groups-bordered')) }}

					<div class="form-group">
						<label for="curso" class="col-sm-3 control-label">Curso</label>
						<div class="col-sm-5">
									{{ Form::text('curso', $curso->curso, array('class' => 'form-control', 'name' => 'curso', 'id' => 'curso', 'placeholder' => 'Ingrese un curso')) }}
									<?php if ($errors->first('curso')) { ?>
											<span class="badge bg-danger">{{ $errors->first('curso') }}</span>
									<?php } ?>
						</div>
					</div>

					<div class="form-group">
						<label for="idioma" class="col-sm-3 control-label">Idioma</label>
						<div class="col-sm-5">
									<input type="text" value="{{ $idioma->idioma }}" name="idioma" id="idioma" class="form-control typeahead" data-remote="/idiomas/search?term=%QUERY" placeholder="Ingrese un idioma" />
									<br>
									<?php if ($errors->first('idioma')) { ?>
											<span class="badge bg-danger">{{ $errors->first('idioma') }}</span>
									<?php } ?>
						</div>
					</div>

					<div class="form-group">
						<label for="areasinteres" class="col-sm-3 control-label">Area Interes</label>
						<div class="col-sm-5">
									<input type="text" value="{{ $areasinteres->areasinteres }}" name="areasinteres" id="areasinteres" class="form-control typeahead" data-remote="/areasinteress/search?term=%QUERY" placeholder="Ingrese un area interes" />
									<br>
									<?php if ($errors->first('areasinteres')) { ?>
											<span class="badge bg-danger">{{ $errors->first('areasinteres') }}</span>
									<?php } ?>
						</div>
					</div>

					<div class="form-group">
						<label for="importe" class="col-sm-3 control-label">Importe</label>
						<div class="col-sm-5">
									<input type="text" value="{{ $curso->importe }}" name="importe" id="importe" class="form-control" placeholder="Ingrese un importe" />
									<br>
									<?php if ($errors->first('importe')) { ?>
											<span class="badge bg-danger">{{ $errors->first('importe') }}</span>
									<?php } ?>
						</div>
					</div>

					<div class="form-group">
						<label for="cuotas" class="col-sm-3 control-label">Cuotas</label>
						<div class="col-sm-5">
									<input type="text" value={{ $curso->cuotas }} name="cuotas" id="cuotas" class="form-control" placeholder="Ingrese cantidad de cuotas" />
									<br>
									<?php if ($errors->first('cuotas')) { ?>
											<span class="badge bg-danger">{{ $errors->first('cuotas') }}</span>
									<?php } ?>
						</div>
					</div>


					<div class="form-group">
						<label for="duracion" class="col-sm-3 control-label">Duracion</label>
						<div class="col-sm-5">
									<input type="text" value="{{ $curso->duracion }}" name="duracion" id="duracion" class="form-control" placeholder="Ingrese la duracion" />
									<br>
									<?php if ($errors->first('duracion')) { ?>
											<span class="badge bg-danger">{{ $errors->first('duracion') }}</span>
									<?php } ?>
						</div>
					</div>

					<div class="form-group">
						<label for="cargahoraria" class="col-sm-3 control-label">Carga Horaria</label>
						<div class="col-sm-5">
									<input type="text" value="{{ $curso->cargahoraria }}" name="cargahoraria" id="cargahoraria" class="form-control" placeholder="Ingrese una carga horaria" />
									<br>
									<?php if ($errors->first('cargahoraria')) { ?>
											<span class="badge bg-danger">{{ $errors->first('cargahoraria') }}</span>
									<?php } ?>
						</div>
					</div>

					<div class="form-group">
						<label for="cargahoraria" class="col-sm-2 control-label">Metodologia</label>
						<div class="col-sm-10">
									<textarea class="form-control wysihtml5" name="html_metodologia" id="html_metodologia" rows="25">{{ $curso->html_metodologia }}</textarea>
									<br>
									<?php if ($errors->first('html_metodologia')) { ?>
											<span class="badge bg-danger">{{ $errors->first('html_metodologia') }}</span>
									<?php } ?>
						</div>

					<div class="form-group">
						<label for="cargahoraria" class="col-sm-2 control-label">Plan de Estudio</label>
						<div class="col-sm-10">
									<textarea class="form-control wysihtml5" name="html_objetivos" id="html_objetivos" rows="25">{{ $curso->html_objetivos }}</textarea>
									<br>
									<?php if ($errors->first('html_objetivos')) { ?>
											<span class="badge bg-danger">{{ $errors->first('html_objetivos') }}</span>
									<?php } ?>
						</div>

					</div>






					<br>

							{{ Form::submit('Editar', array('class' => 'btn btn-success')) }}

			</div>

		</div>




@stop
