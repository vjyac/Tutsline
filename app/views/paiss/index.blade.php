@extends('layouts.default')

@section('content')



<div class="main-content">

		<div class="container">
				<div class="row">
						<div class="col-md-12">



					<div class="panel-heading">
						<div class="panel-title">

							<h3>{{ $title }}
								<a href='/paiss'>
								<i class='entypo-ccw'></i>
								</a>
							</h3>


						</div>

						<div class="panel-options">
							<a href='/paiss/create' class='btn btn-success btn-sm btn-icon icon-left'>
								<i class='entypo-plus'></i>
								Nuevo
							</a>

						</div>
					</div>




	<?php


		if (count($paiss)>0 )  {


?>







		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Pais</th>
					<th>Acción</th>
				</tr>
			</thead>

				<tbody>

												<?php



											foreach ($paiss as $pais)
											{

													echo "<tr>";
											        echo "<td>" . $pais->id . "</td>";
											        echo "<td>" . $pais->pais . "</td>";
											        echo "<td>" ;


													echo "
														<a href='/paiss/" . $pais->id . "/edit' class='btn btn-warning btn-sm btn-icon icon-left'>
															<i class='entypo-pencil'></i>
															Edit
														</a>

														<a href='/paiss/" . $pais->id . "' class='btn btn-info btn-sm btn-icon icon-left'>
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
			{{ $paiss->links()}}
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
