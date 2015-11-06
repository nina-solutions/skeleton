<?php

namespace FairHub\Http\Requests;

use FairHub\Http\Requests\Request;

class ContentRequest extends Request
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
        $status = 1;
        if ($this->has('id')){
            $content = Content::find($this->get('id'));
            $status = $content->status_id;
        }
        return [
            'name' => 'required',
            'description' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'status_id' => "required|exists:statuses,id|exists:status_transitions,to_status_id,from_status_id,$status",
            'context_id' => 'required|exists:contexts,id',
            'content_id' => 'exists:contents,id|different:id',
        ];
    }

    /**
     * Set custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [

        ];
    }
}
