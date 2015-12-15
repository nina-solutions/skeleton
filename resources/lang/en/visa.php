<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Visa Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the Fair Hub web app
    | Visa Accreditation Section
    |
    */

    'register' => 'Visa Registration',



    //form labels
    'form' => [
        'fillTheForm' => 'Fill in the form',
        'titolo' => 'Title',
        'titolo_mr' => 'Mr.',
        'titolo_mrs' => 'Mrs.',
        'titolo_miss' => 'Miss.',
        'nome' => 'First Name (as per passport)',
        'cognome' => 'Last Name (as per passport)',
        'posizione' => 'Job Title',
        'ragsoc' => 'Company',
        'indirizzo' => 'Address',
        'citta' => 'City',
        'stato' => 'State/Province',
        'cap' => 'Zip /Postal Code',
        'nazione' => 'Country',
        'tel' => 'Telephone (include Country Code)',
        'fax' => 'Fax (include Country Code)',
        'email' => 'Email',
        'www' => 'Company Website',
        'passaporto' => 'Passport no.',
        'passaporto_data_emissione' => 'Date of issue (dd/mm/yyyy)',
        'passaporto_data_scadenza' => 'Exp. date (dd/mm/yyyy)',
        'luogo_nascita' => 'Place of Birth',
        'data_nascita' => 'Date of Birth (dd/mm/yyyy)',
        'attivita' => 'Business Activity',
        'settore_interesse' => 'Sector of Interest',
        'settore_interesse_other' => 'Other',
        'padiglione' => 'Hall',
        'stand' => 'Stand',

        'whereYouApplyVisa' => 'Where will you apply for visa?',
        'nazioni_ambasciate' => 'Choose a country',
        'consolato_o_ambasciata' => 'Embassy',

        'durationOfYourStay' => 'Please specify the duration of your stay in Italy',
        'dal' => 'From (dd/mm/yyyy)',
        'al' => 'To (dd/mm/yyyy)',

        'information_letter' => 'Information Letter of invitation Visa.',
        'information_letter_text' => 'Pursuant to article 13 of Legislative Decree no. 196/2003 “Personal Data Protection Code”, the Ente Autonomo per le Fiere di Verona informs you that your personal data will be collected and processed only to provide you with the letter of invitation upon your request. The provision of personal data is compulsory to provide you with the letter of invitation and the consequences of failure to provide for them results in the impossibility for the Entity to provide the letter of invitation. The data will be recorded and processed on paper or electronically. Data may be processed by internal persons in their capacity as persons in charge of the processing and/or data processors. Data may be disclosed to companies which, on behalf of the Entity, carry out data processing, appointed as external data processors. The list is constantly updated and you can easily and freely know it by sending a written notice to the address below. Data will not be disseminated in any way. In relation to personal data processing carried out by the Entity, you shall be entitled to exercise the rights referred to in Article 7 of Legislative Decree 196/2003, by sending a notice in writing to the address indicated below or via e-mail to privacy@veronafiere.it The Data Controller is the Ente Autonomo per le Fiere di Verona with registered office in Viale del Lavoro no. 8 - 37135 Verona. Phone: 045 8298111 – Fax: 045 82 98 288 - E-mail: info@veronafiere.it The Data Supervisor is the Manager pro tempore of Human Resources Organization and Systems. Last update: June 2013',

        'request' => 'Request',
        'submit' => 'Send',
        'reset' => 'Reset',
    ],


    'messages' => [
        'success' => "",
        'passport_exists' => 'This passport number has already been entered for this country.',
    ],


    //Email labels
    'email' => [
        'object' => 'Nuova richiesta VISA',
        'text' => "E' arrivata una nuova richiesta VISA!<br />
		Manifestazione: <b>:code</b><br />:user",
        'footer' => "&copy; Ente Autonomo per le Fiere di Verona",
    ],


    'thankyou' => [
        'title' => "Thank you for submitting your request.",
        'text' => "Your official letter of invitation will be sent by email only if your request is positively evaluated."
    ]




];