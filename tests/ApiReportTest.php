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

        $this->assertEquals(422, $response->getStatusCode(), $response->getContent());
    }

    public function testAddReport()
    {
        DB::beginTransaction();

        $project = $this->getProject();

        $ex = [
            'class' => 'Illuminate\Database\Eloquent\ModelNotFoundException',
            'file' => '/home/vagrant/monitorex-server/vendor/laravel/framework/src/Illuminate/Routing/Router.php',
            'line' => 963,
            'message' => 'No query results for model [App\Models\Project].',
            'trace' => 'trace'
        ];

        $response = $this->call(
            'POST', '/api/report', array_merge($ex, [
                'api_key' => $project->api_key
            ])
        );

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertArraySubset($ex, json_decode($response->getContent(), true));

        DB::rollBack();
    }


    public function testAddReportNoTrace()
    {
        DB::beginTransaction();

        $project = $this->getProject();

        $ex = [
            'class' => 'Illuminate\Database\Eloquent\ModelNotFoundException',
            'file' => '/home/vagrant/monitorex-server/vendor/laravel/framework/src/Illuminate/Routing/Router.php',
            'line' => 963,
            'message' => 'No query results for model [App\Models\Project].'
        ];

        $response = $this->call(
            'POST', '/api/report', array_merge($ex, [
                'api_key' => $project->api_key
            ])
        );

        $this->assertEquals(200, $response->getStatusCode());

        $this->assertArraySubset($ex, json_decode($response->getContent(), true));

        DB::rollBack();
    }

    private function getProject()
    {
        $project = \App\Models\Project::first();
        $this->assertNotNull($project);

        return $project;
    }

}
