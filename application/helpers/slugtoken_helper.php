<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function slugtoken($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '_', $text);

    // trim
    $text = trim($text, '_');

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('~[^-_\w]+~', '', $text);

    if (empty($text))
    {
        return 'n-a';
    }

    return $text;
}

?>