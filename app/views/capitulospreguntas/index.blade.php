@extends('layouts.default')

@section('content')

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
							<a href='/cursos/{{$curso->id}}/unidads/{{$unidad->id}}/capitulos/{{$capitulo->id}}/capitulospreguntas/create' class='btn btn-success btn-sm btn-icon icon-left'>
								<i class='entypo-plus'></i>
								Nuevo
							</a>
						</div>
					</div>

	<?php
			if (count($capitulospreguntas)>0 )  {
	?>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Capitulo pregunta</th>
					<th>Acción</th>
				</tr>
			</thead>

				<tbody>

												<?php



											foreach ($capitulospreguntas as $capitulospregunta)
											{

													echo "<tr>";
															echo "<td>" . $capitulospregunta->capitulospregunta . "</td>";
															echo "<td>" ;
													echo "
														<a href='/cursos/" . $curso->id . "/unidads/" . $unidad->id . "/capitulos/" . $capitulo->id . "/capitulospreguntas/" . $capitulospregunta->id . "/edit' class='btn btn-warning btn-sm btn-icon icon-left'>
															<i class='entypo-pencil'></i>
															Edit
														</a>

														<a href='/cursos/" . $curso->id . "/unidads/" . $unidad->id . "/capitulos/" . $capitulo->id . "/capitulospreguntas/" . $capitulospregunta->id . "' class='btn btn-info btn-sm btn-icon icon-left'>
															<i class='entypo-info'></i>
															Ver
														</a>


														<a href='/cursos/" . $curso->id . "/unidads/" . $unidad->id . "/capitulos/" . $capitulo->id . "/capitulospreguntas/" . $capitulospregunta->id . "/capitulosrespuestas' class='btn btn-orange btn-sm btn-icon icon-left'>
															<i class='entypo-check'></i>
															Capitulos Respuestas
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
			{{ $capitulospreguntas->links()}}
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
