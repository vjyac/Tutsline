@extends('layouts.defaultlight')

@section('content')



<link rel="stylesheet" href="/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
<link rel="stylesheet" href="/assets/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
<link rel="stylesheet" href="/assets/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic"  id="style-resource-4">
<link rel="stylesheet" href="/assets/css/neon.css"  id="style-resource-5">
<link rel="stylesheet" href="/assets/css/custom.css"  id="style-resource-6">

<script src="/assets/js/jquery-1.10.2.min.js"></script>


<?php
	$idioma = DB::table('idiomas')->where('id', '=', $curso->idiomas_id)->first();
	$areasinteres = DB::table('areasinteress')->where('id', '=', $curso->areasinteress_id)->first();
?>

		<div class="panel panel-primary" data-collapsed="0">

			<div class="panel-heading">
				<div class="panel-title">

					<td class="padding-lg">
						<a href='/cursos'>
							<div class="label label-secondary">Curso</div>
						</a>
					</td>

				</div>

				<div class="panel-options">

				</div>
			</div>

			<div class="panel-body">

				{{ Form::open(array('url' => '/cursos/' . $curso->id, 'class' => 'form-horizontal form-groups-bordered')) }}
				{{ Form::hidden('_method', 'DELETE') }}


					<div class="form-group">
						<label for="curso" class="col-sm-3 control-label">Curso</label>
						<div class="col-sm-5">
											<input type="text" value="{{ $curso->curso }}" class="form-control" disabled>
						</div>
					</div>

					<div class="form-group">
						<label for="idioma" class="col-sm-3 control-label">Idioma</label>
						<div class="col-sm-5">
								<input type="text" value="{{ $idioma->idioma }}" class="form-control" disabled>
						</div>
					</div>

					<div class="form-group">
						<label for="areasinteres" class="col-sm-3 control-label">Area Interes</label>
							<div class="col-sm-5">
									<input type="text" value="{{ $areasinteres->areasinteres }}" class="form-control" disabled>
							</div>
					</div>

					<div class="form-group">
						<label for="importe" class="col-sm-3 control-label">Importe</label>
						<div class="col-sm-5">
								<input type="text" value="{{ $curso->importe }}" class="form-control" disabled>
							</div>
					</div>

					<div class="form-group">
						<label for="cuotas" class="col-sm-3 control-label">Cuotas</label>
						<div class="col-sm-5">
								<input type="text" value="{{ $curso->cuotas }}" class="form-control" disabled>
							</div>
					</div>



					<div class="form-group">
						<label for="duracion" class="col-sm-3 control-label">Duracion</label>
						<div class="col-sm-5">
							<input type="text" value="{{ $curso->duracion }}" class="form-control" disabled>
						</div>
					</div>

					<div class="form-group">
						<label for="cargahoraria" class="col-sm-3 control-label">Carga Horaria</label>
						<div class="col-sm-5">
								<input type="text" value="{{ $curso->cargahoraria }}" class="form-control" disabled>
						</div>
					</div>

					<div class="form-group">
						<label for="cargahoraria" class="col-sm-2 control-label">Metodologia</label>
						<div class="col-sm-10">
								{{ $curso->html_metodologia }}
						</div>
					</div>

					<div class="form-group">
						<label for="cargahoraria" class="col-sm-2 control-label">Plan de Estudio</label>
						<div class="col-sm-10">
							{{ $curso->html_objetivos }}
						</div>

					</div>









					<br>

							{{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
							{{ Form::close() }}


			</div>

		</div>




	<link rel="stylesheet" href="/assets/js/wysihtml5/bootstrap-wysihtml5.css"  id="style-resource-1">

	<script src="/assets/js/gsap/main-gsap.js" id="script-resource-1"></script>
	<script src="/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" id="script-resource-2"></script>
	<script src="/assets/js/bootstrap.min.js" id="script-resource-3"></script>
	<script src="/assets/js/joinable.js" id="script-resource-4"></script>
	<script src="/assets/js/resizeable.js" id="script-resource-5"></script>
	<script src="/assets/js/neon-api.js" id="script-resource-6"></script>
	<script src="/assets/js/wysihtml5/wysihtml5-0.4.0pre.min.js" id="script-resource-7"></script>
	<script src="/assets/js/wysihtml5/bootstrap-wysihtml5.js" id="script-resource-8"></script>
	<script src="/assets/js/ckeditor/ckeditor.js" id="script-resource-9"></script>
	<script src="/assets/js/ckeditor/adapters/jquery.js" id="script-resource-10"></script>
	<script src="/assets/js/neon-chat.js" id="script-resource-11"></script>
	<script src="/assets/js/neon-custom.js" id="script-resource-12"></script>
	<script src="/assets/js/neon-demo.js" id="script-resource-13"></script>


	<link rel="stylesheet" href="/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="/js/select2/select2.css"  id="style-resource-2">
	<link rel="stylesheet" href="/js/selectboxit/jquery.selectBoxIt.css"  id="style-resource-3">
	<link rel="stylesheet" href="/js/daterangepicker/daterangepicker-bs3.css"  id="style-resource-4">

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
