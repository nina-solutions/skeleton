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

    'query' => [
        0 => 'Qualifica',
        20 => 'Qualifica',
        23 => 'Qualifica giornalisti generici',
        24 => 'Qualifica fotografo/operatore radiotv',
        33 => 'Qualifica giornalisti stranieri',
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
                'integer',
            ],
            'ANA_CONSENSO' => [
                'required',
                'in:SI,NO'
            ],


            'ANA_FILENAME2' => [
                'mimes:png,pdf,odt,tiff,tif,jpg,doc,docx'
            ],
            'ANA_FILENAME3' => [
                'mimes:png,pdf,odt,tiff,tif,jpg,doc,docx'
            ],
            'ANA_FILENAME4' => [
                'mimes:png,pdf,odt,tiff,tif,jpg,doc,docx'
            ],
            'ANA_FILENAME5' => [
                'mimes:png,pdf,odt,tiff,tif,jpg,doc,docx'
            ],

            'AS_TESSERA' => [
                'required'
            ],

            'AS_COMUNICAZIONI' => [],

            'human' => [
                'required',
                'numeric',
            ],
        ],
        20 => [
            'ANA_FILENAME1' => [
                'required',
                'mimes:png,pdf,odt,tiff,tif,jpg,doc,docx'
            ],
        ],
        23 => [
            'IS_BLOGGER' => [
                'required',
                'boolean'
            ],

            'ANA_FILENAME3' => [
                'required_if:IS_BLOGGER,TRUE',
                'mimes:png,pdf,odt,tiff,tif,jpg,doc,docx'
            ],
            'ANA_LINK_ARTICOLI' =>[
                'required_if:IS_BLOGGER,TRUE',
            ],

            'ANA_FILENAME1' => [
                'required_if:IS_BLOGGER,FALSE',
                'mimes:png,pdf,odt,tiff,tif,jpg,doc,docx'
            ],
            'ANA_FILENAME2' => [
                'required_if:IS_BLOGGER,FALSE',
                'mimes:png,pdf,odt,tiff,tif,jpg,doc,docx'
            ],
            'ANA_FILENAME5' => [
                'required_if:IS_BLOGGER,FALSE',
                'mimes:png,pdf,odt,tiff,tif,jpg,doc,docx'
            ],
        ],
        24 => [
            'IS_FOTOGRAFO' => [
                'required',
                'boolean'
            ],
            'ANA_FILENAME1' => [
                'required:',
                'mimes:png,pdf,odt,tiff,tif,jpg,doc,docx'
            ],
            'ANA_FILENAME2' => [
                'required',
                'mimes:png,pdf,odt,tiff,tif,jpg,doc,docx'
            ],

            'ANA_FILENAME4' => [
                'mimes:png,pdf,odt,tiff,tif,jpg,doc,docx'
            ],
            'ANA_FILENAME5' => [
                'mimes:png,pdf,odt,tiff,tif,jpg,doc,docx'
            ],

        ],
        33 => [
            //NOT REQUIRED example
            'AS_TESSERA' => [],
            'ANA_LINK_ARTICOLI' =>[],

            'IS_BLOGGER' => [
                'required',
                'boolean'
            ],

            'ANA_FILENAME2' => [
                'required_if:IS_BLOGGER,TRUE',
                'mimes:png,pdf,odt,tiff,tif,jpg,doc,docx'
            ],

            'ANA_FILENAME1' => [
                'required_if:IS_BLOGGER,FALSE',
                'mimes:png,pdf,odt,tiff,tif,jpg,doc,docx'
            ],

            'ANA_FILENAME5' => [
                'mimes:png,pdf,odt,tiff,tif,jpg,doc,docx'
            ],
        ],
    ]

];