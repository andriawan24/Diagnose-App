<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Consultation;
use App\Models\ConsultationResults;
use App\Models\Disease;
use App\Models\Symptom;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class DiagnoseController extends Controller
{
    public function diagnose(Request $request) {
        try {
            $request->validate([
                'symptoms' => ['required', 'array'],
                'name' => ['required'],
                'age' => ['required', 'integer']
            ]);

            $diseases_data = Disease::with(['symptoms' => function($symptom) {
                return $symptom->with('symptom');   
            }])->get();

            $symptoms = $request->symptoms;

            $possibilities = [];

            $disease_possibilities = [];
            foreach ($diseases_data as $disease) {
                foreach ($disease->symptoms as $symptom) {
                    if (in_array($symptom->symptom->id, $symptoms)) {
                        array_push($disease_possibilities, $disease);
                        break;
                    }
                }
            }

            // return response()->json($disease_possibilities);

            if ($disease_possibilities) {
                foreach ($disease_possibilities as $possibility) {
                    $temp_mb = 0;
                    $temp_md = 0;

                    foreach ($possibility->symptoms as $symptom) {
                        if (in_array($symptom->symptom->id, $symptoms)) {
                            if ($temp_mb == 0) {
                                $temp_mb = $symptom->mb;
                            } else {
                                $temp_mb = $temp_mb + ($symptom->mb * (1 - $temp_mb));
                            }

                            if ($temp_md == 0) {
                                $temp_md = $symptom->md;
                            } else {
                                $temp_md = $temp_md + ($symptom->md * (1 - $temp_md));
                            }
                        }
                    }

                    $percentage = $temp_mb - $temp_md;
                    $possible['disease'] = $possibility;
                    $possible['possibility'] = $percentage * 100 . "%";

                    array_push($possibilities, json_encode($possible));
                }

                $consultation = Consultation::create([
                    'users_id' => Auth::user()->id,
                    'name' => $request->name,
                    'age' => $request->age
                ]);

                $results = [];
                foreach ($possibilities as $possibility) {
                    $possible = json_decode($possibility);
                    array_push($results, $possible);
                    ConsultationResults::create([
                        'consultants_id' => $consultation->id,
                        'diseases_id' => $possible->disease->id,
                        'possibility' => $possible->possibility
                    ]);
                }


                return ResponseFormatter::success([
                    'name' => $request->name,
                    'age' => $request->age,
                    'diseases_possibilities' => $results
                ], 'Success Diagnose');
            }
        } catch (ValidationException $e) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'errors' => $e->errors()
            ], 'Failed DIagnose', 400);
        }
    }

    public function symptoms() {
        try {
            $symptoms = Symptom::all();

            return ResponseFormatter::success([
                'symptoms' => $symptoms
            ], 'Get Symptoms success');
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'errors' => $e->getMessage()
            ], 'Get Symptoms failed', 400);
        }
    }
}
