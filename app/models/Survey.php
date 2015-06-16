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
		'project_arguments',
		'project_results',
		'project_partners',
		'project_rewards',
	];

	public static $rules = array(
  );
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
