<?php

class ApiProjectTest extends TestCase
{

    public function testProject()
    {
        $response = $this->call('GET', '/frontend/api/project/' . $this->getProject()->id);

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testNoProject()
    {
        $response = $this->call('GET', '/frontend/api/project/-1');

        $this->assertEquals(404, $response->getStatusCode());
    }

    private function getProject()
    {
        $project = \App\Models\Project::first();
        $this->assertNotNull($project);

        return $project;
    }

}
