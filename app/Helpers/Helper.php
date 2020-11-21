<?php

namespace App\Helpers;

class Helper {
    public static function verboseDate($date)
    {
        return $date->format('d M Y');
    }
}
