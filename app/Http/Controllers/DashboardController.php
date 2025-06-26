<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Alternative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $criteriaJumlah = Criteria::where('user_id', '=', Auth::user()->id)->count();
        $alternativesJumlah = Alternative::where('user_id', '=', Auth::user()->id)->count();

        return view('dashboard', compact('criteriaJumlah', 'alternativesJumlah'));
    }
}
