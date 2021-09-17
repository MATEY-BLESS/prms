<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\About;

class BackendAboutsController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        return view('dashboard.abouts.index', compact('abouts'));
    }

    public function create()
    {
        return view('dashboard.abouts.create');
    }

    public function store(About $about, AboutValidate $request)
    {
        $this->addUpdate($about, $request);
        return redirect()->route('dashboard.about.index');
    }

    public function show(About $about)
    {
        return view('dashboard.abouts.show', compact('about'));
    }

    public function edit(About $about)
    {
        return view('dashboard.abouts.edit', compact('about'));
    }

    public function update(About $about, AboutValidate $request)
    {
        $this->addUpdate($about, $request);
        return redirect()->route('dashboard.about.index');
    }

    public function destroy(About $about)
    {
        $about->delete();
        return redirect()->route('dashboard.about.index');
    }

    private function addUpdate(About $about, AboutValidate $request)
    {
        $input = $request->validated();
        if(request('banner')){
            $filename = $request->banner->getClientOriginalName();
            $input['banner'] = request('banner')->move('images', $filename);
        }

        $about->page_name = $input['page_name'];
        $about->slug = Str::of($input['page_name'])->slug('-');
        $about->status = $input['status'];
        $about->body = $input['body'];
        $about->description = Str::limit($input['body'], 150);

        if(request('image_caption')) {
            $about->image_caption = $input['image_caption'];
        }

        if(request('banner')) {
            $about->banner = $input['banner'];
        }

        auth('admin')->user()->about()->save($about);

        // $about->save();
    }
}
