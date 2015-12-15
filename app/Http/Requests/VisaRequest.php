<?php

namespace FairHub\Http\Requests;

use FairHub\Http\Requests\Request;
use FairHub\Models\VISA_RICHIESTA;

class VisaRequest extends Request
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
        $rules = [];

        if (count($this->fields) > 0) {
            foreach ($this->fields as $fieldset) {
                if (count($fieldset["fields"]) > 0) {
                    foreach ($fieldset["fields"] as $fieldname => $field) {
                        $rules[$fieldname] = $field["rules"];
                    }
                }
            }
        }




        return $rules;
    }

    /**
     * Set custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [

//            'VISA_PASSDATASCAD.after' => trans('visa.pass_data_scad.after'),
//            'VISA_DAL.after' => trans('visa.visa_al.after'),
//            'VISA_AL.after' => trans('visa.visa_al.after'),
//            'VISA_SETTOREINTERESSE_OTHER.required_if' => trans('visa.interesse_other.required_if'),

            'human.required' => trans('press.human.required'),
            'human.numeric' => trans('press.human.numeric'),
            'human.in' => trans('press.human.wrong'),

        ];
    }

}
