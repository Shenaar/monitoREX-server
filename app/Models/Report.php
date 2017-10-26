<?php

namespace App\Models;

use App\Enums\ReportStatuses;

/**
 * @property string $class
 * @property string $file
 * @property int $line
 * @property string $message
 * @property string $trace
 * @property ReportStatuses $status
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Report extends AbstractModel
{

}
