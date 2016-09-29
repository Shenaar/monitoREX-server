<?php

namespace App\Managers;

use App\Repositories\ReportRepository;
use App\Models;

class ReportManager {

    private $_reportRepository;

    public function __construct(ReportRepository $reportRepository) {
        $this->_reportRepository = $reportRepository;
    }

    /**
     *
     * @param \App\Models\Project $project
     * @param array $reportData
     * @return \App\Models\Report
     */
    public function addReport(Models\Project $project, array $reportData) {
        return $this->getReportRepository()->create($project, $reportData);
    }

    /**
     * @return App\Repositories\ReportRepository
     */
    public function getReportRepository() {
        return $this->_reportRepository;
    }

}
