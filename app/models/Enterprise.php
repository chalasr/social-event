<?php

class Enterprise extends Eloquent {

	protected $fillable = [
		'name',
		'juridical_status',
		'creation_date',
		'member_of_group',
		'postal_address',
		'phone',
		'telecopie',
		'website',
		'leaders_informations',
		'candidate_informations',
		'candidate_phone',
		'candidate_email',
		'created_at',
		'updated_at',
		'registration_state',
	];

	public static $rules = array(
		'name' =>'required',
		'juridical_status' => 'required',
		'creation_date' => 'required',
		'postal_address' => 'required',
		'postal_code' => 'required',
		'city' => 'required',
		'phone' => 'required',
		'leader_name' => 'required',
		'leader_firstname' => 'required',
		'leader_position' => 'required',
		'leader_email' => 'email',
		'candidate_informations' => 'required',
		'candidate_phone' => 'required',
		'candidate_email' => 'required|email',
		'candidate_firstname' => 'required',
		'candidate_name' => 'required',
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

	public function files()
	{
			return $this->hasMany('Upload');
	}

	public function links()
	{
			return $this->hasMany('Link');
	}

}
