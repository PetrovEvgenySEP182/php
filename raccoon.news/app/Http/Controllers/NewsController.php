<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $news = News::all();
        return view('news.index', compact('user', 'news'));
    }

    public function create()
    {
        $user = auth()->user();
        $categories = Category::all();
        return view('news.form', compact('user','categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        $news = auth()->user()->news();
        $news->create($data);
        return redirect()->route('news.index');
    }

    public function show(News $news)
    {

    }

    public function edit(News $news)
    {
        return view('news.form', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $this->validated($request, $news);

        $news->update($data);
        return redirect()->route('news.index');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('$news.index');
    }

    protected function validated(Request $request, News $news = null ){
        $rules = [
            'title' => 'required|min:5|max:100|unique:news',
            'text' => 'required|min:10',
            'category_id' => 'required|category'
        ];
        if($news)
            $rules['title'] .= ',title,' . $news->id;

        return $request->validate($rules, [
            'category' => 'Category doesn\'t match'
        ]);
    }
}
