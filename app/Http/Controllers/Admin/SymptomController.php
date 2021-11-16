<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SymptomController extends Controller
{
    public function index() {
        $symptoms = Symptom::all();

        $data = [
            'symptoms' => $symptoms
        ];

        return view('pages.admin.symptom.index', $data);
    }

    public function add() {
        return view('pages.admin.symptom.add');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'code' => ['required', 'unique:symptoms,code'],
            'name' => ['required'],
            'question' => ['required', 'ends_with:?'],
            'description' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Silahkan periksa kembali data')->withInput()->withErrors($validator);
        }

        $symptom = Symptom::create([
            'code' => $request->code,
            'name' => $request->name,
            'question' => $request->question,
            'description' => $request->description
        ]);

        return redirect()->route('symptom.index')->with('success', "Gejala " . $symptom->code . " Berhasil ditambahkan");
    }

    public function delete($id) {
        $symptom = Symptom::findOrFail(decode($id));

        $symptom->delete();

        return redirect()->route('symptom.index')->with('success', "Gejala " . $symptom->code . " Berhasil dihapus");
    }
}
