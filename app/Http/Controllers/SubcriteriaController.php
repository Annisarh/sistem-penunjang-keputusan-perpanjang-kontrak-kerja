<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\subcriteria;
use Illuminate\Http\Request;

class SubcriteriaController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        $subcriterias = subcriteria::all();
        return view('subcriteria', compact('criterias', 'subcriterias'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $newSub = $request->except('_token');
        $newSub = subcriteria::create($newSub);

        return redirect()->route('subcriteria')->with('success', 'Sub Kriteria ditambahkan!');
    }
}
