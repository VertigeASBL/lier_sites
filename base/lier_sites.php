<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     Lier Sites
 * @copyright  2016
 * @author     Michel @ Vertige ASBL
 * @licence    GNU/GPL
 */


/**
 * Déclaration des alias de tables et filtres automatiques de champs
 *
 * @pipeline declarer_tables_interfaces
 * @param array $interfaces
 *     Déclarations d'interface pour le compilateur
 * @return array
 *     Déclarations d'interface pour le compilateur
 */
function lier_sites_declarer_tables_interfaces($interfaces) {

	$interfaces['tables_jointures']['spip_syndic'][] = 'syndic_liens';

	return $interfaces;
}

/**
 * Déclaration des objets éditoriaux
 *
 * @pipeline declarer_tables_objets_sql
 * @param array $tables
 *     Description des tables
 * @return array
 *     Description complétée des tables
 */
function lier_sites_declarer_tables_objets_sql($tables) {

	$tables['spip_syndic']['tables_jointures'][] = 'spip_syndic_liens';

	$tables['spip_syndic']['texte_ajouter'] = 'lier_sites:info_ajouter_1_site';

	// jointures sur les sites pour tous les objets
	$tables[]['tables_jointures'][]= 'syndic_liens';
	$tables[]['tables_jointures'][]= 'syndic';

	// versionner les jointures pour tous les objets
	$tables[]['champs_versionnes'][] = 'jointure_syndic';

	return $tables;
}

/**
 * Déclaration des tables secondaires (liaisons)
 *
 * @pipeline declarer_tables_auxiliaires
 * @param array $tables
 *     Description des tables
 * @return array
 *     Description complétée des tables
 */
function lier_sites_declarer_tables_auxiliaires($tables) {

	$tables['spip_syndic_liens'] = array(
		'field' => array(
			'id_syndic' => 'bigint(21) NOT NULL',
			'id_objet' => 'bigint(21) NOT NULL',
			'objet' => "varchar(25) DEFAULT '' NOT NULL",
			'vu' => "varchar(6) DEFAULT 'non' NOT NULL",
		),
		'key' => array(
			'PRIMARY KEY' => 'id_syndic,id_objet,objet',
			'KEY id_syndic' => 'id_syndic',
		),
	);

	return $tables;
}
