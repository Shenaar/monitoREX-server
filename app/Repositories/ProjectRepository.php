<?php

namespace App\Repositories;

use App\Models;

class ProjectRepository extends AbstractRepository
{

    /**
     *
     */
    public function __construct()
    {
        parent::__construct(new Models\Project());
    }

    /**
     *
     * @param \App\Models\User $owner
     * @param array            $projectData
     *
     * @return \App\Models\Project
     */
    public function create(Models\User $owner, array $projectData)
    {
        $project = new Models\Project();
        $project->name = $projectData['name'];
        $project->api_key = $projectData['api_key'];

        $owner->projects()->save($project);

        return $project;
    }

    /**
     *
     * @param \App\Models\User $owner
     * @param int              $projectId
     *
     * @return \App\Models\Project
     */
    public function get(Models\User $owner, $projectId)
    {
        return $owner->projects()->find($projectId);
    }

    /**
     *
     * @param string $apiKey
     *
     * @return \App\Models\Project
     */
    public function getByApiKey($apiKey)
    {
        return Models\Project::where('api_key', $apiKey)->first();
    }

    /**
     * @param \App\Models\User $owner
     *
     * @return Models\Project[]
     */
    public function getProjectsByOwner(Models\User $owner)
    {
        return $owner->projects;
    }

}
