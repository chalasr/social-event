<?php

class Role extends Eloquent {

	protected $fillable = ['name'];

	public static $rules = [];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'roles';
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];
}
