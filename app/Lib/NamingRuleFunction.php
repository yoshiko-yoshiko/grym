<?php
namespace App\Lib;

class NamingRuleFunction
{
    public static function to_snake_case(array $words) {
        $variable_name = '';
        foreach ($words as $word) {
            $word = mb_strtolower($word);
            $variable_name .= "{$word}_";
        }
        # substr('文字列', 0, -1)で文字列の最後の一文字を削除する
        # 今回は "_"を削除
        return substr($variable_name, 0, -1);
    }

    public static function to_constant_case(array $words) {
        $variable_name = '';
        foreach ($words as $word) {
            $word = strtoupper($word);
            $variable_name .= "{$word}_";
        }
        # substr('文字列', 0, -1)で文字列の最後の一文字を削除する
        # 今回は "_"を削除
        return substr($variable_name, 0, -1);
    }

    public static function to_chain_case(array $words) {
        $variable_name = '';
        foreach ($words as $word) {
            $word = mb_strtolower($word);
            $variable_name .= "{$word}-";
        }
        # substr('文字列', 0, -1)で文字列の最後の一文字を削除する
        # 今回は "_"を削除
        return substr($variable_name, 0, -1);
    }

    public static function to_camel_case(array $words) {
        $variable_name = mb_strtolower($words[0]);
        for ($i=1; $i<count($words); $i++) {
            $variable_name .= ucfirst($words[$i]);
        }
        return $variable_name;
    }

    public static function to_pascal_case(array $words) {
        $variable_name = '';
        foreach ($words as $word) {
            $variable_name .= ucfirst($word);
        }
        return $variable_name;
    }
}
