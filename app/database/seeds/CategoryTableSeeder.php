<?php

class CategoryTableSeeder extends Seeder {

    public function run()
    {

       	$fixtures = array(
          	array(	'name' => 'ENVIRONNEMENT ET ENERGIE',
          		  	'description' => 'Consciente de l’urgence de diminuer l’impact de son activité sur l’environnement (pollution de l’air, du sol, de l’eau), l’entreprise récompensée aura mis en œuvre une politique environnementale sur le long terme, conçu une technique ou un produit permettant de diminuer la pollution ou d’abaisser la consommation énergétique, contribué au développement des énergies renouvelables, etc.'),
          	array(	'name' => 'EQUIPEMENTS ET PRODUITS DU SPORT, DES LOISIRS ET DE LA MONTAGNE',
          			'description' => 'Sera récompensée une entreprise qui aura créé ou fabriqué un article de sport/loisirs ou un équipement touristique ou sportif innovant, en élevant particulièrement son niveau de confort, de sécurité, de praticité et de durabilité. Tous les sports, d’été ou d’hiver, d’intérieur ou d’extérieur, sont concernés. L’éco-conception sera un élément pris en compte dans le choix du jury. En cas d’égalité, priorité sera donnée à une entreprise produisant en Rhône-Alpes et en France (par rapport à une production délocalisée).'),
          	array(	'name' => 'INDUSTRIES',
          		  	'description' => 'Il s’agit de récompenser une entreprise qui aura conçu et réalisé un produit industriel apportant des améliorations sensibles en matière de qualité, de productivité et/ou de prix, aux produits ou équipements existants sur le marché, voire constituant un véritable saut technologique. Priorité sera donnée à une entreprise produisant en Rhône-Alpes et en France (par rapport à une production délocalisée). Tous les secteurs industriels (hors "sport, loisirs et montagne", déjà représentés dans des catégories particulières) sont concernés.'),
          	array(	'name' => 'JEUNE POUSSE',
          			'description' => 'Anglicisée par le terme "start up", la "jeune pousse" est une entreprise de création récente dont le potentiel de croissance est particulièrement élevé, par la nature de son activité, généralement hautement technologique (santé, biotech, nanotech, logiciel et numérique, etc.) mais pas seulement. Contrairement aux autres catégories, les perspectives constituées par les produits et technologies développés pourra primer sur la santé économique (rentabilité…) de l’entreprise.'),
          	array(	'name' => 'OBJETS CONNECTÉS',
          		  	'description' => 'Qu’ils touchent au monde du sport (vêtements, chaussures), de l’image (vidéo), de l’habitat (domotique), de la sécurité (surveillance, géolocalisation) et plus généralement de l’acquisition et du traitement de données à distance, les objets connectés (dotés d’une puce électronique) ont fait leur apparition dans notre quotidien. Sera récompensé dans cette catégorie, à travers l’entreprise qui l’aura conçu et/ou fabriqué, un objet qui bouscule les usages, apportant de nouvelles fonctionnalités dans la vie quotidienne et/ou professionnelle, grâce au numérique. '),
          	array(	'name' => 'PRODUITS GRAND PUBLIC',
          			'description' => 'L’entreprise lauréate sera récompensée grâce à l’intérêt, l’utilité ou le design particulièrement innovants qu’elle aura apportés à un article de grande consommation. Eco-conception et impact écologique (bilan carbone…) seront particulièrement appréciés. A noter que les produits concernant « le sport, les loisirs et la montagne » sont déjà représentés dans une catégorie spécifique.'),
          	array(	'name' => 'SANTÉ / BIOTECHNOLOGIES',
          		  	'description' => 'L’entreprise récompensée aura conçu un médicament, un vaccin ou tout autre produit, équipement ou service apportant une amélioration sensible du confort et de l’allongement de la vie, de la protection de la santé humaine ou de la prise en charge des malades.'),
          	array(	'name' => 'SERVICES',
          			'description' => 'Il s’agit de récompenser une entreprise proposant un service innovant qui n’existait pas encore sur le marché et/ou qui apporte une grande amélioration en matière de qualité, d’efficacité et d’usage. Sont concernés les services à la personne comme les services aux entreprises.'),
          	array(	'name' => 'TRANSPORTS ET VÉHICULES DU FUTUR',
          		  	'description' => 'Sera récompensée une entreprise qui aura contribué au développement d’un véhicule existant ou conçu un véhicule nouveau (terrestre, aérien, maritime ou fluvial) qui améliore de façon significative les économies d’énergie, le bilan carbone, la sécurité et les usages des produits actuels. Les candidates pourront être des sociétés de conception, des fabricants ou des sociétés de service.'),
          	array(	'name' => 'URBANISME, CONSTRUCTION DURABLE',
          			'description' => 'Le bâtiment (habitat, tertiaire, industriel) est au cœur de notre société : il façonne les centres urbains ; il a une grande influence sur les relations sociales, les déplacements, l’utilisation de l’espace ; il est un grand consommateur d’énergie… Le Trophée « Urbanisme, construction durable » sera remis à une entreprise qui aura apporté des améliorations conséquentes  dans l’un ou plusieurs de ces domaines. Cette catégorie s’adresse à l’ensemble des acteurs de la filière : urbanisme, architecture, matériaux, construction et techniques du bâtiment, gestion de l’énergie, domotique, etc. ')
	      );

    		foreach($fixtures as $category)
    		{
           		Category::create($category);
        }
    }
}
