<?php

namespace App\Services\Reporter;

use App\Models;

class SimpleReporter extends Reporter
{

    /**
     *
     * @param Models\Project $project
     * @param array $reportData
     *
     * @return Models\Report
     */
    public function createReport(Models\Project $project, array $reportData)
    {
        return $this->reportRepository->create($project, $reportData);
    }

}
