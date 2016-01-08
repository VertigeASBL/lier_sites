<?php
/**
 * Fonctions utiles au formulaire de configuration du plugin Lier Sites
 *
 * @plugin     Lier Sites
 * @copyright  2016
 * @author     Michel @ Vertige ASBL
 * @licence    GNU/GPL
 */

/**
 * Lister les objets éditoriaux disponibles pour peupler une saisie
 *
 * @return array : un tableau qu'on peut utiliser comme paramètre
 *                 "datas" dans une saisie
 */
function lister_datas_objets_editoriaux() {

	include_spip('base/objets');

	return array_map(
		function ($el) {
			return _T($el['texte_objets']);
		},
		lister_tables_objets_sql()
	);
}
