<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddReportApiRequest;

class ReportController extends Controller
{

    private $reportManager;

    public function __construct(\App\Managers\ReportManager $reportManager)
    {
        $this->reportManager = $reportManager;
    }

    public function postIndex(AddReportApiRequest $request)
    {

        $reportData = $request->only([
            'class', 'file', 'line', 'message', 'trace'
        ]);

        $report = $this->reportManager
            ->addReport($request->project, $reportData);

        return $report;
    }

}
