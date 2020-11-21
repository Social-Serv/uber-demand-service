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
        return response()->json([
            "A", "B", "C", "D"
        ]);
    }

    /**
     * Audi, BMW, Renault...
     * Do we need it??
     * TODO
     */
    public function carBrands()
    {
        return [];
    }

    /**
     * How many passengers can the car transport
     * TODO (db fetching)
     */
    public function carCapacities()
    {
        return response()->json([
            1, 2, 3, 4, 5, 6, 7
        ]);
    }
}
