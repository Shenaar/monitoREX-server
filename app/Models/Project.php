<?php

namespace App\Models;

/**
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property Report[] $reports
 * @property string $name
 * @property string $api_key
 */
class Project extends AbstractModel
{
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
