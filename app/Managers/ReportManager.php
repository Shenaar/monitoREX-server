<?php

namespace App\Managers;

use App\Repositories\ReportRepository;
use App\Models;

class ReportManager
{

    private $reportRepository;

    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    /**
     *
     * @param \App\Models\Project $project
     * @param array               $reportData
     *
     * @return \App\Models\Report
     */
    public function addReport(Models\Project $project, array $reportData)
    {
        $reportData['status'] = \App\Enums\ReportStatuses::NEW_ONE;

        return $this->getReportRepository()->create($project, $reportData);
    }

    /**
     * @return App\Repositories\ReportRepository
     */
    public function getReportRepository()
    {
        return $this->reportRepository;
    }

}
