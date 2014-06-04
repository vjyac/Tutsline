<?php

class CapitulosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($cursos_id, $unidads_id)
	{

				$q = Input::get('q',"");

        $capitulos = DB::table('capitulos');
				if ($q<>"") {
						$capitulos = $capitulos->where('capitulo', 'like', '%' . $q . '%');
				}
				if (is_numeric($unidads_id)) {
						$capitulos = $capitulos->where('unidads_id', '=', $unidads_id);
				}

				$capitulos = $capitulos->paginate(10);

				$curso = Curso::find($cursos_id);
				$unidad = Unidad::find($unidads_id);

				$title = "Capitulos";
        return View::make('capitulos.index', array('title' => $title, 'capitulos' => $capitulos, 'curso' => $curso, 'unidad' => $unidad));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($cursos_id, $unidads_id)
	{
				$title = "Crear capitulo";
				$curso = Curso::find($cursos_id);
				$unidad = Unidad::find($unidads_id);
        return View::make('capitulos.create', array('title' => $title, 'curso' => $curso, 'unidad' => $unidad));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($cursos_id, $unidads_id)
	{


		$rules = [
			'capitulo' => 'required',
			'numero' => 'required',
		];


		if (! Capitulo::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Capitulo::$errors);

		}

		$capitulo = new Capitulo;

		$capitulo->capitulo = Input::get('capitulo');
		$capitulo->numero = Input::get('numero');
		$capitulo->html_contenido = Input::get('html_contenido');
		$capitulo->unidads_id = $unidads_id;

		$capitulo->save();

		$title = "Capitulos";
		$curso = Curso::find($cursos_id);
		$unidad = Unidad::find($unidads_id);

		$capitulos = DB::table('capitulos')->where('unidads_id', '=', $unidads_id)->paginate(10);

		return View::make('capitulos.index', array('title' => $title, 'capitulos' => $capitulos, 'curso' => $curso, 'unidad' => $unidad));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($cursos_id, $unidads_id, $capitulos_id)
	{


		$capitulo = Capitulo::find($capitulos_id);
		$curso = Curso::find($cursos_id);
		$unidad = Unidad::find($unidads_id);


		$title = "Ver capitulo";
		// show the view and pass the nerd to it
		return View::make('capitulos.show', array('title' => $title, 'capitulo' => $capitulo, 'unidad' => $unidad, 'curso' => $curso));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($cursos_id, $unidads_id, $capitulos_id)
	{
		$capitulo = Capitulo::find($capitulos_id);
		$title = "Editar Capitulo";

		$curso = Curso::find($cursos_id);
		$unidad = Unidad::find($unidads_id);

		return View::make('capitulos.edit', array('title' => $title, 'capitulo' => $capitulo, 'curso' => $curso, 'unidad' => $unidad));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($cursos_id, $unidads_id, $capitulos_id)
	{


		$capitulo = Capitulo::find($capitulos_id);

		$rules = [
				'capitulo' => 'required|unique:capitulos,capitulo,' . $capitulos_id,
				'numero' => 'required|numeric',
		];

		if (! Capitulo::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Capitulo::$errors);

		}

		$capitulo->capitulo = Input::get('capitulo');
		$capitulo->numero = Input::get('numero');
		$capitulo->html_contenido = Input::get('html_contenido');
		$capitulo->save();

		$title = "Capitulos";
		$curso = Curso::find($cursos_id);
		$unidad = Unidad::find($unidads_id);

		$capitulos = DB::table('capitulos')->where('unidads_id', '=', $unidads_id)->paginate(10);
		return View::make('capitulos.index', array('title' => $title, 'capitulos' => $capitulos, 'curso' => $curso, 'unidad' => $unidad));



	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($cursos_id, $unidads_id, $capitulos_id)
	{
		$capitulo = Capitulo::find($capitulos_id)->delete();

		$title = "Capitulos";
		$curso = Curso::find($cursos_id);
		$unidad = Unidad::find($unidads_id);
		$capitulos = DB::table('capitulos')->where('unidads_id', '=', $unidads_id)->paginate(10);

		return View::make('capitulos.index', array('title' => $title, 'capitulos' => $capitulos, 'curso' => $curso, 'unidad' => $unidad));


	}

   public function search(){

        $term = Input::get('term');
        $capitulos = DB::table('capitulos')->where('capitulo', 'like', '%' . $term . '%')->get();
        $adevol = array();
        if (count($capitulos) > 0) {
            foreach ($capitulos as $capitulo)
                {
                    $adevol[] = array(
                        'id' => $capitulo->id,
                        'value' => $capitulo->capitulo,
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
