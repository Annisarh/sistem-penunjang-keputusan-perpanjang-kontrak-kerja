<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Penilaian;
use App\Models\Alternative;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CriteriaController extends Controller
{
    public function index(){
        $criteria = Criteria::all();
        return view('criteria', ['criteria' => $criteria]);
    }

    public function store(Request $request){
        // $request->validate([
        //     'kode' => 'required|string',
        //     'nama' => 'required|string',
        //     'weight' => 'required|numeric|min:0',
        //     'benefited' => 'required|numeric|min:0|max:1'
        // ],
        // [
        //     'kode.string' => 'inputkan string',
        //     'nama.string' => 'inputkan string'
        // ]);

        // Criteria::create([
        //     'kode' => $request->kode,
        //     'nama' => $request->nama,
        //     'bobot' => $request->weight,
        //     'benefited' => $request->benefited,
        //     'user_id' => Auth::user()->id
        // ]);

        $newCriteria = $request->except('_token');
        $request->validate([
            'kode' => 'required|string',
            'nama' => 'required|string',
            'bobot' => 'required|numeric|min:0',
            'benefited' => 'required|numeric|min:0|max:1',
        ]);
        $newCriteria['user_id'] = Auth::user()->id;

        $newCriteria = Criteria::create($newCriteria);

        $allAlternative = Alternative::where('user_id', '=', Auth::user()->id)->get();
        $gradeData = [];
        foreach ($allAlternative as $alternative) {
            array_push($gradeData, [
                'alternative_id' => $alternative->id,
                'criteria_id' => $newCriteria->id,
                'grade' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        Penilaian::insert($gradeData);

        return redirect()->route('criteria')->with('success', 'Kriteria '.$request->nama.' ditambahkan!');
    }

    public function update(Request $request)
    {
        $oldCriteria = Criteria::find($request->id);
        $updatedCriteria = $request->except('_token');
        $oldCriteria->update($updatedCriteria);

        return redirect()->route('criteria')->with('success', 'Kriteria '.$request->nama.' diperbarui!');
    }

    public function delete(Request $request)
    {
        $criteria = Criteria::find($request->id);
        $criteria->delete();
        return redirect()->route('criteria')->with('success', 'Kriteria '.$criteria->nama.' dihapus!');
    }

    public function exportPDF(Request $request){
        $nama = $request -> nama;
        $criterias = Criteria::all();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('exportCriteria', ['criterias' => $criterias, 'nama' => $nama]));
        return $pdf->stream();
        // return view('exportCriteria', ['criterias' => $criterias, 'nama' => $nama]);
    }

    // public function exportPDF2(){
    //     $criterias = Criteria::all();
    //     $pdf = Pdf::loadView('exportCriteriaPDF2', ['criterias' => $criterias]);
    //     return $pdf->download('CriteriaTopsis.pdf');
    // }
}
