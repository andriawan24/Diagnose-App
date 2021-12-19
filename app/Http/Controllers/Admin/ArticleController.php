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
            'thumbnail_image' => ['required'],
            'article_categories_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Silahkan periksa kembali data')->withInput()->withErrors($validator);
        }

        $imageName = time() . '.' . $request->thumbnail_image->extension();

        $request->thumbnail_image->move(public_path('images/article'), $imageName);

        $article = Article::create([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'published_at' => $request->published_at,
            'description' => $request->description,
            'thumbnail_image' => $imageName,
            'article_categories_id' => $request->article_categories_id,
        ]);

        return redirect()->route('article.index')->with('success', "Artikel " . $article->name . " Berhasil ditambahkan");
    }

    public function edit($id) {
        $categories = ArticleCategory::all();
        $article = Article::findOrFail(decode($id));

        return view('pages.admin.article.edit', ['article' => $article, 'categories' => $categories]);
    }

    public function update(Request $request, $id) {
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

        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'published_at' => $request->published_at,
            'description' => $request->description,
            'article_categories_id' => $request->article_categories_id,
        ];

        $article = Article::findOrFail(decode($id));

        if ($request->thumbnail_image) {
            $imageName = $article->thumbnail_image;

            $request->thumbnail_image->move(public_path('images/article'), $imageName);

            $data['thumbnail_image'] = $imageName;
        }

        $article->update($data);

        return redirect()->route('article.index')->with('success', "Artikel " . $article->name . " Berhasil diubah");
    }

    public function delete($id) {
        $article = Article::findOrFail(decode($id));

        $article->delete();

        return redirect()->route('article.index')->with('success', "Artikel " . $article->name . " Berhasil dihapus");
    }
}
