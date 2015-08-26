<?php
/**
 * Created by PhpStorm.
 * User: Karoly Szabo
 * Date: 8/26/15
 * Time: 12:32 PM
 */

return [
    'channels' => [
        'journalist' =>20,
        'giornalista' => 20,
        'photographer' => 23,
        'fotografo' => 23,
        'collaborator' => 24,
        'collaboratore' => 24,
        'journalist_en' => 33,
        'giornalista_en' => 33,
    ],

    //channel related fields
    //channel 0 is ALL THE CHANNELS
    //a channel can override his common configuration

    //fields with 0 as value are optional
    //fields with 1 as value as mandatory
    'fields' => [
        0  => [
            'ANA_NOME' => 1,
            'ANA_COGNOME' => 1,
            'ANA_EMAIL' => 1,
            'ANA_CELLULARE' => 0,
            'SOC_ID' => 0,
            'UTY_ID' => 0,
            'ANA_CARD' => 1,
        ],
        20 => [

        ],
        23 => [

        ],
        24 => [

        ],
        33 => [
            'ANA_CARD' => 0,
        ],
    ]

];