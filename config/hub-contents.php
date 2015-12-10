<?php
/**
 * Created by PhpStorm.
 * User: Karoly Szabo
 * Date: 8/26/15
 * Time: 12:32 PM
 */

return [
    // IMPORTANTE: nome nuovo elemento === nome della sua tabella
    // questo sara' anche l'url da ADMIN (e solo da admin)
    'press_releases' => [
        //admin nome nella sidebar
        'sidebar' => 'Comunicati Stampa', //i should be a trans(..) instance
        'name' => 'press-releases', //am i useful? it may be removed
        'rss' => [
            'title' => 'rss.press-releases.title',
            'description' => 'rss.press-releases.description',
        ],
        //URL da 'frontend' per erogare servizi
        'service' => [
            'it' => 'comunicati',
            'en' => 'press-releases',
        ],
        //nome del model relativo a questa tabella
        'model' => 'FairHub\\Models\\PressRelease',
        //colonne index Admin
        'columns' => [
            'title' => 'Titolo',
            'contentName' => 'Nome',
            'contextName' => 'Contesto',
            'statusName' => 'Stato'
        ],
        //colonne speciali in admin, tipo status arancione, verde arancio ecc
        'modifiers' => [
            'statusName' => 'statusCode'
        ],
        //not yet implemented
        'actions' => [],
    ],

];