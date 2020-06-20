<?php

namespace App\Utils;

/**
 * AppUtility.
 */
class AppUtility
{
    /*
     * function
     */
    public static function add($data)
    {
        $base_url = "https://www.googleapis.com/books/v1/volumes?q=";
        $url = $base_url . $data;
        $results = file_get_contents($url);
        return ($results);
    }
}
