<?php

namespace App\Models;

class Project extends AbstractModel
{

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

}
