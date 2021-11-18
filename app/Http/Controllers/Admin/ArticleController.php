<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::with('category')->get();

        $data = [
            'articles' => $articles
        ];

        return view('pages.admin.article.index', $data);
    }

    public function add() {
        $categories = ArticleCategory::all();

        return view('pages.admin.article.add', ['categories' => $categories]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'author' => ['required'],
            'publisher' => ['required'],
            'published_at' => ['required'],
            'description' => ['required'],
            'article_categories_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Silahkan periksa kembali data')->withInput()->withErrors($validator);
        }

        $article = Article::create([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'published_at' => $request->published_at,
            'description' => $request->description,
            'article_categories_id' => $request->article_categories_id,
        ]);

        return redirect()->route('article.index')->with('success', "Artikel " . $article->code . " Berhasil ditambahkan");
    }

    public function edit($id) {
        $article = Article::findOrFail(decode($id));

        return view('pages.admin.article.edit', ['article' => $article]);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'code' => ['required', 'unique:articles,code'],
            'name' => ['required'],
            'question' => ['required', 'ends_with:?'],
            'description' => ['required']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Silahkan periksa kembali data')->withInput()->withErrors($validator);
        }

        $data = [
            'code' => $request->code,
            'name' => $request->name,
            'question' => $request->question,
            'description' => $request->description
        ];

        $article = Article::findOrFail(decode($id));
        $article->update($data);

        return redirect()->route('article.index')->with('success', "Artikel " . $article->code . " Berhasil diubah");
    }

    public function delete($id) {
        $article = Article::findOrFail(decode($id));

        $article->delete();

        return redirect()->route('article.index')->with('success', "Artikel " . $article->code . " Berhasil dihapus");
    }
}
