<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'email'                => 'The :attribute must be a valid email address.',
    'filled'               => 'The :attribute field is required.',
    'exists'               => 'The selected :attribute is invalid.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'ANA_NOME' => 'Name',
        'ANA_COGNOME' => 'Surname',
        'ANA_EMAIL' => 'Email',
        'ANA_CELLULARE' => 'Mobile phone',
        'AS_TESSERA' => 'Card nr.',
        'UTY_ID' => 'Qualification',
        'ANA_TWITTER_ACCOUNT' => 'Twitter Account',
        'AS_NOME_TESTATA' => 'Journal name',
        'AS_ADDRESS' => 'Journal address',
        'AS_CITY' => 'Journal city',
        'AS_CAP' => 'Journal ZIP code',
        'AS_STATES' => 'Journal nationality',
        'AS_COUNTRY' => 'Journal region',
        'AS_EMAIL' => 'Publisher e-mail',
        'AS_PHONE' => 'Journal landline',
        'AS_WWW' => 'Journal website',
        'ANA_PRIMA_VISITA' => 'Indicate if is the first visit',
        'AS_COMUNICAZIONI' => 'Communications',
        'ANA_CONSENSO' => 'Consent',
        'ANA_FILENAME1' => 'Letter',
        'ANA_FILENAME2' => 'Document',
        'ANA_FILENAME3' => 'Document',
        'ANA_FILENAME4' => 'Recent work',
        'ANA_FILENAME5' => 'Card',


        //VISA
        'VISA_TITOLO' => 'Title', //trans('form.visa.titolo')
        'VISA_NOME' => 'First Name (as per passport)', //trans('form.visa.nome'),
        'VISA_COGNOME' => 'Last Name (as per passport)', //Etc..
        'VISA_POSIZIONE' => 'Job Title',
        'VISA_RAGSOC' => 'Company',
        'VISA_UBICAZIONE1' => 'Address',
        'VISA_LOCALITA' => 'City',
        'VISA_STATO' => 'State/Province',
        'VISA_CAP' => 'Zip /Postal Code',
        'VISA_NAZIONE' => 'Country',
        'VISA_TEL' => 'Telephone (include Country Code)',
        'VISA_FAX' => 'Fax (include Country Code)',
        'VISA_EMAIL' => 'Email',
        'VISA_WWW' => 'Company Website',
        'VISA_NPASS' => 'Passport no.',
        'VISA_PASSDATAEMISSIONE' => 'Date of issue (dd/mm/yyyy)',
        'VISA_PASSDATASCAD' => 'Exp. date (dd/mm/yyyy)',
        'VISA_LUOGONASCITA' => 'Place of Birth',
        'VISA_DATANASCITA' => 'Date of Birth (dd/mm/yyyy)',
        'VISA_BACTIVITY' => 'Business Activity',
        'VISA_SETTOREINTERESSE' => 'Sector of Interest',
        'VISA_SETTOREINTERESSE_OTHER' => 'Other',
        'VISA_ELENCONAZIONIAMBASCIATE' => 'Choose a country',
        'VISA_VITS_CODICE' => 'Embassy',
        'VISA_DAL' => 'From (dd/mm/yyyy)',
        'VISA_AL' => 'To (dd/mm/yyyy)',

        'VISA_PAD' => 'Hall',
        'VISA_STAND' => 'Stand'
    ],

];
