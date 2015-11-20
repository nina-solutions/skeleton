<?php
/**
 * Created by PhpStorm.
 * User: Karoly Szabo
 * Date: 8/26/15
 * Time: 12:32 PM
 */

return [
    'press_releases' => [
        'sidebar' => 'Comunicati Stampa', //i should be a trans(..) instance
        'name' => 'press-releases', //am i useful?
        'rss' => [
            'title' => 'rss.press-releases.title',
            'description' => 'rss.press-releases.description',
        ],
        'service' => [
            'it' => 'comunicati',
            'en' => 'press-releases',
        ],
        'model' => 'FairHub\\Models\\PressRelease',
        'columns' => [
            'title' => 'Titolo',
            'contentName' => 'Nome',
            'contextName' => 'Contesto',
            'statusName' => 'Stato'
        ],
        'modifiers' => [
            'statusName' => 'statusCode'
        ],
    ],

];