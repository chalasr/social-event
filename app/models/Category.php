<?php

class Category extends Eloquent {

	protected $fillable = array('name', 'description');

  public function users()
  {
      return $this->belongsToMany('User', 'users_categories');
  }

	public static $rules = array(
		'name'=>'required',
		'description'=>'required',
    );
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();
}
