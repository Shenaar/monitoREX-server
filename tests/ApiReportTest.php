<?php

class ApiReportTest extends TestCase
{

    public function testNoKeyReport()
    {
        $response = $this->call('POST', '/api/report');

        $this->assertEquals(400, $response->getStatusCode());
    }

    public function testNoProject()
    {
        $response = $this->call('POST', '/api/report', [
            'api_key' => str_random(10)
        ]);

        $this->assertEquals(403, $response->getStatusCode());
    }

    public function testNoContentReport()
    {
        $response = $this->call(
            'POST', '/api/report', [
                'api_key' => $this->getProject()->api_key
            ]
        );

        $this->assertEquals(422, $response->getStatusCode());
    }

    public function testAddReport()
    {
        DB::beginTransaction();

        $project = $this->getProject();

        $response = $this->call(
            'POST', '/api/report', [
                'api_key' => $project->api_key,
                'content' => 'Test error'
            ]
        );

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertArraySubset([
            'content'    => 'Test error',
            'project_id' => $project->id,
            'status'     => \App\Enums\ReportStatuses::NEW_ONE
        ], json_decode($response->getContent(), true));

        DB::rollBack();
    }

    private function getProject()
    {
        $project = \App\Models\Project::first();
        $this->assertNotNull($project);

        return $project;
    }

}
