<?php

class Activity extends Eloquent {

	protected $fillable = [
    'ca_2013',
    'net_2013',
    'effectif_2013',
    'rd_2013',
    'effectif_rd_2013',
    'ca_2014',
    'net_2014',
    'effectif_2014',
    'rd_2014',
    'effectif_rd_2014',
    'ca_2015',
    'net_2015',
    'effectif_2015',
    'rd_2015',
    'effectif_rd_2015',
    'enterprise_id',
    'created_at',
    'updated_at',
	];

	public static $rules = array(
		'ca_2013' => 'required',
		'net_2013' => 'required',
		'effectif_2013' => 'required',
		'rd_2013' => 'required',
		'effectif_rd_2013' => 'required',
		'ca_2014' => 'required',
		'net_2014' => 'required',
		'effectif_2014' => 'required',
		'rd_2014' => 'required',
		'effectif_rd_2014' => 'required',
		'ca_2015' => 'required',
		'net_2015' => 'required',
		'effectif_2015' => 'required',
		'rd_2015' => 'required',
		'effectif_rd_2015' => 'required',
  );
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'activities';
	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	/**
	 * hasOne relation for Enterprise
	 */
	public function enterprise()
	{
			return $this->hasOne('Enterprise');
	}
}
