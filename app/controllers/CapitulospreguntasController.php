<?php

class CapitulospreguntasController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($cursos_id, $unidads_id, $capitulos_id)
	{

				$q = Input::get('q',"");

        $capitulospreguntas = DB::table('capitulospreguntas');
				if ($q<>"") {
						$capitulospreguntas = $capitulospreguntas->where('capitulospregunta', 'like', '%' . $q . '%');
				}
				if (is_numeric($capitulos_id)) {
						$capitulospreguntas = $capitulospreguntas->where('capitulos_id', '=', $capitulos_id);
				}

				$capitulospreguntas = $capitulospreguntas->paginate(10);

				$curso = Curso::find($cursos_id);
				$unidad = Unidad::find($unidads_id);
				$capitulo = Unidad::find($capitulos_id);


				$title = "Capitulos Preguntas";
        return View::make('capitulospreguntas.index',
													array('title' => $title, 'capitulospreguntas' => $capitulospreguntas,
													'curso' => $curso, 'unidad' => $unidad, 'capitulo' => $capitulo
				));



	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($cursos_id, $unidads_id, $capitulos_id)
	{
				$title = "Crear capitulospregunta";
				$curso = Curso::find($cursos_id);
				$unidad = Unidad::find($unidads_id);
				$capitulo = Capitulo::find($capitulos_id);

        return View::make('capitulospreguntas.create', array('title' => $title, 'curso' => $curso, 'unidad' => $unidad, 'capitulo' => $capitulo));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($cursos_id, $unidads_id, $capitulos_id)
	{


		$rules = [
			'capitulospregunta' => 'required',
		];


		if (! Capitulospregunta::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Capitulospregunta::$errors);

		}

		$capitulospregunta = new Capitulospregunta;

		$capitulospregunta->capitulospregunta = Input::get('capitulospregunta');
		$capitulospregunta->capitulos_id = $capitulos_id;

		$capitulospregunta->save();

		$title = "Capitulospreguntas";
		$curso = Curso::find($cursos_id);
		$unidad = Unidad::find($unidads_id);
		$capitulo = Capitulo::find($capitulos_id);

		$capitulospreguntas = DB::table('capitulospreguntas')->where('capitulos_id', '=', $capitulos_id)->paginate(10);

		return View::make('capitulospreguntas.index', array('title' => $title, 'capitulospreguntas' => $capitulospreguntas,
											'curso' => $curso, 'unidad' => $unidad, 'capitulo' => $capitulo));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($cursos_id, $unidads_id, $capitulos_id, $capitulospreguntas_id)
	{


		$capitulospregunta = Capitulospregunta::find($capitulospreguntas_id);
		$curso = Curso::find($cursos_id);
		$unidad = Unidad::find($unidads_id);
		$capitulo = Capitulo::find($capitulos_id);


		$title = "Ver Capitulo Pregunta";
		// show the view and pass the nerd to it

		return View::make('capitulospreguntas.show', array('title' => $title, 'capitulospregunta' => $capitulospregunta, 'unidad' => $unidad, 'curso' => $curso, 'capitulo' => $capitulo));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($cursos_id, $unidads_id, $capitulos_id, $capitulospreguntas_id)
	{
		$capitulospregunta = Capitulospregunta::find($capitulospreguntas_id);
		$title = "Editar Capitulospregunta";

		$curso = Curso::find($cursos_id);
		$unidad = Unidad::find($unidads_id);
		$capitulo = Capitulo::find($capitulos_id);

		return View::make('capitulospreguntas.edit', array('title' => $title, 'capitulospregunta' => $capitulospregunta, 'curso' => $curso, 'unidad' => $unidad, 'capitulo' => $capitulo));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($cursos_id, $unidads_id, $capitulos_id, $capitulospreguntas_id)
	{



		$capitulospregunta = Capitulospregunta::find($capitulospreguntas_id);

		$rules = [
				'capitulospregunta' => 'required',
		];

		if (! Capitulospregunta::isValid(Input::all(),$rules)) {
			return Redirect::back()->withInput()->withErrors(Capitulospregunta::$errors);
		}

		$capitulospregunta->capitulospregunta = Input::get('capitulospregunta');
		$capitulospregunta->save();

		$title = "Capitulo Preguntas";
		$curso = Curso::find($cursos_id);
		$unidad = Unidad::find($unidads_id);
		$capitulo = Capitulo::find($capitulos_id);

		$capitulospreguntas = DB::table('capitulospreguntas')->where('capitulos_id', '=', $capitulos_id)->paginate(10);
		return View::make('capitulospreguntas.index', array('title' => $title, 'capitulospreguntas' => $capitulospreguntas,
											'curso' => $curso, 'unidad' => $unidad, 'capitulo' => $capitulo));



	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($cursos_id, $unidads_id, $capitulos_id, $capitulospreguntas_id)
	{
		$capitulospregunta = Capitulospregunta::find($capitulospreguntas_id)->delete();

		$title = "Capitulos Preguntas";
		$curso = Curso::find($cursos_id);
		$unidad = Unidad::find($unidads_id);
		$capitulo = Capitulo::find($capitulos_id);

		$capitulospreguntas = DB::table('capitulospreguntas')->where('capitulos_id', '=', $capitulos_id)->paginate(10);

		return View::make('capitulospreguntas.index', array('title' => $title, 'capitulospreguntas' => $capitulospreguntas, 'curso' => $curso, 'unidad' => $unidad, 'capitulo' => $capitulo));


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
