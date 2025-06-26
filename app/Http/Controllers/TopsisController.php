<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Alternative;
use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopsisController extends Controller
{
    public function index(){
        // $criteria = Criteria::where('user_id', '=', Auth::user()->id)->get();
        // $alternatives = Alternative::where('user_id', '=', Auth::user()->id)->paginate(5);
        $criteria = Criteria::all();
        $alternatives = Alternative::all();
        if(count($criteria) == 0 || count($alternatives) == 0){
            return view('modal.noCalculationModal');
        }

        $matrixKeputusan = $this->matrixKeputusan($alternatives);
        $matrixNormalisasi = $this->norm($matrixKeputusan);
        $matrixNormTerbobot = $this->getWeightedNorm($matrixNormalisasi, $criteria);
        $idealPositif = $this->getIdealPositive($matrixNormTerbobot, $criteria);
        $idealNegatif = $this->getIdealNegative($matrixNormTerbobot, $criteria);
        $getSolusiPositif = $this->getSolutionPositive($matrixNormTerbobot, $idealPositif);
        $getSolusiNegatif = $this->getSolutionNegative($matrixNormTerbobot, $idealNegatif);
        $preferensi = $this->getPreferenceValue($getSolusiPositif, $getSolusiNegatif);

        return view('perhitunganTopsis', compact('matrixKeputusan', 'matrixNormalisasi', 'matrixNormTerbobot', 'idealPositif', 'idealNegatif', 'getSolusiPositif', 'getSolusiNegatif', 'preferensi', 'criteria', 'alternatives'));
    }

    public function matrixKeputusan($alternatives){
        $matrix = [];
        foreach ($alternatives as $key => $alternative) {
           $GradesData = Penilaian::where('alternative_id', '=', $alternative->id)
           ->orderBy('criteria_id', 'asc')
           ->get();

           $temp = [];
           foreach ($GradesData as $key2 => $Gradedata) {
            array_push($temp, $Gradedata->grade);
           }
           array_push($matrix, $temp);
        }

        // dd($matrix);
        return $matrix;
    }

    public function norm($matrixKeputusan){
        $divider = $this->getNormDivider($matrixKeputusan);
        $result = [];
        // dd($divider);

        for ($i=0; $i < count($matrixKeputusan); $i++) { 
            $temp = [];
            for ($j=0; $j < count($matrixKeputusan[$i]); $j++) { 
                if ($divider[$j] != 0) {
                    array_push($temp, $matrixKeputusan[$i][$j]/$divider[$j]);
                }else{
                    array_push($temp, 0);
                }
            }
            // dd($decisionMatrix, $divider, $temp);
            array_push($result, $temp);
        }
        // dd($matrixKeputusan, $divider, $result);
        return $result;
    }

    public function getNormDivider($matrixKeputusan){
        $result = [];
        for ($i=0; $i < count($matrixKeputusan[0]); $i++) { 
            $column = array_column($matrixKeputusan, $i);
            $temp = 0;
            foreach ($column as $key => $value) {
                $temp = $temp + ($value ** 2);
            }
            array_push($result, sqrt($temp));
        }

        // dd($result);
        return $result;
    }

    public function getWeightedNorm($matrixNormalisasi, $criteria){
        $result = [];
        $sumbobot = $criteria->sum('bobot');
        // dd($sumbobot);
        for ($i=0; $i < count($matrixNormalisasi); $i++) { 
            $temp = [];
            for ($j=0; $j < count($matrixNormalisasi[$i]); $j++) { 
                $weighted = $matrixNormalisasi[$i][$j] * ($criteria[$j]->bobot / $sumbobot);
                array_push($temp, $weighted); 
            }

            array_push($result, $temp); 
        }
        // dd($matrixNormalisasi, $criteria, $result);
        return $result;
    }

    public function getIdealPositive($matrixNormTerbobot, $criteria){
        $result = [];

            for ($j=0; $j < count($matrixNormTerbobot[0]); $j++) { 
               if($criteria[$j]->benefited == 1){
                   $data = collect(array_column($matrixNormTerbobot, $j))->max();
               }else{
                $data = collect(array_column($matrixNormTerbobot, $j))->min();
               }
                array_push($result, $data);
            }
        // dd($criteria, array_column($weightedNorm, 3), $weightedNorm, $result);
        return $result;
    }

    public function getIdealNegative($matrixNormTerbobot, $criteria){
        $result = [];

            for ($j=0; $j < count($matrixNormTerbobot[0]); $j++) { 
               if($criteria[$j]->benefited == 1){
                $data = collect(array_column($matrixNormTerbobot, $j))->min();
               }else{
                $data = collect(array_column($matrixNormTerbobot, $j))->max();
               }
                array_push($result, $data);
            }
        // dd($criteria, array_column($matrixNormTerbobot, 3), $matrixNormTerbobot, $result);
        return $result;
    }

    public function getSolutionPositive($matrixNormTerbobot, $idealPositif){
        $result = [];
        for ($i=0; $i < count($matrixNormTerbobot); $i++) { 
            $temp = 0;
            for ($j=0; $j < count($idealPositif); $j++) { 
                $temp = $temp + (pow($matrixNormTerbobot[$i][$j]-$idealPositif[$j], 2));
            }
            array_push($result, sqrt($temp));
        }
        // dd($matrixNormTerbobot, $idealPositif, $result);
        return $result;
    }

    public function getSolutionNegative($matrixNormTerbobot, $idealNegatif){
        $result = [];
        for ($i=0; $i < count($matrixNormTerbobot); $i++) { 
            $temp = 0;
            for ($j=0; $j < count($idealNegatif); $j++) { 
                $temp = $temp + (pow(($matrixNormTerbobot[$i][$j]-$idealNegatif[$j]), 2));
            }
            // if($j == 2){
            // }
            // dd($matrixNormTerbobot[$i][$j], $idealNegatif[$j]);
            array_push($result, sqrt($temp));
        }
        // dd($matrixNormTerbobot[$i][$j], $idealNegatif[$j]);
        return $result;
    }

    public function getPreferenceValue($solutionPositif, $solutionNegatif){
        $result = [];
        for ($i=0; $i < count($solutionPositif); $i++) { 
            $temp = ($solutionNegatif[$i]/($solutionPositif[$i]+$solutionNegatif[$i]));
            $temp = number_format($temp, 4);
            // dd($temp);
            array_push($result, $temp);
        }

        // dd($solutionPositive, $solutionNegative, $result);
        return $result;
    }




}
