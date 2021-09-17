<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;

class BackendCategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Category $category, Request $request)
    {
        $this->addUpdate($category, $request);
        return redirect()->route('dashboard.category.index');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Category $category, Request $request)
    {
        $this->addUpdate($category, $request);
        return redirect()->route('dashboard.category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('dashboard.category.index');
    }

    private function addUpdate(Category $category, Request $request)
    {
        // validate request later
        $input = $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        $category->name = $input['name'];
        $category->slug = Str::of($input['name'])->slug('-');

        auth('admin')->user()->categories()->save($category);
    }
}
