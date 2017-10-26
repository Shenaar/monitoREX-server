<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Request;
use App\Models\Project;
use App\Repositories\ProjectRepository;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * @property Project $project
 */
class ApiRequest extends Request
{

    public function authorize()
    {
        if (!$this->project) {
            return false;
        }

        return true;
    }

    protected function prepare()
    {
        $projectRepository = app(ProjectRepository::class);

        $apiKey = $this->get('api_key');

        if (!$apiKey) {
            throw new BadRequestHttpException('api_key is required');
        }

        $this->project = $projectRepository->getByApiKey($apiKey);
    }

    public function rules()
    {
        return [
            'api_key' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
