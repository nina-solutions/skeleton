<?php

namespace FairHub\Http\Requests;

use FairHub\Http\Requests\Request;
use FairHub\Models\Content;
use Illuminate\Support\Facades\Route;

class HubContentRequest extends Request
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
        if ($this->method() === 'GET') return [];
        $status = 1;
        $newid = '';
        if (Route::current()){
            $params = Route::current()->parameters();
            $type = config('hub-contents.' . $params['contentable_type']);
            $class = $type['model'];

            if ($this->has('id')){
                $contentType = $class::find($this->get('id'));
                $content = $contentType->content;
                $status = (int)$content->status_id;
                $newid = '|different:id';
            }
        }
        return [
            'content[name]' => 'required',
            'content[description]' => 'required',
            'content[start]' => 'required|date',
            'content[end]' => 'required|date|after:start',
            'content[status_id]' => "required|integer|exists:statuses,id|exists:status_transitions,to_status_id,from_status_id,$status",
            'content[context_id]' => 'required|integer|exists:contexts,id',
            'content[content_id]' => "exists:contents,id|integer$newid",
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
