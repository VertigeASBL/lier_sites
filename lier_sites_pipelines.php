<?php
/**
 * Utilisations de pipelines par Lier sites.
 *
 * @plugin     Lier sites
 *
 * @copyright  2016
 * @author     Michel @ Vertige ASBL
 * @licence    GNU/GPL
 */

/**
 * Afficher un formulaire de gestion des liens aux sites pour les objets associables
 *
 * @pipeline affiche_enfants
 * @param  array $flux Données du pipeline
 * @return array       Données du pipeline
 */
function lier_sites_affiche_droite($flux) {

	include_spip('inc/config');

	$objets_associables = array_map(
		'objet_type',
		lire_config('lier_sites/objets_sites')
	);

	if (in_array($flux['args']['exec'], $objets_associables)) {

		$objet = $flux['args']['exec'];
		$id_objet = $flux['args'][id_table_objet($objet)];

		$flux['data'] .= recuperer_fond(
			'prive/squelettes/inclure/editer_sites_lies',
			array(
				'objet' => $objet,
				'id_objet' => $id_objet,
			)
		);
	}

	return $flux;
}
