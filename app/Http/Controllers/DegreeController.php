<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use Illuminate\Http\Request;

class DegreeController extends Controller
{
    public function index()
    {
        return Degree::all();
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Degree $degree)
    {
        //
    }

    public function update(Request $request, Degree $degree)
    {
        //
    }

    public function destroy(Degree $degree)
    {
        //
    }
}
