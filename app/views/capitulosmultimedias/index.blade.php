@extends('layouts.default')

@section('content')

    {{ HTML::style('dropzone/css/basic.css') }}
    {{ HTML::style('dropzone/css/dropzone.css') }}

	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    {{ HTML::script('dropzone/dropzone.js') }}






<div class="main-content">

    <div class="container">
        <div class="row">
            <div class="col-md-12">


    <div class="panel panel-primary" data-collapsed="0">

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

        </div>
      </div>

      <div class="panel-body">


      {{ Form::open(array('route' => 'capitulosmultimedias.store', 'class'=>'dropzone', 'id'=>'my-dropzone', 'enctype' => 'multipart/form-data')) }}
        {{ Form::hidden('capitulos_id' , $capitulos_id, array('id' =>'capitulos_id')) }}

            <div class="fallback">
                <input name="file" type="file" multiple />
            </div>

        </div>
      {{ Form::close() }}





      </div>

    </div>























	<?php


		if (count($capitulosmultimedias)>0 )  {

	?>

							<div class="col-sm-6">
							<section class="panel panel-default">


								<div class="table-responsive">
									<table class="table table-striped b-t b-light text-sm">
										<thead>
											<tr>
												<th>Fotos</th>
												<th>Accion</th>
											</tr>
										</thead>
										<tbody>

												<?php



											foreach ($capitulosmultimedias as $capitulosmultimedia)
											{

													echo "<tr>";
											        echo "<td>";

  													echo "<div class='col-md-6'>";

													echo "<img src='/uploads/small/" . $capitulosmultimedias->file . "' class='img-responsive' width='320' alt='Responsive image'>";

													echo "</div>";

											        echo "</td>";
											        echo "<td>" ;

													echo "<a href='/multimedias/" . $capitulosmultimedias->id . "/delete' class='btn btn-xs btn-danger'>Borrar</a> ";


													print "</td>";
													print "</tr>";


											}


												?>


									</tbody>
								</table>
							</div>
						</section>
						</div>
<?php

		}


	?>

		</div>
	</section>
</div>


</body>

<script language="javascript">


// myDropzone is the configuration for the element that has an id attribute
  // with the value my-dropzone (or myDropzone)
  Dropzone.options.myDropzone = {
    init: function() {
      this.on("addedfile", function(file) {

        var removeButton = Dropzone.createElement('<a class="dz-remove">Remove file</a>');
        var _this = this;

        removeButton.addEventListener("click", function(e) {
          e.preventDefault();
          e.stopPropagation();

           var fileInfo = new Array();
           fileInfo['name']=file.name;

            $.ajax({
                type: "POST",
                url: "{{ url('/delete-image') }}",
                data: {file: file.name},
                beforeSend: function () {
                    // before send
                },
                success: function (response) {

                    if (response == 'success')
                       alert('deleted');
                },
                error: function () {
                    alert("error");
                }
            });


          _this.removeFile(file);

          // If you want to the delete the file on the server as well,
          // you can do the AJAX request here.
        });


        // Add the button to the file preview element.
        file.previewElement.appendChild(removeButton);
      });
    }
  };

</script>

@stop
