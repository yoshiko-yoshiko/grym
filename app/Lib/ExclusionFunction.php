<?php
namespace App\Lib;

class ExclusionFunction
{
    public static function exclusion_redundant_words(array $arg) {
        $exclusion_list = ['a', 'an', 'the'];
        return array_values(array_diff($arg, $exclusion_list));
    }
}