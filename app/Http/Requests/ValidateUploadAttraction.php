<?php

namespace TripPlan\Http\Requests;

use TripPlan\Http\Requests\Request;


class ValidateUploadAttraction extends Request
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
            'name' => 'required|max:50',
            'type' => 'required',
            'location' => 'required',
            'description' => 'required',
            'image' => 'required',
            'media' => 'required'
        ];
    }
}
