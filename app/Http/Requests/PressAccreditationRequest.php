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
        return [
            'ANA_NOME' => 'required',
            'ANA_COGNOME' => 'required',
            'ANA_EMAIL' => 'required|email',
        ];
    }
}
