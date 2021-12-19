<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Exception;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request) {
        try {
            $latest = $request->latest;
            $categories_id = $request->categories_id;
            
            $articles = Article::with('category');
            $categories = ArticleCategory::all();
            
            if ($latest) {
                $articles->orderBy('published_at', 'DESC')->take(10);
            }

            if ($categories_id) {
                $articles->where('article_categories_id', '=', $categories_id);
            }

            return ResponseFormatter::success([
                'article_categories' => $categories,
                'articles' => $articles->get()
            ], 'Get Articles success');
        } catch (Exception $e) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'errors' => $e->getMessage()
            ], 'Get Articles failed', 400);
        }
    }
}
