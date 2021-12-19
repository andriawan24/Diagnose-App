<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index() {
        $consultations = Consultation::with(['results' => function($result) {
            return $result->with('disease');   
        }])->get();

        return view('pages.admin.consultations.index', ['consultations' => $consultations]);
    }
}
