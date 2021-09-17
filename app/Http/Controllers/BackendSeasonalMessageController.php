<?php

namespace App\Http\Controllers;

use App\Events\SeasonalMessageEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Seasonalmessage;
use App\Models\Article;

class BackendSeasonalMessageController extends Controller
{
    public function index()
    {
        $messages = Seasonalmessage::where('status', 'active')->get();
        return view('dashboard.seasonal.index', compact('messages'));
    }

    public function create()
    {
        $articles = Article::where('status', 'active')->get();
        return view('dashboard.seasonal.create', compact('articles'));
    }

    public function store(Seasonalmessage $seasonalmessage, Request $request)
    {
        // dd($request);
        $this->addUpdate($seasonalmessage, $request);

        event(new SeasonalMessageEvent($seasonalmessage));
        return redirect()->route('dashboard.seasonal-message.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        return "will delete";
    }

    private function addUpdate(Seasonalmessage $seasonalmessage, Request $request)
    {
        // validated form data
        $input = $request->validate([
            'heading' => 'required|string',
            'description' => 'string|nullable',
            'articles' => 'nullable',
            'status' => 'required',
            'body' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);

        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $input['image'] = request('image')->move('messages', $filename);
        }

        $seasonalmessage->heading = $input['heading'];
        $seasonalmessage->slug = Str::of($input['heading'])->slug('-');
        $seasonalmessage->description = $input['description'];
        $seasonalmessage->status = $input['status'];
        $seasonalmessage->body = $input['body'];

        if($request->hasFile('image')) {
            $seasonalmessage->image = $input['image'];
        }

        auth('admin')->user()->seasonalmessages()->save($seasonalmessage);

        if(request('articles')) {
            $seasonalmessage->articles()->sync($input['articles']);
        }

    }
}
