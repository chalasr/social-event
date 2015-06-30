<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

    "accepted"             => "Le champ :attribute doit être accepté.",
    "active_url"           => "Le champ :attribute n'est pas une URL valide.",
    "after"                => "Le champ :attribute doit être une date postérieure au :date.",
    "alpha"                => "Le champ :attribute doit seulement contenir des lettres.",
    "alpha_dash"           => "Le champ :attribute doit seulement contenir des lettres, des chiffres et des tirets.",
    "alpha_num"            => "Le champ :attribute doit seulement contenir des chiffres et des lettres.",
    "array"                => "Le champ :attribute doit être un tableau.",
    "before"               => "Le champ :attribute doit être une date antérieure au :date.",
    "between"              => [
        "numeric" => "La valeur de :attribute doit être comprise entre :min et :max.",
        "file"    => "Le fichier :attribute doit avoir une taille entre :min et :max kilo-octets.",
        "string"  => "Le texte :attribute doit avoir entre :min et :max caractères.",
        "array"   => "Le tableau :attribute doit avoir entre :min et :max éléments.",
    ],
    "boolean"              => "Le champ :attribute doit être vrai ou faux.",
    "confirmed"            => "Le champ de confirmation :attribute ne correspond pas.",
    "date"                 => "Le champ :attribute n'est pas une date valide.",
    "date_format"          => "Le champ :attribute ne correspond pas au format :format.",
    "different"            => "Les champs :attribute et :other doivent être différents.",
    "digits"               => "Le champ :attribute doit avoir :digits chiffres.",
    "digits_between"       => "Le champ :attribute doit avoir entre :min and :max chiffres.",
    "email"                => "Le champ :attribute doit être une adresse email valide.",
    "exists"               => "Le champ :attribute sélectionné est invalide.",
    "filled"               => "Le champ :attribute est obligatoire.",
    "image"                => "Le champ :attribute doit être une image.",
    "in"                   => "Le champ :attribute est invalide.",
    "integer"              => "Le champ :attribute doit être un entier.",
    "ip"                   => "Le champ :attribute doit être une adresse IP valide.",
    "max"                  => [
        "numeric" => "La valeur de :attribute ne peut être supérieure à :max.",
        "file"    => "Le fichier :attribute ne peut être plus gros que :max kilo-octets.",
        "string"  => "Le texte de :attribute ne peut contenir plus de :max caractères.",
        "array"   => "Le tableau :attribute ne peut avoir plus de :max éléments.",
    ],
    "mimes"                => "Le champ :attribute doit être un fichier de type : :values.",
    "min"                  => [
        "numeric" => "La valeur de :attribute doit être supérieure à :min.",
        "file"    => "Le fichier :attribute doit être plus gros que :min kilo-octets.",
        "string"  => "Le texte :attribute doit contenir au moins :min caractères.",
        "array"   => "Le tableau :attribute doit avoir au moins :min éléments.",
    ],
    "not_in"               => "Le champ :attribute sélectionné n'est pas valide.",
    "numeric"              => "Le champ :attribute doit contenir un nombre.",
    "regex"                => "Le format du champ :attribute est invalide.",
    "required"             => "Le champ :attribute est obligatoire.",
    "required_if"          => "Le champ :attribute est obligatoire quand la valeur de :other est :value.",
    "required_with"        => "Le champ :attribute est obligatoire quand :values est présent.",
    "required_with_all"    => "Le champ :attribute est obligatoire quand :values est présent.",
    "required_without"     => "Le champ :attribute est obligatoire quand :values n'est pas présent.",
    "required_without_all" => "Le champ :attribute est requis quand aucun de :values n'est présent.",
    "same"                 => "Les champs :attribute et :other doivent être identiques.",
    "size"                 => [
        "numeric" => "La valeur de :attribute doit être :size.",
        "file"    => "La taille du fichier de :attribute doit être de :size kilo-octets.",
        "string"  => "Le texte de :attribute doit contenir :size caractères.",
        "array"   => "Le tableau :attribute doit contenir :size éléments.",
    ],
    "string"               => "Le champ :attribute doit être une chaîne de caractères.",
    "timezone"             => "Le champ :attribute doit être un fuseau horaire valide.",
    "unique"               => "La valeur du champ :attribute est déjà utilisée.",
    "url"                  => "Le format de l'URL de :attribute n'est pas valide.",

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        "name" => "Nom",
        "username" => "Pseudo",
        "email" => "E-mail",
        "first_name" => "Prénom",
        "last_name" => "Nom",
        "password" => "Mot de passe",
        "password_confirmation" => "Confirmation du mot de passe",
        "city" => "Ville",
        "country" => "Pays",
        "address" => "Adresse",
        "phone" => "Téléphone",
        "mobile" => "Portable",
        "age" => "Age",
        "sex" => "Sexe",
        "gender" => "Genre",
        "day" => "Jour",
        "month" => "Mois",
        "year" => "Année",
        "hour" => "Heure",
        "minute" => "Minute",
        "second" => "Seconde",
        "title" => "Titre",
        "content" => "Contenu",
        "description" => "Description",
        "excerpt" => "Extrait",
        "date" => "Date",
        "time" => "Heure",
        "available" => "Disponible",
        "size" => "Taille",
        //Custom fields for complete registration
        'juridical_status' => 'Status juridique',
        'creation_date' => 'Date de creation',
        'postal_address' => 'Adresse postale',
        'candidate_phone' => 'Téléphone de la personne en charge de la candidature',
        'candidate_email' => 'Adresse email de la personne en charge de la candidature',
        'candidate_informations' => 'Nom et fonction de la personne en charge de la candidature',
        'leader_name' => 'Informations concernant le dirigeant de votre entreprise',
        'leader_position' => 'Informations concernant le dirigeant de votre entreprise',
        'leader_phone' => 'Informations concernant le dirigeant de votre entreprise',
        'enterprise_activity' => 'Activité de l\'entreprise',
        'project_origin' => 'Origine du projet',
        'innovative_arguments' => 'En quoi votre projet est-il innovant',
        'wanted_impact' => 'Marché National ou International',
        'product_informations' => 'Prix du produit/service et canaux de distribution utilisés',
        'project_results' => 'Premiers résultats de votre innovation',
        'project_partners' => 'Soutien de votre innovation',
        'project_rewards' => 'Prix obtenus pour votre innovation',
        'ca_2013' => 'Chiffre d\'affaire 2013',
        'net_2013' => 'Résultat NET en 2013',
        'effectif_2013' => 'Effectif en 2013',
        'rd_2013' => 'Budget R&D en 2013',
        'effectif_rd_2013' => 'Effectif R&D en 2013',
        'ca_2014' => 'Chiffre d\'affaire 2014',
        'net_2014' => 'Résultat NET en 2014',
        'effectif_2014' => 'Effectif en 2014',
        'rd_2014' => 'Budget R&D en 2014',
        'effectif_rd_2014' => 'Effectif R&D en 2014',
        'ca_2015' => 'Chiffre d\'affaire 2015',
        'net_2015' => 'Résultat NET en 2015',
        'effectif_2015' => 'Effectif en 2015',
        'rd_2015'  => 'Budget R&D en 2013',
        'effectif_rd_2015' => 'Effectif R&D en 2015',
        'internal_collaborators' => 'Collaborateurs internes',
        'external_collaborators_type' => 'Collaborateurs externes',
        'project_certificates' => 'Brevet et autre marque déposées',
    ],

];
