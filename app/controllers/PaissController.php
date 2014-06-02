<?php

class PaissController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
				$q = Input::get('q',"");

        $paiss = DB::table('paiss');
				if ($q<>"") {
					$paiss = $paiss->where('pais', 'like', '%' . $q . '%');
				}
				$paiss = $paiss->paginate(10);
        $title = "Paises";
        return View::make('paiss.index', array('title' => $title, 'paiss' => $paiss));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
				$title = "Crear Pais";
        return View::make('paiss.create', array('title' => $title));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$rules = [
			'pais' => 'required|unique:paiss',
		];


		if (! Pais::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Pais::$errors);

		}

		$pais = new Pais;

		$pais->pais = Input::get('pais');

		$pais->save();

		return Redirect::to('/paiss');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$pais = Pais::find($id);
		$title = "Ver Pais";
		// show the view and pass the nerd to it
		return View::make('paiss.show', array('title' => $title, 'pais' => $pais));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pais = Pais::find($id);
		$title = "Editar Pais";

        return View::make('paiss.edit', array('title' => $title, 'pais' => $pais));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{


		$pais = Pais::find($id);

		$rules = [
				'pais' => 'required|unique:paiss,pais,' . $id,
		];

		if (! Pais::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Pais::$errors);

		}

		$pais->pais = Input::get('pais');
		$pais->save();
		return Redirect::to('/paiss');


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$pais = Pais::find($id)->delete();
		return Redirect::to('/paiss');
	}

   public function search(){

        $term = Input::get('term');
        $paiss = DB::table('paiss')->where('pais', 'like', '%' . $term . '%')->get();
        $adevol = array();
        if (count($paiss) > 0) {
            foreach ($paiss as $pais)
                {
                    $adevol[] = array(
                        'id' => $pais->id,
                        'value' => $pais->pais,
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
