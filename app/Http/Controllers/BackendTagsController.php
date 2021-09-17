<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Tag;

class BackendTagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('dashboard.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('dashboard.tags.create');
    }

    public function store(Tag $tag, Request $request)
    {
        $this->addUpdate($tag, $request);
        return redirect()->route('dashboard.tag.index');
    }

    public function edit(Tag $tag)
    {
        return view('dashboard.tags.edit', compact('tag'));
    }

    public function update(Tag $tag, Request $request)
    {
        $this->addUpdate($tag, $request);
        return redirect()->route('dashboard.tag.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('dashboard.tag.index');
    }

    private function addUpdate(Tag $tag, Request $request)
    {
        // validated form data
        $input = $request->validate([
            'name' => 'required|unique:tags,name',
        ]);

        $tag->name = $input['name'];
        $tag->slug = Str::of($input['name'])->slug('-');

        auth('admin')->user()->tags()->save($tag);
    }
}
