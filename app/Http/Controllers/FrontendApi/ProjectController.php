<?php

namespace App\Http\Controllers\FrontendApi;

use App\Http\Controllers\Controller;
use App\Managers\ProjectManager;
use App\Http\Requests;
use \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProjectController extends Controller {

    private $_projectManager;

    private $_me;

    public function __construct(ProjectManager $projectManager) {
        $this->_projectManager = $projectManager;
        $this->_me = \Auth::user();
    }

    public function getIndex($projectId) {
        $project = $this->_projectManager
            ->getProjectRepository()
            ->getProject($this->_me, $projectId);

        if (!$project) {
            throw new NotFoundHttpException();
        }

        return $project;
    }

    public function postIndex(Requests\CreateProjectRequest $request) {
        $projectData = $request->only(['name']);

        $project = $this->_projectManager->create($this->_me, $projectData);

        return $project;
    }

}
