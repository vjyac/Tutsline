<?php

class IdiomasController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
				$q = Input::get('q',"");

        $idiomas = DB::table('idiomas');
				if ($q<>"") {
					$idiomas = $idiomas->where('idioma', 'like', '%' . $q . '%');
				}
				$idiomas = $idiomas->paginate(10);
        $title = "idiomaes";
        return View::make('idiomas.index', array('title' => $title, 'idiomas' => $idiomas));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
				$title = "Crear idioma";
        return View::make('idiomas.create', array('title' => $title));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$rules = [
			'idioma' => 'required|unique:idiomas',
		];


		if (! idioma::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(idioma::$errors);

		}

		$idioma = new idioma;

		$idioma->idioma = Input::get('idioma');

		$idioma->save();

		return Redirect::to('/idiomas');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$idioma = idioma::find($id);
		$title = "Ver idioma";
		// show the view and pass the nerd to it
		return View::make('idiomas.show', array('title' => $title, 'idioma' => $idioma));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$idioma = idioma::find($id);
		$title = "Editar idioma";

        return View::make('idiomas.edit', array('title' => $title, 'idioma' => $idioma));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{


		$idioma = idioma::find($id);

		$rules = [
				'idioma' => 'required|unique:idiomas,idioma,' . $id,
		];

		if (! idioma::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(idioma::$errors);

		}

		$idioma->idioma = Input::get('idioma');
		$idioma->save();
		return Redirect::to('/idiomas');


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$idioma = idioma::find($id)->delete();
		return Redirect::to('/idiomas');
	}

   public function search(){

        $term = Input::get('term');
        $idiomas = DB::table('idiomas')->where('idioma', 'like', '%' . $term . '%')->get();
        $adevol = array();
        if (count($idiomas) > 0) {
            foreach ($idiomas as $idioma)
                {
                    $adevol[] = array(
                        'id' => $idioma->id,
                        'value' => $idioma->idioma,
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
