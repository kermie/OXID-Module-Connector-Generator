<?php
 
/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'          => 'oxcomomcgenerator',
    'title'       => 'OXID Modul Connector - Modul-Json Generator',
    'description' => array(
        'de' => 'Erstellt Json Modul-Dateien aus den Artikeln im Shop',
        'en' => 'Creates json module files from shop articles',
    ),
    'thumbnail'   => '',
    'version'     => '1.0.0',
    'author'      => 'Alpha-Sys for the OXID Community',
    //'url'         => 'https://github.com/OXIDprojects/OXID-Modul-Connector',
    'extend'      => array(
    ),
    'files'       => array(
        'omcgenerator_main'         => 'oxcom/oxcomomcgenerator/controllers/admin/omcgenerator_main.php',
    ),
    'templates'   => array(
        'omcgenerator_main.tpl'     => 'oxcom/oxcomomcgenerator/views/admin/tpl/omcgenerator_main.tpl',
    ),
    'blocks'      => array(
    ),
    'events'      => array(
    ),
    'settings'    => array(
    )
);
?>
