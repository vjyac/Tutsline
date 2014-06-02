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

				{{ Form::open(array('url' => '/estados/' . $estado->id, 'class' => 'form-horizontal form-groups-bordered')) }}
				{{ Form::hidden('_method', 'DELETE') }}


					<div class="form-group">
						<label for="estado" class="col-sm-3 control-label">estado</label>
						<div class="col-sm-5">

								<input type="text" value="{{ $estado->estado }}" class="form-control" disabled>
						</div>
					</div>

					<div class="form-group">
						<label for="estado" class="col-sm-3 control-label">estado</label>
						<div class="col-sm-5">
								<?php
										$pais = Pais::find($estado->paiss_id);
								?>
								<input type="text" value="{{ $pais->pais }}" class="form-control" disabled>
									<br>

						<?php if ($errors->first('estado')) { ?>
									<span class="badge bg-danger">{{ $errors->first('estado') }}</span>
						<?php } ?>



						</div>
					</div>

					<br>

					{{ Form::submit('Eliminar', array('class' => 'btn btn-warning')) }}
					{{ Form::close() }}


			</div>

		</div>



@stop
