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
									<div class="label label-secondary">Unidades</div>
								</a>
							</td>


						</div>
						<div class="panel-options">
							<a href='/cursos/{{$curso->id}}/unidads/create' class='btn btn-success btn-sm btn-icon icon-left'>
								<i class='entypo-plus'></i>
								Nuevo
							</a>

						</div>
					</div>

	<?php
			if (count($unidads)>0 )  {
	?>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Numero</th>
					<th>unidad</th>
					<th>Acción</th>
				</tr>
			</thead>

				<tbody>

												<?php



											foreach ($unidads as $unidad)
											{

													echo "<tr>";
											        echo "<td>" . $unidad->numero . "</td>";
											        echo "<td>" . $unidad->unidad . "</td>";
											        echo "<td>" ;


													echo "
														<a href='/cursos/" . $curso->id . "/unidads/" . $unidad->id . "/edit' class='btn btn-warning btn-sm btn-icon icon-left'>
															<i class='entypo-pencil'></i>
															Edit
														</a>

														<a href='/cursos/" . $curso->id . "/unidads/" . $unidad->id . "' class='btn btn-info btn-sm btn-icon icon-left'>
															<i class='entypo-info'></i>
															Ver
														</a>


														<a href='/cursos/" . $curso->id . "/unidads/" . $unidad->id . "/capitulos' class='btn btn-orange btn-sm btn-icon icon-left'>
															<i class='entypo-list'></i>
															Capitulos
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
			{{ $unidads->links()}}
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
