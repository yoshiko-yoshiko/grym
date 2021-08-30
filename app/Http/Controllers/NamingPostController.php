<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 自作関数の利用
use App\Lib\NamingRuleFunction;
use App\Lib\GuzzleFunction;
use App\Lib\ExclusionFunction;

class NamingPostController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'japanese' => ['required', 'string'],
            'naming-rule' => ['required'],
        ]);
        $japanese = $request['japanese'];
        $checked = $request['naming-rule'];
        // 翻訳APIを利用
        $english = GuzzleFunction::use_guzzle_for_ibm_translator($japanese);
        // 翻訳APIで返ってきた英語を命名規則の通りに加工
        $english = explode(" ", $english);
        $english = ExclusionFunction::exclusion_redundant_words($english);
        switch($checked) {
            case "snake":
                $variable_name = NamingRuleFunction::to_snake_case($english);
                break;
            case "constant":
                $variable_name = NamingRuleFunction::to_constant_case($english);
                break;
            case "chain":
                $variable_name = NamingRuleFunction::to_chain_case($english);
                break;
            case "camel":
                $variable_name = NamingRuleFunction::to_camel_case($english);
                break;
            case "pascal":
                $variable_name = NamingRuleFunction::to_pascal_case($english);
                break;
            default:
                $variable_name = 'error';
        }

        return view('naming', compact('japanese', 'checked', 'variable_name')); 
    }
}
