<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'japanese' => ['string'],
            'variable-name' => ['required', 'string'],
        ]);
        DB::table('bookmark')->insert([
            'user_id' => Auth::user()->id,
            'japanese' => $request['japanese'],
            'variable_name' => $request['variable-name'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('naming');
    }
}
