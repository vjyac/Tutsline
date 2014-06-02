@extends('layouts.default')

@section('content')



<div class="main-content">

		<div class="container">
				<div class="row">
						<div class="col-md-12">
					<div class="panel-heading">
						<div class="panel-title">
							<h3>{{ $title }}
								<a href='/ciudads'>
								<i class='entypo-ccw'></i>
								</a>
							</h3>
						</div>
						<div class="panel-options">
							<a href='/ciudads/create' class='btn btn-success btn-sm btn-icon icon-left'>
								<i class='entypo-plus'></i>
								Nuevo
							</a>
						</div>
					</div>
			<?php
					if (count($ciudads)>0 )  {
			?>


		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Ciudad</th>
					<th>Estado</th>
					<th>Pais</th>
					<th>Acción</th>
				</tr>
			</thead>

				<tbody>

												<?php
											foreach ($ciudads as $ciudad)
											{

													$estado = DB::table('estados')->where('id', '=', $ciudad->estados_id)->first();
													$pais = DB::table('paiss')->where('id', '=', $estado->paiss_id)->first();

													echo "<tr>";
											        echo "<td>" . $ciudad->id . "</td>";
															echo "<td>" . $ciudad->ciudad . "</td>";
											        echo "<td>" . $estado->estado . "</td>";
															echo "<td>" . $pais->pais . "</td>";
											        echo "<td>" ;


													echo "
														<a href='/ciudads/" . $ciudad->id . "/edit' class='btn btn-warning btn-sm btn-icon icon-left'>
															<i class='entypo-pencil'></i>
															Edit
														</a>

														<a href='/ciudads/" . $ciudad->id . "' class='btn btn-info btn-sm btn-icon icon-left'>
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
			{{ $ciudads->links()}}
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
