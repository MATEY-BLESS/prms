<?php

namespace App\Http\Controllers;

use App\Events\NewsletterEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Newsletter;
use App\Models\Article;

class BackendNewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::all();
        return view('dashboard.newsletters.index', ['newsletters' => $newsletters]);
    }

    public function create()
    {
        $articles = Article::where('status', 'active')->get();
        return view('dashboard.newsletters.create', ['articles' => $articles]);
    }

    public function store(Newsletter $newsletter, Request $request)
    {
        $this->addUpdate($newsletter, $request);
        event(new NewsletterEvent($newsletter));

        return redirect()->route('dashboard.newsletter.index');
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
        //
    }

    private function addUpdate(Newsletter $newsletter, Request $request)
    {
        // validated form data
        $input = $request->validate([
            'heading' => 'required|string',
            'description' => 'string|nullable',
            'articles' => 'required',
            'status' => 'required',
        ]);

        $newsletter->heading = $input['heading'];
        $newsletter->slug = Str::of($input['heading'])->slug('-');
        $newsletter->description = $input['description'];
        $newsletter->status = $input['status'];

        auth('admin')->user()->newsletter()->save($newsletter);
        $newsletter->articles()->sync($input['articles']);
    }
}
