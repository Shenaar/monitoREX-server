<?php

namespace App\Http\Requests\Api;

class AddReportApiRequest extends ApiRequest
{

    public function rules()
    {
        return [
            'content' => 'required'
        ];
    }

}
