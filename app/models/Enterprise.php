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
		'project_arguments',
		'project_results',
		'project_partners',
		'project_rewards',
		'activity_id',
		'internal_collaborators',
		'external_collaborators_type',
		'project_certificates',
	];

	public static $rules = array(
		'name' =>'required',
		'juridical_status' => 'required',
		'creation_date' => 'required',
		'postal_address' => 'required',
		'phone' => 'required|digits:10',
		'leaders_informations' => 'required',
		'candidate_informations' => 'required',
		'candidate_phone' => 'required|digits:10',
		'candidate_email' => 'required|email',
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
