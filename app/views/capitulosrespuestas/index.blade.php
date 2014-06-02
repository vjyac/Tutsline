@extends('layouts.default')

@section('content')

<div class="main-content">

		<div class="container">
				<div class="row">
						<div class="col-md-12">
					<div class="panel-heading">
						<div class="panel-title">

					<div class="panel-heading">
						<div class="panel-title">
								<td class="padding-lg">
									<a href='/cursos/{{$curso->id}}'>
										<div class="label label-secondary">Curso: {{ $curso->curso }}</div>
									</a>
									<a href='/cursos/{{$curso->id}}/unidads'>
										<div class="label label-secondary">U: {{ $unidad->unidad }}</div>
									</a>
										<a href='/cursos/{{$curso->id}}/unidads/{{$unidad->id}}/capitulos'>
											<div class="label label-secondary">C: {{ $capitulo->capitulo }}</div>
										</a>
										<a href='/cursos/{{$curso->id}}/unidads/{{$unidad->id}}/capitulos/{{$capitulo->id}}/capitulospreguntas'>
											<div class="label label-secondary">P: {{ $capitulospregunta->capitulospregunta }}</div>
										</a>
												<a href='/cursos/{{$curso->id}}/unidads/{{$unidad->id}}/capitulos/{{$capitulo->id}}/capitulospreguntas/{{$capitulospregunta->id}}/capitulosrespuestas'>
													<div class="label label-secondary">Respuestas</div>
												</a>
								</td>
						</div>

						</div>
						<div class="panel-options">
							<a href='/cursos/{{$curso->id}}/unidads/{{$unidad->id}}/capitulos/{{$capitulo->id}}/capitulospreguntas/{{$capitulospregunta->id}}/capitulosrespuestas/create' class='btn btn-success btn-sm btn-icon icon-left'>
								<i class='entypo-plus'></i>
								Nuevo
							</a>
						</div>
					</div>

	<?php
			if (count($capitulosrespuestas)>0 )  {
	?>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Capitulo Respuestas</th>
					<th>Correcta</th>
					<th>Acción</th>
				</tr>
			</thead>

				<tbody>

												<?php



											foreach ($capitulosrespuestas as $capitulosrespuesta)
											{

													echo "<tr>";
															echo "<td>" . $capitulosrespuesta->capitulosrespuesta . "</td>";
															echo "<td>";

															if ($capitulosrespuesta->correcta) {
																		echo '<div class="alert alert-success">
																						<i class="entypo-check"></i> Correcta
																					</div>';
															} else {
																		echo '<div class="alert alert-danger">
																						<i class="entypo-cancel"></i> Incorrecta
																					</div>';
															}




															echo "</td>";
															echo "<td>" ;
													echo "
														<a href='/cursos/" . $curso->id . "/unidads/" . $unidad->id . "/capitulos/" . $capitulo->id .
														"/capitulospreguntas/" . $capitulospregunta->id . "/capitulosrespuestas/" . $capitulosrespuesta->id . "/edit' class='btn btn-warning btn-sm btn-icon icon-left'>
															<i class='entypo-pencil'></i>
															Edit
														</a>

														<a href='/cursos/" . $curso->id . "/unidads/" . $unidad->id . "/capitulos/" . $capitulo->id .
														"/capitulospreguntas/" . $capitulospregunta->id ."/capitulosrespuestas/" . $capitulosrespuesta->id . "' class='btn btn-info btn-sm btn-icon icon-left'>
															<i class='entypo-info'></i>
															Ver
														</a>

														";

													print "</td>";
													print "</tr>";

											}


												?>


									</tbody>
								</table>

<div class="panel-heading">
	<div class="panel-title">
	</div>

	<div class="panel-options">
			{{ $capitulosrespuestas->links()}}
	</div>
</div>






<?php

		} else {
			echo "No hay nada que mostrar...";

		}


	?>

</div>
</div>
</div>
</div>


@stop
