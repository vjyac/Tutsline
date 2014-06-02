@extends('layouts.default')

@section('content')



<div class="main-content">

		<div class="container">
				<div class="row">
						<div class="col-md-12">
					<div class="panel-heading">
						<div class="panel-title">
							<h3>{{ $title }}
								<a href='/areasinteress'>
								<i class='entypo-ccw'></i>
								</a>
							</h3>
						</div>
						<div class="panel-options">
							<a href='/areasinteress/create' class='btn btn-success btn-sm btn-icon icon-left'>
								<i class='entypo-plus'></i>
								Nuevo
							</a>
						</div>
					</div>
			<?php
					if (count($areasinteress)>0 )  {
			?>


		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Id</th>
					<th>Areas Interes</th>
					<th>Idioma</th>
					<th>Acción</th>
				</tr>
			</thead>

				<tbody>

												<?php
											foreach ($areasinteress as $areasinteres)
											{

													$idioma = DB::table('idiomas')->where('id', '=', $areasinteres->idiomas_id)->first();

													echo "<tr>";
											        echo "<td>" . $areasinteres->id . "</td>";
															echo "<td>" . $areasinteres->areasinteres . "</td>";
											        echo "<td>" . $idioma->idioma . "</td>";
											        echo "<td>" ;


													echo "
														<a href='/areasinteress/" . $areasinteres->id . "/edit' class='btn btn-warning btn-sm btn-icon icon-left'>
															<i class='entypo-pencil'></i>
															Edit
														</a>

														<a href='/areasinteress/" . $areasinteres->id . "' class='btn btn-info btn-sm btn-icon icon-left'>
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
			{{ $areasinteress->links()}}
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
