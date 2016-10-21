<?php

namespace App\Http\Controllers\FrontendApi;

use App\Http\Controllers\Controller;
use App\Managers\ProjectManager;
use App\Http\Requests;
use App\Models;

class ProjectController extends Controller
{

    private $_projectManager;

    private $_me;

    public function __construct(ProjectManager $projectManager)
    {
        $this->_projectManager = $projectManager;
        $this->_me = \Auth::user();
    }

    public function getIndex(Models\Project $project)
    {
        return $project;
    }

    public function postIndex(Requests\CreateProjectRequest $request)
    {
        $projectData = $request->only(['name']);

        $project = $this->_projectManager
            ->createProject($this->_me, $projectData);

        return $project;
    }

    public function getList()
    {
        $projects = $this->_projectManager
            ->getProjectRepository()
            ->getProjectsByOwner($this->_me);

        return $projects;
    }

}
