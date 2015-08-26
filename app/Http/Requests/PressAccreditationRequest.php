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
        //order is important, the roleFields may override the common ones
        //if you swap those two, common roles will override the specific configurations
        $needs = array_merge($common, $roleFields);

        //array map for imploding each field values like
        //FIELD => ['required', 'email']
        //FIELD => 'required|email'
        $needs = array_map(
            function($contstraints){
                return implode('|', $contstraints);
            }, $needs);
        $needs['human'] .= '|in:' . \Session::get('captcha_answer');
        return $needs;
    }

    /**
     * Set custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'human.required' => trans('press.human.required'),
            'human.numeric' => trans('press.human.numeric'),
            'human.in' => trans('press.human.wrong'),
        ];
    }
}
