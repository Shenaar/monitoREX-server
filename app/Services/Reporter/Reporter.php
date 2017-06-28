<?php

namespace App\Services\Reporter;

use App\Repositories\ReportRepository;
use App\Models;

abstract class Reporter
{

    /**
     * @var ReportRepository
     */
    protected $reportRepository;

    /**
     * @param ReportRepository $reportRepository
     */
    public function __construct(ReportRepository $reportRepository)
    {
        $this->reportRepository = $reportRepository;
    }

    /**
     *
     * @param Models\Project $project
     * @param array $reportData
     *
     * @return Models\Report
     */
    abstract public function createReport(Models\Project $project, array $reportData);
}
