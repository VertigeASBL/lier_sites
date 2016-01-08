<?php
/**
 * Fichier gérant l'installation et désinstallation du plugin Lier sites.
 *
 * @plugin     Lier sites
 *
 * @copyright  2016
 * @author     Michel @ Vertige ASBL
 * @licence    GNU/GPL
 */

/**
 * Fonction d'installation et de mise à jour du plugin Lier sites.
 *
 * @param string $nom_meta_base_version
 *   Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @param string $version_cible
 *   Version du schéma de données dans ce plugin (déclaré dans paquet.xml)
 **/
function lier_sites_upgrade($nom_meta_base_version, $version_cible) {
    $maj = array();

    $maj['create'] = array(array('maj_tables', 'spip_syndic_liens'));

    include_spip('base/upgrade');
    maj_plugin($nom_meta_base_version, $version_cible, $maj);
}

/**
 * Fonction de désinstallation du plugin Lier sites.
 *
 * @param string $nom_meta_base_version
 *   Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 **/
function lier_sites_vider_tables($nom_meta_base_version) {

	sql_drop_table('spip_syndic_liens');

    effacer_meta($nom_meta_base_version);
}
