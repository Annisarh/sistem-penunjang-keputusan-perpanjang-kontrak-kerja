<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Penilaian;
use App\Models\Alternative;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HasilController extends Controller
{
    public function index(){
        $calkulasiObj = new TopsisController;
        // $criteria = Criteria::where('user_id', '=', Auth::user()->id)->get();
        // $alternatives = Alternative::where('user_id', '=', Auth::user()->id)->paginate(5);
        $criteria = Criteria::all();
        $alternatives = Alternative::all();
        if(count($criteria) == 0 || count($alternatives) == 0){
            return view('modal.noCalculationModal');
        }

        $matrixKeputusan = $calkulasiObj->matrixKeputusan($alternatives);
        $matrixNormalisasi = $calkulasiObj->norm($matrixKeputusan);
        $matrixNormTerbobot = $calkulasiObj->getWeightedNorm($matrixNormalisasi, $criteria);
        $idealPositif = $calkulasiObj->getIdealPositive($matrixNormTerbobot, $criteria);
        $idealNegatif = $calkulasiObj->getIdealNegative($matrixNormTerbobot, $criteria);
        $getSolusiPositif = $calkulasiObj->getSolutionPositive($matrixNormTerbobot, $idealPositif);
        $getSolusiNegatif = $calkulasiObj->getSolutionNegative($matrixNormTerbobot, $idealNegatif);
        $preferensi = $calkulasiObj->getPreferenceValue($getSolusiPositif, $getSolusiNegatif);
        $pairedValues = $this->pairingValues($preferensi, $alternatives);
        $sortedResults = $this->getSortedResult($pairedValues, 'grade', 0);

        // dd($sortedResults);
        return view('hasilTopsis', compact('sortedResults', 'alternatives'));
    }

    public function exportPDF(Request $request){
        $nama = $request->nama;
        $calkulasiObj = new TopsisController;
        // $criteria = Criteria::where('user_id', '=', Auth::user()->id)->get();
        // $alternatives = Alternative::where('user_id', '=', Auth::user()->id)->paginate(5);
        $criteria = Criteria::all();
        $alternatives = Alternative::all();
        
        $matrixKeputusan = $calkulasiObj->matrixKeputusan($alternatives);
        $matrixNormalisasi = $calkulasiObj->norm($matrixKeputusan);
        $matrixNormTerbobot = $calkulasiObj->getWeightedNorm($matrixNormalisasi, $criteria);
        $idealPositif = $calkulasiObj->getIdealPositive($matrixNormTerbobot, $criteria);
        $idealNegatif = $calkulasiObj->getIdealNegative($matrixNormTerbobot, $criteria);
        $getSolusiPositif = $calkulasiObj->getSolutionPositive($matrixNormTerbobot, $idealPositif);
        $getSolusiNegatif = $calkulasiObj->getSolutionNegative($matrixNormTerbobot, $idealNegatif);
        $preferensi = $calkulasiObj->getPreferenceValue($getSolusiPositif, $getSolusiNegatif);
        $pairedValues = $this->pairingValues($preferensi, $alternatives);
        $sortedResults = $this->getSortedResult($pairedValues, 'grade', 0);

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('exportHasilPDF', compact('sortedResults'), ['nama'=>$nama]));
        return $pdf->stream();

        // return view('exportHasilPDF', compact('sortedResults'), ['nama'=>$nama]);
    }

    // public function exportPDF2(){
    //     $calkulasiObj = new TopsisController;
    //     // $criteria = Criteria::where('user_id', '=', Auth::user()->id)->get();
    //     // $alternatives = Alternative::where('user_id', '=', Auth::user()->id)->paginate(5);
    //     $criteria = Criteria::all();
    //     $alternatives = Alternative::all();
        
    //     $matrixKeputusan = $calkulasiObj->matrixKeputusan($alternatives);
    //     $matrixNormalisasi = $calkulasiObj->norm($matrixKeputusan);
    //     $matrixNormTerbobot = $calkulasiObj->getWeightedNorm($matrixNormalisasi, $criteria);
    //     $idealPositif = $calkulasiObj->getIdealPositive($matrixNormTerbobot, $criteria);
    //     $idealNegatif = $calkulasiObj->getIdealNegative($matrixNormTerbobot, $criteria);
    //     $getSolusiPositif = $calkulasiObj->getSolutionPositive($matrixNormTerbobot, $idealPositif);
    //     $getSolusiNegatif = $calkulasiObj->getSolutionNegative($matrixNormTerbobot, $idealNegatif);
    //     $preferensi = $calkulasiObj->getPreferenceValue($getSolusiPositif, $getSolusiNegatif);
    //     $pairedValues = $this->pairingValues($preferensi, $alternatives);
    //     $sortedResults = $this->getSortedResult($pairedValues, 'grade', 0);

    //     $pdf = Pdf::loadView('exportPDF2', compact('sortedResults'));
    //     return $pdf->download('HasilTopsis.pdf');
    //     // return view('exportHasilPDF', compact('sortedResults'));
    // }

    public function pairingValues($PreferenceValue, $alternatives){
        $result = [];
        for ($i=0; $i < count($alternatives); $i++) { 
            array_push($result, (object)[
                'id' => $alternatives[$i]->id,
                'code' => 'A'.$i+1,
                'name' => $alternatives[$i]->nama,
                'grade' => $PreferenceValue[$i],
            ]);
        }

        // dd($result);
        return $result;
    }

    public function getSortedResult($pairedValues, $sortBy, Bool $asc){
        if($asc){
            $sortedResult = collect($pairedValues)->sortBy($sortBy);
        }else{
            $sortedResult = collect($pairedValues)->sortByDesc('grade');
        }

        // reset collection index
        $sortedResult =  $sortedResult->values();

        // Give Rank
        for ($i=0; $i < count($sortedResult); $i++) { 
            $sortedResult[$i]->rank = $i + 1 ;
        }

        // give kondisi
        for ($i=0; $i < count($sortedResult); $i++) { 
            if($sortedResult[$i]->grade < 0.3){
                $sortedResult[$i]->kondisi = "Dipertimbangkan";
            }else{
                $sortedResult[$i]->kondisi = "Layak";
            }
        }

        // dd($sortedResult);
        return collect($sortedResult);
    }

    public function laporan(){
        return view('laporan');
    }

    public function getForms(Request $request){
        $id = $request->id;
        // dd($id);
        $forms = Penilaian::with([
            'alternative',
            'criteria',
        ])->where('alternative_id', $id)->get();
        dd($forms);

        return view('modal.penilaianModal.penilaianFormm', compact('forms'));
    }
}
