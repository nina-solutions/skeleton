<?php
/**
 * Created by PhpStorm.
 * User: Karoly Szabo
 * Date: 8/26/15
 * Time: 12:32 PM
 */

use Illuminate\Support\Facades\Session;

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
            'ANA_TWITTER_ACCOUNT' => [],

            'AS_NOME_TESTATA' => [
                'required'
            ],
            'AS_ADDRESS' => [
                'required'
            ],
            'AS_CITY' => [
                'required'
            ],
            'AS_CAP' => [
                'required'
            ],
            'AS_STATES' => [
                'required'
            ],
            'AS_COUNTRY' => [
                'required_if:AS_STATES,IT'
            ],
            'AS_PERIODICITA' => [
                'required'
            ],
            'AS_EMAIL' => [
                'required',
                'email'
            ],
            'AS_PHONE' => [],
            'AS_WWW' => [],
            'ANA_PRIMA_VISITA' => [
                'required',
                'integer'
            ],
            'ANA_CONSENSO' => [
                'required',
                'in:SI,NO'
            ],

            'ANA_FILENAME1' => [
                'photo' => 'mimes:jpeg,bmp,png'
            ],
            'ANA_FILENAME2' => [
                'photo' => 'mimes:jpeg,bmp,png'
            ],
            'ANA_FILENAME3' => [
                'photo' => 'mimes:jpeg,bmp,png'
            ],
            'ANA_FILENAME4' => [
                'photo' => 'mimes:jpeg,bmp,png'
            ],
            'ANA_FILENAME5' => [
                'photo' => 'mimes:jpeg,bmp,png'
            ],

            'AS_TESSERA' => [
                'required'
            ],

            'human' => [
                'required',
                'numeric',
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
            'AS_TESSERA' => [],
        ],
    ]

];