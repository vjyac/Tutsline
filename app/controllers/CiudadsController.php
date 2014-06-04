<?php

class CiudadsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

				$q = Input::get('q',"");

				$ciudads = DB::table('ciudads');
				if ($q<>"") {
					$ciudads = $ciudads->where('ciudad', 'like', '%' . $q . '%');
				}
				$ciudads = $ciudads->paginate(10);

				$title = "Ciudades";
				return View::make('ciudads.index', array('title' => $title, 'ciudads' => $ciudads));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
				$title = "Crear Ciudad";
        return View::make('ciudads.create', array('title' => $title));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


		$rules = [
			'ciudad' => 'required|unique:ciudads',
			'estado' => 'required|exists:estados,estado',
		];



		if (! Ciudad::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Ciudad::$errors);

		}

		$estado = DB::table('estados')->where('estado', '=', Input::get('estado'))->first();

		$ciudad = new Ciudad;

		$ciudad->ciudad = Input::get('ciudad');
		$ciudad->estados_id = $estado->id;

		$ciudad->save();

		return Redirect::to('/ciudads');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
			$ciudad = Ciudad::find($id);
			$title = "Ver Ciudad";
			// show the view and pass the nerd to it
			return View::make('ciudads.show', array('title' => $title, 'ciudad' => $ciudad));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
			$ciudad = Ciudad::find($id);
			$title = "Editar Ciudad";

			return View::make('ciudads.edit', array('title' => $title, 'ciudad' => $ciudad));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$ciudad = Ciudad::find($id);

		$rules = [
			'ciudad' => 'required|unique:ciudads,ciudad,' . $id,
			'estado' => 'required|exists:estados,estado',
		];


		if (! Ciudad::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Ciudad::$errors);

		}

		$estado = DB::table('estados')->where('estado', '=', Input::get('estado'))->first();

		$ciudad->ciudad = Input::get('ciudad');
		$ciudad->estados_id = $estado->id;

		$ciudad->save();

		return Redirect::to('/ciudads');




	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$ciudad = Ciudad::find($id)->delete();
		return Redirect::to('/ciudads');
	}

   public function search(){

        $term = Input::get('term');
        $ciudads = DB::table('ciudads')->where('ciudad', 'like', '%' . $term . '%')->get();
        $adevol = array();
        if (count($ciudads) > 0) {
            foreach ($ciudads as $ciudad)
                {
                    $adevol[] = array(
                        'id' => $ciudad->id,
                        'value' => $ciudad->estado,
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
