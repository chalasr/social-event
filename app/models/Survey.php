<?php
/*

enterprise_activity = Activité de l'entreprise
project_origin = Origine du projet
innovative_arguments = En quoi votre projet est-il innovant par rapport aux produits/services existants
wanted_impact = National ou International
product_informations = Prix du produit et Canaux de distribution
project_results
project_partners
project_rewards
*/

class Survey extends Eloquent {

	protected $fillable = [
		'enterprise_activity',
		'project_origin',
		'innovative_arguments',
		'wanted_impact',
		'product_informations',
		'project_results',
		'project_partners',
		'project_rewards',
		'created_at',
		'updated_at',
		'enterprise_id',
	];

	public static $rules = [
		'enterprise_activity' => 'required',
		'project_origin' => 'required',
		'innovative_arguments' => 'required',
		'wanted_impact' => 'required',
		'product_informations' => 'required',
		'project_results' => 'required',
	];
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'surveys';
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
