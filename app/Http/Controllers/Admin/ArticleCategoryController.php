<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ArticleCategoryController extends Controller
{
    public function index() {
        $categories = ArticleCategory::all();

        $data = [
            'categories' => $categories
        ];

        return view('pages.admin.article-categories.index', $data);
    }

    public function add() {
        return view('pages.admin.article-categories.add');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['sometimes']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Silahkan periksa kembali data')->withInput()->withErrors($validator);
        }

        $category = ArticleCategory::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->route('article-category.index')->with('success', "Kategori " . $category->name . " Berhasil ditambahkan");
    }

    public function edit($id) {
        $category = ArticleCategory::findOrFail(decode($id));

        return view('pages.admin.article-categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['sometimes']
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Silahkan periksa kembali data')->withInput()->withErrors($validator);
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];

        $category = ArticleCategory::findOrFail(decode($id));
        $category->update($data);

        return redirect()->route('article-category.index')->with('success', "Artikel " . $category->name . " Berhasil diubah");
    }

    public function delete($id) {
        $category = ArticleCategory::findOrFail(decode($id));

        $category->delete();

        return redirect()->route('article-category.index')->with('success', "Artikel " . $category->name . " Berhasil dihapus");
    }
}
