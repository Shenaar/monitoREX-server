<?php

namespace App\Http\Requests\Api;

use App\Repositories\ProjectRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Illuminate\Http\JsonResponse;

class ApiRequest extends \App\Http\Requests\Request {

    public function authorize() {
        $projectRepository = app(ProjectRepository::class);

        $appKey = $this->get('api_key');

        if (!$appKey) {
            throw new BadRequestHttpException('api_key is required');
        }

        $this->project = $projectRepository->getByApiKey($appKey);

        if (!$this->project) {
            return false;
        }

        return true;
    }

    public function response(array $errors) {
        return new JsonResponse($errors, 422);
    }

}
