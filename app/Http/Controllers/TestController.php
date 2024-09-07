<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function testConnection()
    {
        try {
            // Attempt to run a simple query
            $results = DB::select('SHOW TABLES');
            return response()->json(['success' => true, 'data' => $results]);
        } catch (\Exception $e) {
            // Catch any exceptions and return the error message
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
