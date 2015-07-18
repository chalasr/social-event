<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $fillable = array('username', 'email', 'password', 'role_id');

  public function categories()
  {
      return $this->belongsToMany('Category', 'users_categories');
  }

	public function role()
	{
			return $this->hasOne('Role', 'role_id');
	}

	public function enterprise()
	{
			return $this->hasOne('Enterprise');
	}

	public static $rules = array(
	    'email'=>'required|email|unique:users',
	    'password'=>'required|between:2,12|confirmed',
	    'password_confirmation'=>'required|between:2,12',
	);
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
}
