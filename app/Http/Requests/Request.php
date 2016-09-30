<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest {

    public function authorize() {
        return true;
    }

    protected function getValidatorInstance() {
        $this->_prepare();

        return parent::getValidatorInstance();
    }

    protected function _prepare() {
        return;
    }

}
