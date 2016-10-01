<?php

\Route::model('project', \App\Models\Project::class);
\Route::get('/project/{project}', 'ProjectController@getIndex');
