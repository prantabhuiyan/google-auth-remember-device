<?php
/**
 * Created by PhpStorm.
 * User: pranta
 * Date: 9/11/20
 * Time: 5:04 PM
 */

namespace common\helper;


class RandomAlphanumericGeneratorHelper
{
    public static function createRandomAlphanumericString()
    {
        return substr(sha1(time()), 0, 16);
    }

    public static function createCurrentDateString()
    {
        $date = date('Y-m-d');
        $date_join = date('m',strtotime($date));
        $date_join .= date('Y',strtotime($date));

        return $date_join;
    }

    public static function generateUniqueCookieCode()
    {
        $rnd_alpha_num_code = static::createRandomAlphanumericString();
        $current_date_string = static::createCurrentDateString();

        return $rnd_alpha_num_code.$current_date_string;

    }
}