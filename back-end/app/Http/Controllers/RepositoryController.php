<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    public function index(Request $request)
    {
        $repositories = $request->user()->repositories;

        return response()->json($repositories);
    }
}
