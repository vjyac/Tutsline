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
											<div class="label label-secondary">Capitulos</div>
										</a>
								</td>


						</div>
						<div class="panel-options">
							<a href='/cursos/{{$curso->id}}/unidads/{{$unidad->id}}/capitulos/create' class='btn btn-success btn-sm btn-icon icon-left'>
								<i class='entypo-plus'></i>
								Nuevo
							</a>

						</div>
					</div>

	<?php
			if (count($capitulos)>0 )  {
	?>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Numero</th>
					<th>capitulo</th>
					<th>Acción</th>
				</tr>
			</thead>

				<tbody>

												<?php



											foreach ($capitulos as $capitulo)
											{

													echo "<tr>";
															echo "<td>" . $capitulo->numero . "</td>";
															echo "<td>" . $capitulo->capitulo . "</td>";
															echo "<td>" ;


													echo "
														<a href='/cursos/" . $curso->id . "/unidads/" . $unidad->id . "/capitulos/" . $capitulo->id . "/edit' class='btn btn-warning btn-sm btn-icon icon-left'>
															<i class='entypo-pencil'></i>
															Edit
														</a>

														<a href='/cursos/" . $curso->id . "/unidads/" . $unidad->id . "/capitulos/" . $capitulo->id . "' class='btn btn-info btn-sm btn-icon icon-left'>
															<i class='entypo-info'></i>
															Ver
														</a>


														<a href='/cursos/" . $curso->id . "/unidads/" . $unidad->id . "/capitulos/" . $capitulo->id . "/capitulospreguntas' class='btn btn-orange btn-sm btn-icon icon-left'>
															<i class='entypo-help'></i>
															Capitulos Preguntas
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
			{{ $capitulos->links()}}
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
