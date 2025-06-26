<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Criteria;
use App\Models\Penilaian;
use App\Models\Alternative;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;


class AlternativeController extends Controller
{
    public function index(){
        $alternatives = Alternative::all();
        $today = Carbon::today();
        for($i=0; $i<count($alternatives); $i++){
            $alternatives[$i]->selisih = $today->diffInDays($alternatives[$i]->tglakhir);
        }
        // foreach($alternatives as $alternative){
        //     $selisih = $today->diffInDays($alternative->tglakhir);
        // }
        // dd($alternatives);
        return view('alternatif', compact('alternatives'));
    }

    public function store(Request $request){
        $newAlternative = $request -> except('_token');
        $request->validate([
            'kode' => 'required|string',
            'nama' => 'required|string',
        ]);
        $newAlternative['tglawal'] = Carbon::parse($request->tglawal);
        $newAlternative['tglakhir'] = Carbon::parse($request->tglawal)->addMonth(3);
        $newAlternative['user_id'] = Auth::user()->id;
        $newAlternative = Alternative::create($newAlternative);

        $allCriteria = Criteria::where('user_id', '=', Auth::user()->id)->get();
        $gradeData = [];
        foreach ($allCriteria as $criterion){
            array_push($gradeData, [
                'alternative_id' => $newAlternative->id,
                'criteria_id' => $criterion->id,
                'grade' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
        $gradeData = Penilaian::insert($gradeData);

        return redirect()->route('alternative')->with('success', 'Alternatif '.$request->nama.' ditambahkan!');

    }

    public function update(Request $request){
        $oldAlternative = Alternative::find($request->id);
        $oldAlternative['tglakhir'] = Carbon::parse($request->tglawal)->addMonth(3);
        $updateAlternative = $request->except('_token');
        $oldAlternative->update($updateAlternative);

        return redirect()->route('alternative')->with('success', 'Alternative '.$request->nama. ' diperbaharui');
    }

    public function delete(Request $request){
        $alternative = Alternative::find($request->id);
        $alternative->delete();
        return redirect()->route('alternative')->with('success', 'Alternative ' .$request->nama. ' dihapus');
    }

    public function exportPDF(Request $request){
        // $imgPath = public_path('Assets\images\images.png');
        // $type = pathinfo($imgPath, PATHINFO_EXTENSION);
        // $data = file_get_contents($imgPath);
        // $image = 'data:image/'. $type . ';base64,' . base64_decode($data);

        $nama = $request-> nama;
        $alternatives = Alternative::all();
        // // $this->exportPDF2($request);
        // return view('exportAlternatif', ['alternatives' => $alternatives, 'nama' => $nama]);

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('exportAlternatif', ['alternatives' => $alternatives, 'nama' => $nama]));
        return $pdf->stream();
    }

    // public function exportPDF2(){
    //     // $nama = $request->nama;
    //     $alternatives = Alternative::all();
    //     $pdf = Pdf::loadView('exportAlternatifPDF2', ['alternatives' => $alternatives]);
    //     return $pdf->download('AlternativeTopsis.pdf');
    //     // return dd($nama);
    // }
}
