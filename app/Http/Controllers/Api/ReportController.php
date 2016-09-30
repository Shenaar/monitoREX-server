<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AddReportApiRequest;

class ReportController extends Controller
{

    private $_reportManager;

    public function __construct(\App\Managers\ReportManager $reportManager) 
    {
        $this->_reportManager = $reportManager;
    }

    public function postIndex(AddReportApiRequest $request) 
    {
        $reportData = $request->only(['content']);

        $report = $this->_reportManager->addReport($request->project, $reportData);

        return response($report, 200);
    }

}
