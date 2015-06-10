<?php

class Enterprise extends Eloquent {

	protected $fillable = [];

	public static $rules = array(
    );
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'enterprises';
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}
