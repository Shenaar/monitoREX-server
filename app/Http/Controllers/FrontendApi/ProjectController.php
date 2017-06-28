<?php

namespace App\Http\Controllers\FrontendApi;

use App\Http\Controllers\Controller;
use App\Managers\ProjectManager;
use App\Http\Requests;
use App\Models;

class ProjectController extends Controller
{

    private $projectManager;

    private $me;

    public function __construct(ProjectManager $projectManager)
    {
        $this->projectManager = $projectManager;
        $this->me = \Auth::user();
    }

    public function getIndex(Models\Project $project)
    {
        return $project;
    }

    public function postIndex(Requests\CreateProjectRequest $request)
    {
        $projectData = $request->only(['name']);

        $project = $this->projectManager
            ->createProject($this->me, $projectData);

        return $project;
    }

    public function getList()
    {
        $projects = $this->projectManager
            ->getProjectRepository()
            ->getProjectsByOwner($this->me);

        return $projects;
    }

}
