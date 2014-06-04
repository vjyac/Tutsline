<?php

class CapitulosmultimediasController extends BaseController {



/**
* Display a listing of the resource.
*
* @return Response
*/
public function index($cursos_id, $unidads_id, $capitulos_id)
{

			$q = Input::get('q',"");

			$capitulosmultimedias = DB::table('capitulosmultimedias');
			$capitulosmultimedias = $capitulosmultimedias->where('capitulos_id', '=', $capitulos_id);
			if ($q<>"") {
				$capitulosmultimedias = $capitulosmultimedias->where('capitulosmultimedia', 'like', '%' . $q . '%');
			}
			$capitulosmultimedias = $capitulosmultimedias->paginate(20);

			$curso = Curso::find($cursos_id);
			$unidad = Unidad::find($unidads_id);
			$capitulo = Unidad::find($capitulos_id);


			$title = "Capitulos Multimedias";
			return View::make('capitulosmultimedias.index',
												array('title' => $title, 'capitulosmultimedias' => $capitulosmultimedias,
												'curso' => $curso, 'unidad' => $unidad, 'capitulo' => $capitulo, 'capitulos_id' => $capitulos_id
			));


}


/**
* Display a listing of the resource.
*
* @return Response
*/


	public function store()
	{


	    $file = Input::file('file');
	    $capitulos_id = Input::get('capitulos_id');

			$tipo_archivo = "archivo";

	    if($file) {

				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();

				$es_imagen = false;



					switch ($extension) {
					    case "jpg":
									$destinationPath = public_path() . '/multimedias/capitulos/imagenes/original/';
									$destinationPath_big = public_path() . '/multimedias/capitulos/imagenes/big/';
									$destinationPath_small = public_path() . '/multimedias/capitulos/imagenes/small/';
									$es_imagen = true;
									$tipo_archivo = "imagen";
					        break;
					    case "png":
									$destinationPath = public_path() . '/multimedias/capitulos/imagenes/original/';
									$destinationPath_big = public_path() . '/multimedias/capitulos/imagenes/big/';
									$destinationPath_small = public_path() . '/multimedias/capitulos/imagenes/small/';
									$es_imagen = true;
									$tipo_archivo = "imagen";
					        break;
					    case "mp4":
									$destinationPath = public_path() . '/multimedias/capitulos/videos/';
									$tipo_archivo = "video";
					        break;
							case "mp3":
									$destinationPath = public_path() . '/multimedias/capitulos/audios/';
									$tipo_archivo = "audio";
									break;
							case "pdf":
									$destinationPath = public_path() . '/multimedias/capitulos/pdfs/';
									$tipo_archivo = "pdf";
									break;
					}


	        $upload_success = Input::file('file')->move($destinationPath, $filename);



	        if ($upload_success) {

							if ($es_imagen) {
									// resizing an uploaded file
									$image = Image::make($destinationPath . $filename)->resize(800, null, true)->save($destinationPath_big . $filename);
									$image = Image::make($destinationPath . $filename)->resize(150, null, true)->save($destinationPath_small . $filename);
									File::delete($destinationPath . $filename);
							}


	            $capitulosmultimedia = new Capitulosmultimedia;

							$capitulosmultimedia->capitulosmultimedia= $extension;
							$capitulosmultimedia->tipo = $tipo_archivo;
	            $capitulosmultimedia->file = $filename;
	            $capitulosmultimedia->capitulos_id = $capitulos_id;
	            $capitulosmultimedia->save();

	            return Response::json('success', 200);
	        } else {
	            return Response::json('error', 400);
	        }
	    }

	}

	public function delete($id)
	{

	    // $destinationPath = public_path() . '/uploads/';
	    $destinationPath_big = public_path() . '/multimedias/capitulos/imagenes/big/';
	    $destinationPath_small = public_path() . '/multimedias/capitulos/imagenes/small/';

		$capitulosmultimedia = Capitulosmultimedia::find($id);
		$id = $capitulosmultimedia->id;
		$filename = $capitulosmultimedia->file;

		$capitulosmultimedia->delete();

	    // File::delete($destinationPath . $filename);
	    File::delete($destinationPath_big . $filename);
	    File::delete($destinationPath_small . $filename);



		return Redirect::to('/ordens/' . $id . '/pictures');
	}




}
