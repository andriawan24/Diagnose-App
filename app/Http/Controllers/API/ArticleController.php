<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Exception;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        try {
            $articles = Article::all();

            return ResponseFormatter::success([
                'articles' => $articles
            ], 'Get Articles success');
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'errors' => $e->getMessage()
            ], 'Get Articles failed', 400);
        }
    }
}
