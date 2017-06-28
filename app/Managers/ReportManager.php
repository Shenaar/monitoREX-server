<?php

namespace App\Managers;

use App\Repositories\ReportRepository;
use App\Models;
use App\Services\Reporter\Reporter;

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
        /* @var Reporter */
        $reporter = app(Reporter::class);
        $reportData['status'] = \App\Enums\ReportStatuses::NEW_ONE;

        return $reporter->createReport($project, $reportData);
    }

    /**
     * @return App\Repositories\ReportRepository
     */
    public function getReportRepository()
    {
        return $this->reportRepository;
    }

}
