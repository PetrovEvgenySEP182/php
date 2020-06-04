<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index(Request $request)
    {
        $MAX_NEWS_ON_PAGE = 10;

        $category_id = $request->request->all()['category_id'] ?? 0;
        if($category_id){
            $news = News::on()->where('category_id', $category_id)->orderByDesc('created_at')->paginate($MAX_NEWS_ON_PAGE);
        } else {
            $news = News::on()->orderByDesc('created_at')->paginate($MAX_NEWS_ON_PAGE);
        }
        $user = auth()->user();

        $main_categories = Category::all();
        $main_categories->prepend(Category::emptyCategory());

        return view('news.index', compact('user', 'news', 'main_categories', 'category_id'));
    }

    public function create()
    {
        $this->authorize('create', News::class);

        $user = auth()->user();
        $categories = Category::all();
        return view('news.form', compact('user','categories'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', News::class);
        $data = $this->validated($request);

        $news = auth()->user()->news();
        $news->create($data);
        return redirect()->route('news.index');
    }

    public function show(News $news)
    {
        $user = auth()->user();
        return view('news.show', compact('user', 'news'));
    }

    public function edit(News $news)
    {
        $this->authorize('update', $news);

        $user = auth()->user();
        $categories = Category::all();
        return view('news.form', compact('news', 'user', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $this->authorize('update', $news);
        $data = $this->validated($request, $news);

        $news->update($data);
        return redirect()->route('news.index');
    }

    public function destroy(News $news)
    {
        $this->authorize('delete', $news);

        $news->delete();
        return redirect()->route('news.index');
    }

    public function sort($category_id){

    }

    protected function validated(Request $request, News $news = null ){
        $rules = [
            'title' => 'required|min:5|max:100|unique:news',
            'text' => 'required|min:10',
            'category_id' => 'required|category',
            'image_url' => 'nullable'
        ];
        if($news)
            $rules['title'] .= ',title,' . $news->id;

        return $request->validate($rules, [
            'category' => 'Category doesn\'t match'
        ]);
    }
}
