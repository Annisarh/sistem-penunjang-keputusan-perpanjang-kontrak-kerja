<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Alternative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PenilaianController extends Controller
{
    public function index(){
        // $alternatives = Alternative::where('user_id', '=', Auth::user()->id)->get();
        $alternatives = Alternative::all();
        return view('Penilaian', compact('alternatives'));
    }

    public function getForms(Request $request){
        $id = $request->id;
        // dd($id);
        $forms = Penilaian::with([
            'alternative',
            'criteria',
        ])->where('alternative_id', $id)->get();
        
        return view('modal.penilaianModal.penilaianForm', compact('forms'));
    }

    public function update(Request $request){
        $data = $request->except(['_token', '_method', 'alternative_id']);
        $alternativeId = $request->only('alternative_id')['alternative_id'];
        $alternative = Alternative::find($alternativeId);
        DB::beginTransaction();
        foreach ($data as $key => $value) {
            $affected = DB::table('penilaians')
            ->where('id', '=', $key)
            ->update(['grade' => $value]);
        }        
        DB::commit();
        return redirect()->route('penilaian')->with('success', 'Penilaian alternatif '.$alternative->nama.' diperbarui!');
    }
}
