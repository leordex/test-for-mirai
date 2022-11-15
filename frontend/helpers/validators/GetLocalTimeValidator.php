<?php

namespace frontend\helpers\validators;

class GetLocalTimeValidator
{
    /**
     * @return bool
     */
    public static function validate(): bool
    {
        $cityId = filter_input(INPUT_GET, 'city_id');
        $timestamp = filter_input(INPUT_GET, 'timestamp', FILTER_VALIDATE_INT);

        if (empty($cityId)) {
            return false;
        }

        if (empty($timestamp)) {
            return false;
        }

        return true;
    }
}