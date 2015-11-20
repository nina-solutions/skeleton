<?php

namespace FairHub\Http\Requests;

use FairHub\Http\Requests\Request;
use FairHub\Models\Content;

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
        $newid = '';
        if ($this->has('id')){
            $content = Content::find($this->get('id'));
            $status = (int)$content->status_id;
            $newid = '|different:id';
        }
        return [
            'name' => 'required',
            'description' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after:start',
            'status_id' => "required|integer|exists:statuses,id|exists:status_transitions,to_status_id,from_status_id,$status",
            'context_id' => 'required|integer|exists:contexts,id',
            'content_id' => "exists:contents,id|integer$newid",
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
