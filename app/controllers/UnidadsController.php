<?php

class UnidadsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{

				$q = Input::get('q',"");

        $unidads = DB::table('unidads');
				if ($q<>"") {
						$unidads = $unidads->where('unidad', 'like', '%' . $q . '%');
				}
				if (is_numeric($id)) {
						$unidads = $unidads->where('cursos_id', '=', $id);
				}

				$unidads = $unidads->paginate(10);

				$curso = Curso::find($id);

				$title = "Unidades";
        return View::make('unidads.index', array('title' => $title, 'unidads' => $unidads, 'curso' => $curso));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
				$title = "Crear Unidad";
				$curso = Curso::find($id);
        return View::make('unidads.create', array('title' => $title, 'curso' => $curso));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{


		$rules = [
			'unidad' => 'required',
		];


		if (! Unidad::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Unidad::$errors);

		}

		$unidad = new unidad;

		$unidad->unidad = Input::get('unidad');
		$unidad->numero = Input::get('numero');
		$unidad->cursos_id = $id;

		$unidad->save();

		$title = "Unidades";
		$curso = Curso::find($id);
		$unidads = DB::table('unidads')->where('cursos_id', '=', $id)->paginate(10);
		return View::make('unidads.index', array('title' => $title, 'unidads' => $unidads, 'curso' => $curso));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($cursos_id, $unidads_id)
	{


		$unidad = Unidad::find($unidads_id);
		$curso = Curso::find($cursos_id);


		$title = "Ver unidad";
		// show the view and pass the nerd to it
		return View::make('unidads.show', array('title' => $title, 'unidad' => $unidad, 'curso' => $curso));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($cursos_id, $unidads_id)
	{
		$unidad = unidad::find($unidads_id);
		$title = "Editar unidad";

		$curso = Curso::find($cursos_id);

		return View::make('unidads.edit', array('title' => $title, 'unidad' => $unidad, 'curso' => $curso));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($cursos_id, $unidads_id)
	{


		$unidad = unidad::find($unidads_id);

		$rules = [
				'unidad' => 'required|unique:unidads,unidad,' . $unidads_id,
				'numero' => 'required|numeric',
		];

		if (! Unidad::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Unidad::$errors);

		}

		$unidad->unidad = Input::get('unidad');
		$unidad->numero = Input::get('numero');
		$unidad->save();

		$title = "Unidades";
		$curso = Curso::find($cursos_id);
		$unidads = DB::table('unidads')->where('cursos_id', '=', $cursos_id)->paginate(10);
		return View::make('unidads.index', array('title' => $title, 'unidads' => $unidads, 'curso' => $curso));



	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($cursos_id, $unidads_id)
	{
		$unidad = unidad::find($unidads_id)->delete();

		$title = "Unidades";
		$curso = Curso::find($cursos_id);
		$unidads = DB::table('unidads')->where('cursos_id', '=', $cursos_id)->paginate(10);
		return View::make('unidads.index', array('title' => $title, 'unidads' => $unidads, 'curso' => $curso));


	}

   public function search(){

        $term = Input::get('term');
        $unidads = DB::table('unidads')->where('unidad', 'like', '%' . $term . '%')->get();
        $adevol = array();
        if (count($unidads) > 0) {
            foreach ($unidads as $unidad)
                {
                    $adevol[] = array(
                        'id' => $unidad->id,
                        'value' => $unidad->unidad,
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
