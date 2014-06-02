<?php

class AreasinteressController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

				$q = Input::get('q',"");

				$areasinteress = DB::table('areasinteress');
				if ($q<>"") {
					$areasinteress = $areasinteress->where('areasinteres', 'like', '%' . $q . '%');
				}
				$areasinteress = $areasinteress->paginate(10);

				$title = "Areas de intereses";
				return View::make('areasinteress.index', array('title' => $title, 'areasinteress' => $areasinteress));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
				$title = "Crear Areas Interes";
        return View::make('areasinteress.create', array('title' => $title));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$rules = [
			'areasinteres' => 'required|unique:areasinteress',
			'idioma' => 'required|exists:idiomas,idioma',
		];


		if (! Areasinteres::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Areasinteres::$errors);

		}

		$idioma = DB::table('idiomas')->where('idioma', '=', Input::get('idioma'))->first();

		$areasinteres = new Areasinteres;

		$areasinteres->areasinteres = Input::get('areasinteres');
		$areasinteres->idiomas_id = $idioma->id;

		$areasinteres->save();

		return Redirect::to('/areasinteress');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
			$areasinteres = Areasinteres::find($id);
			$title = "Ver Areas Interes";
			// show the view and pass the nerd to it
			return View::make('areasinteress.show', array('title' => $title, 'areasinteres' => $areasinteres));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
			$areasinteres = Areasinteres::find($id);
			$title = "Editar Areas Interes";

			return View::make('areasinteress.edit', array('title' => $title, 'areasinteres' => $areasinteres));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$areasinteres = Areasinteres::find($id);

		$rules = [
			'areasinteres' => 'required|unique:areasinteress,areasinteres,' . $id,
			'idioma' => 'required|exists:idiomas,idioma',
		];


		if (! Areasinteres::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Areasinteres::$errors);

		}

		$idioma = DB::table('idiomas')->where('idioma', '=', Input::get('idioma'))->first();

		$areasinteres->areasinteres = Input::get('areasinteres');
		$areasinteres->idiomas_id = $idioma->id;

		$areasinteres->save();

		return Redirect::to('/areasinteress');




	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$areasinteres = Areasinteres::find($id)->delete();
		return Redirect::to('/areasinteress');
	}

   public function search(){

        $term = Input::get('term');
        $areasinteress = DB::table('areasinteress')->where('areasinteres', 'like', '%' . $term . '%')->get();
        $adevol = array();
        if (count($areasinteress) > 0) {
            foreach ($areasinteress as $areasinteres)
                {
                    $adevol[] = array(
                        'id' => $areasinteres->id,
                        'value' => $areasinteres->areasinteres,
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
