<?php

namespace App\Http\Requests\Api;

class AddReportApiRequest extends ApiRequest
{

    public function rules()
    {
        return [
            'class'   => 'required',
            'file'    => 'required',
            'line'    => 'required|numeric',
            'message' => 'required'
        ];
    }

}
