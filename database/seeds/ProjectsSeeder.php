<?php

use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user = \App\Models\User::find(1);
        $projectManager = app(\App\Managers\ProjectManager::class);
        $projectManager->createProject($user, ['name' => 'Seeded project']);
    }

}
