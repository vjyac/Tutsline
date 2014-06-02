@extends('layouts.default')

@section('content')



<div class="main-content">

		<div class="container">
				<div class="row">
						<div class="col-md-12">
					<div class="panel-heading">
						<div class="panel-title">

								<td class="padding-lg">
									<a href='/cursos'>
										<div class="label label-secondary">Cursos</div>
									</a>
								</td>

						</div>
						<div class="panel-options">
							<a href='/cursos/create' class='btn btn-success btn-sm btn-icon icon-left'>
								<i class='entypo-plus'></i>
								Nuevo
							</a>
						</div>
					</div>
			<?php
					if (count($cursos)>0 )  {
			?>


		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Curso</th>
					<th>Idioma</th>
					<th>Area Interes</th>
					<th>Duracion</th>
					<th>Carga Horaria</th>
					<th>Importe</th>
					<th>Acción</th>
				</tr>
			</thead>

				<tbody>

												<?php
											foreach ($cursos as $curso)
											{

													$idioma = DB::table('idiomas')->where('id', '=', $curso->idiomas_id)->first();
													$areasinteres = DB::table('areasinteress')->where('id', '=', $curso->areasinteress_id)->first();

													echo "<tr>";
															echo "<td>" . $curso->curso . "</td>";
											        echo "<td>" . $idioma->idioma . "</td>";
															echo "<td>" . $areasinteres->areasinteres . "</td>";
															echo "<td>" . $curso->duracion . "</td>";
															echo "<td>" . $curso->cargahoraria . "</td>";
															echo "<td>" . $curso->importe . "</td>";
											        echo "<td>" ;

													echo "
														<a href='/cursos/" . $curso->id . "/edit' class='btn btn-warning btn-sm btn-icon icon-left'>
															<i class='entypo-pencil'></i>
															Edit
														</a>

														<a href='/cursos/" . $curso->id . "' class='btn btn-info btn-sm btn-icon icon-left'>
															<i class='entypo-info'></i>
															Ver
														</a>

														<a href='/cursos/" . $curso->id . "/unidads' class='btn btn-orange btn-sm btn-icon icon-left'>
															<i class='entypo-book-open'></i>
															Unidades
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
			{{ $cursos->links()}}
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
