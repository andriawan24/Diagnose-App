<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\DiseaseSymptom;
use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiseaseController extends Controller
{
    public function index() {
        $diseases = Disease::with(['symptoms' => function($symptom) {
            return $symptom->with('symptom');   
        }])->get();

        $data = [
            'diseases' => $diseases
        ];

        return view('pages.admin.disease.index', $data);
    }

    public function show($id) {
        $disease = Disease::with(['symptoms' => function($symptom) {
            return $symptom->with('symptom');   
        }])->findOrFail(decode($id));

        $data = [
            'disease' => $disease
        ];

        return view('pages.admin.disease.show', $data);
    }

    public function add() {
        return view('pages.admin.disease.add');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'code' => ['required'],
            'name' => ['required'],
            'description' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Silahkan periksa kembali data')->withInput()->withErrors($validator);
        }

        $disease = Disease::create([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('disease.index')->with('success', "Gangguan " . $disease->code . " Berhasil ditambahkan");
    }

    public function edit($id) {
        $disease = Disease::findOrFail(decode($id));

        return view('pages.admin.disease.edit', ['disease' => $disease]);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'code' => ['required'],
            'name' => ['required'],
            'description' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Silahkan periksa kembali data')->withInput()->withErrors($validator);
        }

        $data = [
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description
        ];

        $disease = Disease::findOrFail(decode($id));
        $disease->update($data);

        return redirect()->route('disease.index')->with('success', "Gangguan " . $disease->code . " Berhasil diubah");
    }

    public function delete($id) {
        $disease = Disease::findOrFail(decode($id));

        $disease->delete();

        return redirect()->route('disease.index')->with('success', "Gangguan " . $disease->code . " Berhasil dihapus");
    }

    public function addSymptoms(Request $request, $id) {
        $disease = Disease::findOrFail(decode($id));
        $symptoms = Symptom::all();

        $data = [
            'disease' => $disease,
            'symptoms' => $symptoms
        ];

        return view('pages.admin.disease.add-symptoms', $data);
    }

    public function storeSymptoms(Request $request, $id) {
        $disease = Disease::findOrFail(decode($id));

        foreach ($request->symptoms as $symptoms_id) {
            DiseaseSymptom::create([
                'diseases_id' => $disease->id,
                'symptoms_id' => $symptoms_id,
                'mb' => 0,
                'md' => 0
            ]);
        }

        return redirect()->route('disease.show', encode($disease->id))->with('success', 'Berhasil menambahkan gejala');
    }

    public function updateSymptoms(Request $request, $id) {
        $diseaseSymptoms = DiseaseSymptom::findOrFail(decode($id));

        $data = [
            'mb' => 0,
            'md' => 0
        ];

        if ($request->mb) {
            $data['mb'] = $request->mb;
        }

        if ($request->md) {
            $data['md'] = $request->md;
        }

        $diseaseSymptoms->update($data);

        return redirect()->route('disease.show', encode($diseaseSymptoms->diseases_id))->with('success', 'Berhasil mengubah gejala');
    }

    public function deleteSymptoms($id) {
        $disease_symptom = DiseaseSymptom::findOrFail(decode($id));

        $disease_symptom->delete();

        return redirect()->route('disease.show', encode($disease_symptom->diseases_id))->with('success', "Gangguan " . $disease_symptom->code . " Berhasil dihapus");
    }
}
