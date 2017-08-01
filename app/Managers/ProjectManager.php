<?php

namespace App\Managers;

use App\Repositories\ProjectRepository;
use App\Models;

class ProjectManager
{

    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     *
     * @param \App\Models\User $owner
     * @param array            $projectData
     *
     * @return \App\Models\Project
     */
    public function createProject(Models\User $owner, array $projectData)
    {
        $projectData['api_key'] = $this->generateApiKey();

        return $this->getProjectRepository()->create($owner, $projectData);
    }

    /**
     *
     * @param \App\Models\Project $project
     *
     * @return string
     */
    public function generateApiKey(Models\Project $project = null)
    {
        return str_random(32);
    }

    /**
     * @return \App\Repositories\ProjectRepository
     */
    public function getProjectRepository()
    {
        return $this->projectRepository;
    }

}
