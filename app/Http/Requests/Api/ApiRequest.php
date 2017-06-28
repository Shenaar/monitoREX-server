<?php

namespace App\Http\Requests\Api;

use App\Repositories\ProjectRepository;

use Illuminate\Http\JsonResponse;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ApiRequest extends \App\Http\Requests\Request
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

    public function response(array $errors)
    {
        return new JsonResponse($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
    }

}
