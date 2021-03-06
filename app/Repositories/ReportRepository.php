<?php

namespace App\Repositories;

use App\Models;

class ReportRepository extends AbstractRepository
{

    /**
     *
     */
    public function __construct()
    {
        parent::__construct(new Models\Report());
    }

    /**
     *
     * @param \App\Models\Project $project
     * @param array               $reportData
     *
     * @return \App\Models\Report
     */
    public function create(Models\Project $project, array $reportData)
    {
        $report = new Models\Report();
        $report->class = $reportData['class'];
        $report->file = $reportData['file'];
        $report->line = $reportData['line'];
        $report->message = $reportData['message'];
        $report->trace = $reportData['trace'];

        $report->status  = $reportData['status'];

        $project->reports()->save($report);

        return $report;
    }

}
