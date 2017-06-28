<?php

namespace App\Enums;

abstract class ReportStatuses extends AbstractEnum
{
    const NEW_ONE  = 'new';

    const SEEN     = 'seen';

    const RESOLVED = 'resolved';
}
