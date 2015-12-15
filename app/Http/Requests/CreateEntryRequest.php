<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateEntryRequest extends Request
{
    protected  $title;

    protected $cover;

    protected $content;

    protected $rawContent;

    protected $isHidden;

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
            'title' => 'required',
            'cover' => 'required',
            'rawContent' => 'required'
        ];
    }
}
