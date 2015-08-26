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

        $common = config('press-accreditation.fields.0');
        $roleFields = config('press-accreditation.fields.'.$this->channel);
        $needs = array_merge($common, $roleFields);

        //array map for imploding each field values like
        //FIELD => ['required', 'email']
        //FIELD => 'required|email'
        $needs = array_map(
            function($contstraints){
                return implode('|', $contstraints);
            }, $needs);
        return $needs;
    }

    public function roleMandatoryFields(){

        return [];
    }
}
