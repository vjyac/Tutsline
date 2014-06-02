<?php

class EstadosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

				$q = Input::get('q',"");

				$estados = DB::table('estados');
				if ($q<>"") {
					$estados = $estados->where('estado', 'like', '%' . $q . '%');
				}
				$estados = $estados->paginate(10);

				$title = "Estados";
				return View::make('estados.index', array('title' => $title, 'estados' => $estados));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
				$title = "Crear Estados";
        return View::make('estados.create', array('title' => $title));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$rules = [
			'estado' => 'required|unique:estados',
			'pais' => 'required|exists:paiss,pais',
		];


		if (! Estado::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Estado::$errors);

		}

		$pais = DB::table('paiss')->where('pais', '=', Input::get('pais'))->first();

		$estado = new Estado;

		$estado->estado = Input::get('estado');
		$estado->paiss_id = $pais->id;

		$estado->save();

		return Redirect::to('/estados');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
			$estado = Estado::find($id);
			$title = "Ver Estado";
			// show the view and pass the nerd to it
			return View::make('estados.show', array('title' => $title, 'estado' => $estado));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
			$estado = Estado::find($id);
			$title = "Editar Estado";

			return View::make('estados.edit', array('title' => $title, 'estado' => $estado));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$estado = Estado::find($id);

		$rules = [
			'estado' => 'required|unique:estados,estado,' . $id,
			'pais' => 'required|exists:paiss,pais',
		];


		if (! Estado::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Estado::$errors);

		}

		$pais = DB::table('paiss')->where('pais', '=', Input::get('pais'))->first();

		$estado->estado = Input::get('estado');
		$estado->paiss_id = $pais->id;

		$estado->save();

		return Redirect::to('/estados');




	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$estado = Estado::find($id)->delete();
		return Redirect::to('/estados');
	}

   public function search(){

        $term = Input::get('term');
        $estados = DB::table('estados')->where('estado', 'like', '%' . $term . '%')->get();
        $adevol = array();
        if (count($estados) > 0) {
            foreach ($estados as $estado)
                {
                    $adevol[] = array(
                        'id' => $estado->id,
                        'value' => $estado->estado,
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
