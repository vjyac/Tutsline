<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Capitulospregunta extends Eloquent {

protected $table = 'capitulospreguntas';

protected $fillable = ['capitulospregunta'];


public static $errors;

public static function isValid($data, $rules)
{

		$validation = Validator::make($data, $rules);

		if ($validation->passes()) return true;

		static::$errors = $validation->messages();

		return false;
}

}
