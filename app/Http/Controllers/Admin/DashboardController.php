<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $users = User::all();

        $data = [
            'users' => $users,
        ];

        return view('pages.admin.index', $data);
    }
}
