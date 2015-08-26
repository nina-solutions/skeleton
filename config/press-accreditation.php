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
            'ANA_NOME' => [
                'required'
            ],
            'ANA_COGNOME' => [
                'required'
            ],
            'ANA_EMAIL' => [
                'required',
                'email',
            ],
            'ANA_CELLULARE' => [
                'required'
            ],
            'SOC_ID' => [
                'required'
            ],
            'UTY_ID' => [
                'required'
            ],
            //Required by everyone
            'ANA_CARD' => [
                'required'
            ],
        ],
        20 => [

        ],
        23 => [

        ],
        24 => [

        ],
        33 => [
            //NOT REQUIRED example
            'ANA_CARD' => [],
        ],
    ]

];