<?php

namespace App\Repositories;

use App\Models;

class ReportRepository
{

    /**
     *
     * @param \App\Models\Project $project
     * @param array               $reportData
     * @return \App\Models\Report
     */
    public function create(Models\Project $project, array $reportData) 
    {
        $report = new Models\Report();
        $report->content = $reportData['content'];

        $project->reports()->save($report);

        return $report;
    }

}
