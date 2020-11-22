<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * The classes of cars available
     * TODO
     */
    public function carClasses()
    {
        // db_service requestt
        return response()->json([
            "A", "B", "C", "D"
        ]);
    }
}
