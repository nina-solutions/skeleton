<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Press Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the Fair Hub web app
    | Press Accreditation Section
    |
    */

    'register' => 'Registrazione',
    'contact' => [
        'head' => 'Informazioni di contatto',
        'name' => 'Nome',
        'surname' => 'Cognome',
        'email' => 'Indirizzo E-mail',
        'cardnr' => 'Nr. tessera dell\'Unione de Giornalisti',
        'mobile' => 'Cellulare',
        'qualification' => 'Qualifica',
        'workfor' => 'Lavori per',
        'twitter' => 'Account Twitter',
        'other' => 'Altro',
    ],
    'newspaper' => [
        'head' => 'Informazioni relative alla testata e/o testate rappresentate',
        'name' => 'Testata e/o testate rappresentate',
        'address' => 'Indirizzo',
        'city' => 'Citt&agrave;',
        'zip' => 'CAP',
        'nationality' => 'Nazionalit&agrave;',
        'province' => 'Provincia',
        'schedule' => 'Periodicit&agrave;',
        'email' => 'E-mail redazione',
        'phone' => 'Telefono fisso',
        'website' => 'sito web',
        'first' => 'Se collabori per più testate inserisci l\'indirizzo della prima citata',
    ],
    'firsttime' => [
        'yes' => 'S&igrave;',
        'no' => 'No',
        'head' => '&Egrave; la prima volta che visiti la manifestazione?',
    ],
    'upload' => [
        'head' => 'Esegui qui l\'upload dei documenti richiesti, in formato PDF, JPG o DOC.<br>Il totale delle dimensioni degli allegati non può superare i 3 megabyte (3Mb).',
        'file1' => [
            '20' => 'Copia della tessera dell\'Ordine dei giornalisti',
            '23' => [
                '0' =>'Copia della lettera d\'incarico della testata/radio/tv/sito web registrato per cui si collabora, firmata dal direttore o caporedattore',
            ],
            '24' => [
                '1' => 'Lettera d\'incarico della testata per cui ci collabora, firmata dal direttore o caporedattore',
                '0' => 'Lettera d\'incarico dell\'emittente per cui ci collabora, firmata dal direttore o caporedattore, specificando la trasmissione/programma su cui andrà in onda il servizio',
            ],
            '33' => 'Copia di un documento che attesti la vostra attivit &agrave; giornalistica',
        ],
        'file2' => [
            '23' => 'Copia del colophon o delle indicazioni sulla gerenza della testata/radio/tv/sito web registrato',
            '24' => 'Copia di un proprio documento d\'identità valido',
            '33' => 'Copia di un proprio documento d\'identità valido',
        ],
        'file3' => [
            '23' => 'Copia di un proprio documento d\'identità valido',
        ],
        'file4' => [
            '24' => 'Servizio fotografico recentemente pubblicato che testimoni l\'effettiva attività di fotoreporter svolta dal richiedente. Per chi ha già partecipato alla precedente edizione della manifestazione, il materiale allegato deve testimoniarne l\'avvenuta copertura',
        ],
        'file5' => [
            '23' => 'Copia di un articolo recente pubblicato a propria firma su testate cartacee, oppure link ad un servizio audio/video o ad un articolo pubblicato su testate online registrate, che testimoni l\'effettiva attività giornalistica svolta nel settore inerente alla manifestazione per cui si richiede l\'accredito. Per chi ha già partecipato alla precedente edizione della manifestazione, il materiale allegato deve testimoniarne l\'avvenuta copertura',
            '24' => 'Eventuale tessera di appartenenza all\'AIRF e/o dell\'Ordine dei giornalisti',
            '33' => 'Copia di un articolo recente pubblicato a propria firma su testate cartacee, riguardante l\'evento',
        ],
        'analink' => [
            '23' => 'Per chi presente alla precedente edizione della manifestazione, link ad un post/articolo pubblicato sul proprio blog e relativo all\'evento in questione',
            '33' => [
                '1' => 'Per Bloggers presenti alla precedente edizione della manifestazione, link ad un post/articolo pubblicato sul proprio blog e relativo all\'evento in questione',
                '0' => 'Link verso meteriale audio/video o articoli online che riguardino l\'evento',
            ],
        ],



        'letter' => 'Copia della lettera d\'incarico della testata/radio/tv/sito web registrato per cui si collabora, firmata dal direttore o caporedattore',
        'colophon' => 'Copia del colophon o delle indicazioni sulla gerenza della testata/radio/tv/sito web registrato',
        'document' => 'Copia di un proprio documento di intentit&agrave;',
        'photo' => 'Foto del richiedente, stile fototessera',
        'article' => 'Copia di un articolo recente pubblicato a propria firma su testate cartacee, oppure link ad un servizio audio/video o ad un articolo pubblicato su testate online registrate, che testimoni l\'effettiva attività giornalistica svolta nel settore inerente alla manifestazione per cui si richiede l\'accredito. Per chi ha gi&agrave; partecipato alla precedente edizione della manifestazione, il materiale allegato deve testimoniarne l\'avvenuta copertura',
        'link' => 'Per chi presente alla precedente edizione della manifestazione, link ad un post/articolo pubblicato sul proprio blog e relativo all\'evento in questione',
    ],
    'communications' => [
        'head' => 'Vostre comunicazioni',
    ],
    'privacy' => [
        'head' => 'Informativa sulla privacy',
        'checkbox' => 'Letta l\'<a href=":url">informativa sulla privacy</a> ai sensi del Dlg 196/03, acconsento al trattamento dei dati personali per le finalit&agrave; e con le modalit&agrave; specificatamente indicate nell\'informativa stessa',
    ],
    'actions' => [
        'head' => 'Invia richiesta accredito',
        'description' => 'Una schermata di conferma testimonia il buon esito dell\'invio della richiesta di accredito. Eventuali errori nella procedura di compilazione del form sono evidenziati in rosso.',
        'notice' => 'Prima di inviare la richiesta assicurati di aver compilato tutti i campi obbligatori (contrassegnati da asterisco)',
        'submit' => 'Invia richiesta per :fair_name',
        'reset' => 'Cancella'
    ],

    'human' => [
        'head' => 'Domanda di controllo',
        'question' => 'Scrivi il risultato di :a + :b',
        'placeholder' => 'Risultato',
        'wrong' => 'La riposta alla domanda di controllo non risulta corretta',
        'numeric' => 'Nella domanda di controllo vanno inseriti solo numeri',
        'required' => 'Per favore ripondi alla domanda di controllo',
    ],

    'select' => [
        'qualification' => 'Seleziona la qualifica',
        'workfor' => 'Seleziona un\'opzione',
        'nationality' => 'Seleziona una nazione',
        'schedule' => 'Seleziona la periodicit&agrave;',
        'province' => 'Seleziona una provincia',
    ],

    'emails' =>[
        'signature' => "Cordiali saluti<br>\nServizio Stampa Veronafiere - :fair<br>\nTel.: +39 045 8298 242 - 285<br>\ne-mail:pressoffice@veronafiere.it",
        'thanks' => "Gentile Collega,<br />\nAbbiamo ricevuto la sua cortese richiesta di accredito stampa per :fair, in programma a Verona dal :from al :until.<br />\nIn seguito alla verifica dei dati inseriti riceverà una risposta dal Servizio Stampa.",
        'subject' => "Richiesta accredito stampa - :fair",
    ],

    'errors' => [
        'isblogger' => 'Il campo :attribute &egrave; obbligatorio.',
    ],

    'messages' => [
        'success' => 'La vostra richiesta &egrave; stata gestita con successo, riveder&agrave; un\'e-mail di conferma.'
    ],
];