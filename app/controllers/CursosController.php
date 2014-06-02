<?php

class CursosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

				$q = Input::get('q',"");

				$cursos = DB::table('cursos');
				if ($q<>"") {
					$cursos = $cursos->where('curso', 'like', '%' . $q . '%');
				}
				$cursos = $cursos->paginate(10);

				$title = "cursos";
				return View::make('cursos.index', array('title' => $title, 'cursos' => $cursos));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
				$title = "Crear Curso";
        return View::make('cursos.create', array('title' => $title));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$rules = [
			'curso' => 'required|unique:cursos',
			'idioma' => 'required|exists:idiomas,idioma',
			'areasinteres' => 'required|exists:areasinteress,areasinteres',
			'cuotas' => 'numeric',

		];


		if (! Curso::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Curso::$errors);

		}


		$idioma = DB::table('idiomas')->where('idioma', '=', Input::get('idioma'))->first();
		$areasinteres = DB::table('areasinteress')->where('areasinteres', '=', Input::get('areasinteres'))->first();

		$curso = new Curso;

		$curso->curso = Input::get('curso');
		$curso->idiomas_id = $idioma->id;
		$curso->areasinteress_id = $areasinteres->id;
		$curso->importe = Input::get('importe');
		$curso->duracion = Input::get('duracion');
		$curso->cargahoraria = Input::get('cargahoraria');
		$curso->html_metodologia = Input::get('html_metodologia');
		$curso->html_objetivos = Input::get('html_objetivos');
		$curso->cuotas = Input::get('cuotas');


		$curso->save();

		return Redirect::to('/cursos');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
			$curso = curso::find($id);
			$title = "Ver Curso";
			// show the view and pass the nerd to it
			return View::make('cursos.show', array('title' => $title, 'curso' => $curso));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
			$curso = Curso::find($id);
			$title = "Editar curso";

			return View::make('cursos.edit', array('title' => $title, 'curso' => $curso));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$curso = Curso::find($id);

		$rules = [
			'curso' => 'required|unique:cursos,curso,' . $id,
			'idioma' => 'required|exists:idiomas,idioma',
			'areasinteres' => 'required|exists:areasinteress,areasinteres',
			'cuotas' => 'numeric',
		];


		if (! Curso::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Curso::$errors);

		}

		$idioma = DB::table('idiomas')->where('idioma', '=', Input::get('idioma'))->first();
		$areasinteres = DB::table('areasinteress')->where('areasinteres', '=', Input::get('areasinteres'))->first();

		$curso->curso = Input::get('curso');
		$curso->idiomas_id = $idioma->id;
		$curso->areasinteress_id = $areasinteres->id;
		$curso->importe = Input::get('importe');
		$curso->duracion = Input::get('duracion');
		$curso->cargahoraria = Input::get('cargahoraria');
		$curso->html_metodologia = Input::get('html_metodologia');
		$curso->html_objetivos = Input::get('html_objetivos');
		$curso->cuotas = Input::get('cuotas',1);


		$curso->save();

		return Redirect::to('/cursos');



	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$curso = Curso::find($id)->delete();
		return Redirect::to('/cursos');
	}

   public function search(){

        $term = Input::get('term');
        $cursos = DB::table('cursos')->where('curso', 'like', '%' . $term . '%')->get();
        $adevol = array();
        if (count($cursos) > 0) {
            foreach ($cursos as $curso)
                {
                    $adevol[] = array(
                        'id' => $curso->id,
                        'value' => $curso->idioma,
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
