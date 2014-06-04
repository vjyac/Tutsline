<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
App::setLocale('es');

// Session Routes
Route::get('login',  array('as' => 'login', 'uses' => 'SessionController@create'));
Route::get('logout', array('as' => 'logout', 'uses' => 'SessionController@destroy'));
Route::resource('sessions', 'SessionController', array('only' => array('create', 'store', 'destroy')));

// User Routes
Route::get('register', 'UserController@create');
Route::get('users/{id}/activate/{code}', 'UserController@activate')->where('id', '[0-9]+');
Route::get('resend', array('as' => 'resendActivationForm', function()
{
	return View::make('users.resend');
}));
Route::post('resend', 'UserController@resend');
Route::get('forgot', array('as' => 'forgotPasswordForm', function()
{
	return View::make('users.forgot');
}));
Route::post('forgot', 'UserController@forgot');
Route::post('users/{id}/change', 'UserController@change');
Route::get('users/{id}/reset/{code}', 'UserController@reset')->where('id', '[0-9]+');
Route::get('users/{id}/suspend', array('as' => 'suspendUserForm', function($id)
{
	return View::make('users.suspend')->with('id', $id);
}));
Route::post('users/{id}/suspend', 'UserController@suspend')->where('id', '[0-9]+');
Route::get('users/{id}/unsuspend', 'UserController@unsuspend')->where('id', '[0-9]+');
Route::get('users/{id}/ban', 'UserController@ban')->where('id', '[0-9]+');
Route::get('users/{id}/unban', 'UserController@unban')->where('id', '[0-9]+');
Route::resource('users', 'UserController');

// Group Routes
Route::resource('groups', 'GroupController');

Route::get('/', array('as' => 'home', function()
{
	return View::make('home');
}));


// App::missing(function($exception)
// {
//     App::abort(404, 'Page not found');
//     //return Response::view('errors.missing', array(), 404);
// });







// Pais
Route::get( '/idiomas/search', array(
		'as' => 'idiomas.search',
		'uses' => 'IdiomasController@search'
) );


// Pais
Route::get( '/paiss/search', array(
		'as' => 'paiss.search',
		'uses' => 'PaissController@search'
) );


Route::resource('paiss', 'PaissController');


// Estados
Route::get( '/estados/search', array(
		'as' => 'estados.search',
		'uses' => 'EstadosController@search'
) );

Route::resource('estados', 'EstadosController');

// Ciudad
Route::get( '/ciudads/search', array(
		'as' => 'ciudads.search',
		'uses' => 'CiudadsController@search'
) );

Route::resource('ciudads', 'CiudadsController');

// Areas Interes
Route::get( '/areasinteress/search', array(
		'as' => 'areasinteress.search',
		'uses' => 'AreasinteressController@search'
) );

Route::resource('areasinteress', 'AreasinteressController');

// Cursos
Route::get( '/cursos/search', array(
		'as' => 'cursos.search',
		'uses' => 'CursosController@search'
) );

// Route::get('/cursos/{id}/unidads', 'UnidadsController@index');

Route::resource('cursos', 'CursosController');

// Unidads
Route::get( '/unidads/search', array(
		'as' => 'unidads.search',
		'uses' => 'UnidadsController@search'
) );

Route::resource('/cursos/{id}/unidads', 'UnidadsController');

Route::get( '/capitulos/search', array(
		'as' => 'capitulos.search',
		'uses' => 'CapitulosController@search'
) );

Route::resource('/cursos/{cursos_id}/unidads/{unidads_id}/capitulos', 'CapitulosController');

Route::get( '/capitulospreguntas/search', array(
		'as' => 'capitulospreguntas.search',
		'uses' => 'CapitulospreguntasController@search'
) );

Route::resource('/cursos/{cursos_id}/unidads/{unidads_id}/capitulos/{capitulos_id}/capitulospreguntas', 'CapitulospreguntasController');

Route::resource('/cursos/{cursos_id}/unidads/{unidads_id}/capitulos/{capitulos_id}/capitulosmultimedias', 'CapitulosmultimediasController');

Route::resource('capitulosmultimedias', 'CapitulosmultimediasController');
Route::get( '/capitulosmultimedias/{id}/delete', array( 'as' => 'capitulosmultimedias.delete', 'uses' => 'CapitulosmultimediasController@delete') );

Route::get( '/capitulosrespuestas/search', array(
		'as' => 'capitulosrespuestas.search',
		'uses' => 'CapitulosrespuestasController@search'
) );

Route::resource('/cursos/{cursos_id}/unidads/{unidads_id}/capitulos/{capitulos_id}/capitulospreguntas/{capitulospreguntas_id}/capitulosrespuestas', 'CapitulosrespuestasController');









// delete image
Route::post('delete-image', function () {


    $destinationPath_big = public_path() . '/multimedias/capitulos/imagenes/big/';
    $destinationPath_small = public_path() . '/multimedias/capitulos/imagenes/small/';

    $filename = Input::get('file');

    DB::table('capitulosmultimedias')->where('file', '=', $filename)->delete();

    File::delete($destinationPath_big . $filename);
    File::delete($destinationPath_small . $filename);

     return Response::json('success', 200);
});
