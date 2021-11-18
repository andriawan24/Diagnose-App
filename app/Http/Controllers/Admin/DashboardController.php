<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Disease;
use App\Models\Symptom;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $users = User::all();
        $diseases = Disease::all();
        $symptoms = Symptom::all();
        $articles = Article::all();

        $data = [
            'users' => $users,
            'diseases' => $diseases,
            'symptoms' => $symptoms,
            'articles' => $articles,
        ];

        return view('pages.admin.index', $data);
    }
}
