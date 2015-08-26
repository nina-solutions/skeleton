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
    'filled'               => 'Il campo :attribute &egrave; obbligatorio.',
    'exists'               => 'The selected :attribute is invalid.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'max'                  => [
        'numeric' => ':attribute deve essere minore di :max.',
        'file'    => ':attribute deve essere minore di :max kilobytes.',
        'string'  => ':attribute deve avere meno di :max caratteri.',
        'array'   => 'Il campo :attribute deve contenere al pi&ugrave; :max elementi.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => ':attribute deve valere almeno :min.',
        'file'    => ':attribute deve avere almeno :min kilobytes.',
        'string'  => ':attribute deve avere almeno :min caratteri.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'Il :attribute selezionato non &grave; valido.',
    'numeric'              => 'Il campo :attribute deve essere un intero.',
    'regex'                => 'Il formato del campo :attribute non &egrave valido.',
    'required'             => 'Il campo :attribute &egrave; obbligatorio.',
    'required_if'          => 'Il campo :attribute &egrave; obbligatorio quando :other vale :value.',
    'required_with'        => 'Il campo :attribute &egrave; obbligatorio quando :values &egrave presente.',
    'required_with_all'    => 'Il campo :attribute &egrave; obbligatorio quando :values sono presente.',
    'required_without'     => 'Il campo :attribute &egrave; obbligatorio quando :values non &egrave presente.',
    'required_without_all' => 'Il campo :attribute &egrave; obbligatorio quando nessuno tra :values &egrave presente.',
    'same'                 => 'I campi :attribute e :other devono coincidere.',
    'size'                 => [
        'numeric' => 'Il campo :attribute deve avere :size.',
        'file'    => 'Il campo :attribute deve avere :size kilobytes.',
        'string'  => 'Il campo :attribute deve avere :size caratteri.',
        'array'   => 'Il campo :attribute deve contenere :size elementi.',
    ],
    'string'               => 'Il campo :attribute deve essere uns stringa.',
    'timezone'             => 'Il campo :attribute deve essere una timezone valida.',
    'unique'               => 'Il campo :attribute &egrave; gi&agrave; stato inserito.',
    'url'                  => 'Il formato del campo :attribute non &egrave; valido.',

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
        'ANA_NOME' => 'Nome',
    ],

];
