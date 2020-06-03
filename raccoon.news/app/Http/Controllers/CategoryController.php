<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $this->authorize('view', new Category());

        $user = auth()->user();
        $categories = Category::on()->paginate(10);

        return view('categories.index', compact('user', 'categories'));
    }

    public function create()
    {
        $this->authorize('create', Category::class);
        $user = auth()->user();
        return view('categories.form', compact('user'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Category::class);
        $data = $this->validated($request);

        Category::on()->create($data);
        return redirect()->route('categories.index');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        $this->authorize('update', $category);
        return view('categories.form', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $this->authorize('update', $category);
        $data = $this->validated($request, $category);

        $category->update($data);
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete', $category);
        $category->delete();
        return redirect()->route('categories.index');
    }

    protected function validated(Request $request, Category $category = null ){
        $rules = [
            'name' => 'required|min:5|max:100|unique:categories'
        ];
        if($category)
            $rules['name'] .= ',name,' . $category->id;

        return $request->validate($rules);
    }
}
