<?php

namespace App\Http\Requests;

class CreateProjectRequest extends Request
{

    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }

}
