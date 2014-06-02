<?php

class CapitulosrespuestasController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($cursos_id, $unidads_id, $capitulos_id, $capitulospreguntas_id)
	{

				$q = Input::get('q',"");

        $capitulosrespuestas = DB::table('capitulosrespuestas');
				if ($q<>"") {
						$capitulosrespuestas = $capitulosrespuestas->where('capitulosrespuesta', 'like', '%' . $q . '%');
				}
				if (is_numeric($capitulospreguntas_id)) {
						$capitulosrespuestas = $capitulosrespuestas->where('capitulospreguntas_id', '=', $capitulospreguntas_id);
				}

				$capitulosrespuestas = $capitulosrespuestas->paginate(10);

				$curso = Curso::find($cursos_id);
				$unidad = Unidad::find($unidads_id);
				$capitulo = Capitulo::find($capitulos_id);
				$capitulospregunta = Capitulospregunta::find($capitulospreguntas_id);


				$title = "Capitulos Respuestas";
        return View::make('capitulosrespuestas.index',
													array('title' => $title, 'capitulospregunta' => $capitulospregunta,
													'curso' => $curso, 'unidad' => $unidad, 'capitulo' => $capitulo, 'capitulosrespuestas' => $capitulosrespuestas
				));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($cursos_id, $unidads_id, $capitulos_id, $capitulospreguntas_id)
	{
				$title = "Crear Capitulos Respuesta";
				$curso = Curso::find($cursos_id);
				$unidad = Unidad::find($unidads_id);
				$capitulo = Capitulo::find($capitulos_id);
				$capitulospregunta = Capitulospregunta::find($capitulospreguntas_id);

        return View::make('capitulosrespuestas.create', array('title' => $title, 'curso' => $curso, 'unidad' => $unidad,
													'capitulo' => $capitulo, 'capitulospregunta' => $capitulospregunta));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($cursos_id, $unidads_id, $capitulos_id, $capitulospreguntas_id)
	{

		$rules = [
			'capitulosrespuesta' => 'required',
		];


		if (! Capitulosrespuesta::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Capitulosrespuesta::$errors);

		}

		$correcta = Input::get('correcta',"off");

		if ($correcta == "on") {
			$correcta = 1;
			DB::table('capitulosrespuestas')->where('correcta', 1)->update(array('correcta' => 0));
		} else {
			$correcta = 0;
		}

		$capitulosrespuesta = new Capitulosrespuesta;

		$capitulosrespuesta->capitulosrespuesta = Input::get('capitulosrespuesta');
		$capitulosrespuesta->capitulospreguntas_id = $capitulospreguntas_id;
		$capitulosrespuesta->correcta = $correcta;

		$capitulosrespuesta->save();

		$title = "Capitulos Respuestas";
		$curso = Curso::find($cursos_id);
		$unidad = Unidad::find($unidads_id);
		$capitulo = Capitulo::find($capitulos_id);
		$capitulospregunta = Capitulospregunta::find($capitulospreguntas_id);


		$capitulosrespuestas = DB::table('capitulosrespuestas')->where('capitulospreguntas_id', '=', $capitulospreguntas_id)->paginate(10);

		return View::make('capitulosrespuestas.index', array('title' => $title, 'capitulospregunta' => $capitulospregunta,
											'curso' => $curso, 'unidad' => $unidad, 'capitulo' => $capitulo, 'capitulosrespuestas' => $capitulosrespuestas));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($cursos_id, $unidads_id, $capitulos_id, $capitulospreguntas_id, $capitulosrespuestas_id)
	{


		$capitulosrespuesta = Capitulosrespuesta::find($capitulosrespuestas_id);
		$curso = Curso::find($cursos_id);
		$unidad = Unidad::find($unidads_id);
		$capitulo = Capitulo::find($capitulos_id);
		$capitulospregunta = Capitulospregunta::find($capitulospreguntas_id);


		$title = "Ver Capitulo Respuesta";
		// show the view and pass the nerd to it

		return View::make('capitulosrespuestas.show', array('title' => $title, 'capitulospregunta' => $capitulospregunta,
											'unidad' => $unidad, 'curso' => $curso, 'capitulo' => $capitulo, 'capitulosrespuesta' => $capitulosrespuesta));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($cursos_id, $unidads_id, $capitulos_id, $capitulospreguntas_id, $capitulosrespuestas_id)
	{
		$capitulosrespuesta = Capitulosrespuesta::find($capitulosrespuestas_id);
		$title = "Editar Capitulos Respuesta";

		$curso = Curso::find($cursos_id);
		$unidad = Unidad::find($unidads_id);
		$capitulo = Capitulo::find($capitulos_id);
		$capitulospregunta = Capitulospregunta::find($capitulospreguntas_id);

		return View::make('capitulosrespuestas.edit', array('title' => $title, 'capitulospregunta' => $capitulospregunta, 'curso' => $curso, 'unidad' => $unidad, 'capitulo' => $capitulo, 'capitulosrespuesta' => $capitulosrespuesta));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($cursos_id, $unidads_id, $capitulos_id, $capitulospreguntas_id, $capitulosrespuestas_id)
	{



		$capitulosrespuesta = Capitulosrespuesta::find($capitulosrespuestas_id);

		$rules = [
				'capitulosrespuesta' => 'required',
		];

		if (! Capitulosrespuesta::isValid(Input::all(),$rules)) {
			return Redirect::back()->withInput()->withErrors(Capitulosrespuesta::$errors);
		}

		$correcta = Input::get('correcta',"off");

		if ($correcta == "on") {
			$correcta = 1;
			DB::table('capitulosrespuestas')->where('correcta', 1)->update(array('correcta' => 0));
		} else {
			$correcta = 0;
		}

		$capitulosrespuesta->capitulosrespuesta = Input::get('capitulosrespuesta');
		$capitulosrespuesta->capitulospreguntas_id = $capitulospreguntas_id;
		$capitulosrespuesta->correcta = $correcta;

		$capitulosrespuesta->save();

		$title = "Capitulos Respuestas";
		$curso = Curso::find($cursos_id);
		$unidad = Unidad::find($unidads_id);
		$capitulo = Capitulo::find($capitulos_id);
		$capitulospregunta = Capitulospregunta::find($capitulospreguntas_id);


		$capitulosrespuestas = DB::table('capitulosrespuestas')->where('capitulospreguntas_id', '=', $capitulospreguntas_id)->paginate(10);

		return View::make('capitulosrespuestas.index', array('title' => $title, 'capitulospregunta' => $capitulospregunta,
											'curso' => $curso, 'unidad' => $unidad, 'capitulo' => $capitulo, 'capitulosrespuestas' => $capitulosrespuestas));



	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($cursos_id, $unidads_id, $capitulos_id, $capitulospreguntas_id, $capitulosrespuestas_id)
	{
		$capitulosrespuestas_id = Capitulosrespuesta::find($capitulosrespuestas_id)->delete();

		$title = "Capitulos Respuestas";
		$curso = Curso::find($cursos_id);
		$unidad = Unidad::find($unidads_id);
		$capitulo = Capitulo::find($capitulos_id);
		$capitulospregunta = Capitulospregunta::find($capitulospreguntas_id);

		$capitulosrespuestas = DB::table('capitulosrespuestas')->where('capitulospreguntas_id', '=', $capitulospreguntas_id)->paginate(10);

		return View::make('capitulosrespuestas.index', array('title' => $title, 'capitulospregunta' => $capitulospregunta, 'curso' => $curso,
											'unidad' => $unidad, 'capitulo' => $capitulo, 'capitulosrespuestas' => $capitulosrespuestas));

	}

   public function search(){

        $term = Input::get('term');
        $capitulospreguntas = DB::table('capitulospreguntas')->where('capitulospregunta', 'like', '%' . $term . '%')->get();
        $adevol = array();
        if (count($capitulospreguntas) > 0) {
            foreach ($capitulospreguntas as $capitulospregunta)
                {
                    $adevol[] = array(
                        'id' => $capitulospregunta->id,
                        'value' => $capitulospregunta->capitulospregunta,
                    );
            }
        } else {
                    $adevol[] = array(
                        'id' => 0,
                        'value' => 'no hay coincidencias para ' .  $term
                    );
        }
        return json_encode($adevol);
    }
}
