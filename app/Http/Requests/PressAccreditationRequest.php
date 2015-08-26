<?php

namespace FairHub\Http\Requests;

use FairHub\Http\Requests\Request;

class PressAccreditationRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $common =  [
            'ANA_NOME' => 'required',
            'ANA_COGNOME' => 'required',
            'ANA_EMAIL' => 'required|email',
            'ANA_CELLULARE' => 'required',
            'SOC_ID' => 'required',
            'UTY_ID' => 'required',
            'AS_NOME_TESTATA' => 'required',
            'AS_ADDRESS' => 'required',
            'AS_CITY' => 'required',
            'AS_CAP' => 'required',
            'AS_STATES' => 'required',

            'ANA_CONSENSO' => 'required',

            'capcha' => 'required',
        ];
        $roleFields = $this->roleMandatoryFields();

        $needs = array_merge($common, $roleFields);

        return $needs;
    }

    public function roleMandatoryFields(){

        return [];
    }
}
