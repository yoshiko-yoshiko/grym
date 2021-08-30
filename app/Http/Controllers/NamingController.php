<?php

namespace App\Http\Controllers;

class NamingController extends Controller
{
    public function __invoke()
    {
        $title = '変数名を決める';
        $checked = 'snake';

        return view('naming', compact('title', 'checked'));
    }
}
