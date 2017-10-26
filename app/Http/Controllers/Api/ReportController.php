<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddReportApiRequest;
use App\Managers\ReportManager;

class ReportController extends Controller
{
    /**
     * @var ReportManager
     */
    private $reportManager;

    /**
     * ReportController constructor.
     *
     * @param ReportManager $reportManager
     */
    public function __construct(ReportManager $reportManager)
    {
        $this->reportManager = $reportManager;
    }

    /**
     * @param AddReportApiRequest $request
     *
     * @return \App\Models\Report
     */
    public function postIndex(AddReportApiRequest $request)
    {

        $reportData = $request->all([
            'class', 'file', 'line', 'message', 'trace'
        ]);

        $report = $this->reportManager
            ->addReport($request->project, $reportData);

        return $report;
    }
}
