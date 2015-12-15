<?php
return [

    'types' => [

        'visitor' => 'VISITATORE',
        'expositor' => 'ESPOSITORE',
        'co-expositor' => 'CO-ESPOSITORE'

    ],

    'fields' => [

            //Hidden Fields
            /*'hiddenFields' => [
                'fields' => [

                    //Sono davvero richiesti?
                    'VISA_MANIF' => [
                        'type' => 'hidden',
                        'label' => false,
                        'rules' => [ 'required' ]
                    ],

                    'VISA_ANALISI_IN' => [
                        'type' => 'hidden',
                        'label' => false,
                        'rules' => [ 'required' ]
                    ],

                    'VISA_ANNO' => [
                        'type' => 'hidden',
                        'label' => false,
                        'rules' => [ 'required' ]
                    ],

                    'VISA_TIPORICHIESTA' => [
                        'type' => 'hidden',
                        'label' => false,
                        'rules' => [ 'required' , 'in:VISITATORE,ESPOSITORE,CO-ESPOSITORE' ]
                    ],
                ]
            ],*/

            //Dati Personali
            'datiPersonali' => [
                'legend' => 'visa.form.fillTheForm',
                'fields' => [

                    'VISA_TITOLO' => [
                        'type' => 'radio',
                        'label' => 'visa.form.titolo',
                        'options' => ['Mr.' => 'visa.form.titolo_mr', 'Mrs.' => 'visa.form.titolo_mrs', 'Miss.' => 'visa.form.titolo_miss' ],
                        'rules' => [ 'required'  ]
                    ],

                    'VISA_NOME' => [
                        'type' => 'text',
                        'label' => 'visa.form.nome',
                        'rules' => [ 'required' , 'alpha_num' ]
                    ],

                    'VISA_COGNOME' => [
                        'type' => 'text',
                        'label' => 'visa.form.cognome',
                        'rules' => [ 'required' , 'alpha_num' ]
                    ],

                    'VISA_POSIZIONE' => [
                        'type' => 'text',
                        'label' => 'visa.form.posizione',
                        'rules' => [ 'required' , 'alpha_num' ]
                    ],

                    'VISA_RAGSOC' => [
                        'type' => 'text',
                        'label' => 'visa.form.ragsoc',
                        'rules' => [ 'required' , 'alpha_num' ]
                    ],

                    'VISA_UBICAZIONE1' => [
                        'type' => 'text',
                        'label' => 'visa.form.indirizzo',
                        'rules' => [ 'required' , 'alpha_num' ]
                    ],

                    'VISA_LOCALITA' => [
                        'type' => 'text',
                        'label' => 'visa.form.citta',
                        'rules' => [ 'required' , 'alpha_num' ]
                    ],

                    'VISA_STATO' => [
                        'type' => 'text',
                        'label' => 'visa.form.stato',
                        'rules' => [ 'required' , 'alpha_num' ]
                    ],

                    'VISA_CAP' => [
                        'type' => 'text',
                        'label' => 'visa.form.cap',
                        'rules' => [ 'required' , 'alpha_num' ]
                    ],

                    'VISA_NAZIONE' => [
                        'type' => 'select',
                        'label' => 'visa.form.nazione',
                        'options' => [],
                        'rules' => [ 'required' , 'alpha_num' ]
                    ],


                    'VISA_TEL' => [
                        'type' => 'text',
                        'label' => 'visa.form.tel',
                        'rules' => [ 'required'  ]
                    ],

                    'VISA_FAX' => [
                        'type' => 'text',
                        'label' => 'visa.form.fax',
                        'rules' => [ 'required' ]
                    ],

                    'VISA_EMAIL' => [
                        'type' => 'email',
                        'label' => 'visa.form.email',
                        'rules' => [ 'required', 'email' ]
                    ],

                    'VISA_WWW' => [
                        'type' => 'url',
                        'label' => 'visa.form.www',
                        'rules' => [ 'required', 'url' ]
                    ],

                    'VISA_NPASS' => [
                        'type' => 'text',
                        'label' => 'visa.form.passaporto',
                        'rules' => [ 'required' ]
                    ],

                    'VISA_PASSDATAEMISSIONE' => [
                        'type' => 'text',
                        'label' => 'visa.form.passaporto_data_emissione',
                        'rules' => [ 'required', 'date_format:d/m/Y' ]
                    ],

                    'VISA_PASSDATASCAD' => [
                        'type' => 'text',
                        'label' => 'visa.form.passaporto_data_scadenza',
                        'rules' => [ 'required', 'date_format:d/m/Y', 'after:today' ]
                    ],

                    'VISA_LUOGONASCITA' => [
                        'type' => 'text',
                        'label' => 'visa.form.luogo_nascita',
                        'rules' => [ 'required' ]
                    ],

                    'VISA_DATANASCITA' => [
                        'type' => 'text',
                        'label' => 'visa.form.data_nascita',
                        'rules' => [ 'required', 'date_format:d/m/Y' ]
                    ],

                    //here goes custom fields by visa type



                ]
            ],


            //Where will you apply for visa?
            'consolato' => [
                'legend' => 'visa.form.whereYouApplyVisa',
                'fields' => [
                    'VISA_ELENCONAZIONIAMBASCIATE' => [
                        'type' => 'select',
                        'label' => 'visa.form.nazioni_ambasciate',
                        'options' => [],
                        'rules' => [ 'required' ]
                    ],

                    'VISA_VITS_CODICE' => [
                        'type' => 'vits_codice',
                        'label' => 'visa.form.consolato_o_ambasciata',
                        'rules' => [ 'required' ]
                    ],
                ]
            ],


            //Where will you apply for visa?
            'permanenza' => [
                'legend' => 'visa.form.durationOfYourStay',
                'fields' => [
                    'VISA_DAL' => [
                        'type' => 'text',
                        'label' => 'visa.form.dal',
                        'rules' => [ 'required', 'date_format:d/m/Y', 'after:today' ]
                    ],

                    'VISA_AL' => [
                        'type' => 'text',
                        'label' => 'visa.form.al',
                        'rules' => [ 'required', 'date_format:d/m/Y', 'after:today',  'after:VISA_DAL' ]
                    ],
                ]
            ],

    ],



    //Fields only if Visitatore
    'visitatoreFields' => [
        'VISA_BACTIVITY' => [
            'type' => 'textarea',
            'label' => 'visa.form.attivita',
            'rules' => [ 'required' ]
        ],

        'VISA_SETTOREINTERESSE' => [
            'type' => 'select',
            'label' => 'visa.form.settore_interesse',
            'options' => [],
            'rules' => [ 'required' ]
        ],

        'VISA_SETTOREINTERESSE_OTHER' => [
            'type' => 'text',
            'label' => 'visa.form.settore_interesse_other',
            'rules' => [ 'required_if:VISA_SETTOREINTERESSE,Other' ]
        ],
    ],


    //Fields only if not Visitatore

    'notVisitatoreFields' => [

        'VISA_PAD' => [
            'type' => 'text',
            'label' => 'visa.form.padiglione',
            'rules' => [ 'required' , 'digits_between:0,16' ]
        ],

        'VISA_STAND' => [
            'type' => 'text',
            'label' => 'visa.form.stand',
            'rules' => [ 'required' , 'digits_between:0,16' ]
        ],

    ],



];

