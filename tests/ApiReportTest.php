<?php

class ApiReportTest extends TestCase
{

    public function testNoKeyReport()
    {
        $response = $this->call('POST', '/api/report');

        $this->assertEquals(400, $response->getStatusCode());
    }

    public function testNoContentReport()
    {
        $response = $this->call(
            'POST', '/api/report', [
                'api_key' => $this->_getProject()->api_key
            ]
        );

        $this->assertEquals(422, $response->getStatusCode());
    }

    public function testAddReport()
    {
        DB::beginTransaction();

        $response = $this->call(
            'POST', '/api/report', [
                'api_key' => $this->_getProject()->api_key,
                'content' => 'Test error'
            ]
        );

        $this->assertEquals(200, $response->getStatusCode());

        DB::rollBack();
    }

    private function _getProject()
    {
        return \App\Models\Project::first();
    }

}
