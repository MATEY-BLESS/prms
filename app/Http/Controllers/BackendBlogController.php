<?php

namespace App\Http\Controllers;

use App\Events\LatestNewsEvent;
use App\Events\NewArticleEvent;
use App\Http\Requests\ArticleValidate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BackendBlogController extends Controller
{

    public function index()
    {
        $articles = Article::with('admin')->with('user')->where('status', 'active')->get();
        // dd( $articles);
        return view('dashboard.blog.index', compact('articles'));
    }

    public function create()
    {
        return view('dashboard.blog.create');
    }

    public function store(Article $article, ArticleValidate $request)
    {
        $article = $this->addUpdate($article, $request);


        // reconsider this to only work if the article is a news post (using category)
        // using $article->soruce for testing purposes. Use category after relationships are set
        if ($request->source == "news" ) {
            event(new LatestNewsEvent($article));
        } else {
            // all other post except news
            // email new article to subscribers through event and listener
            event(new NewArticleEvent($article));
        }

        return redirect()->route('dashboard.blog.index');
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('dashboard.blog.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('dashboard.blog.edit', compact('article'));
    }

    public function update(Article $article, ArticleValidate $request, $id)
    {
        $article = Article::findOrFail($id);
        $this->addUpdate($article, $request);
        return redirect()->route('dashboard.blog.index');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('dashboard.blog.index');
    }

    private function addUpdate(Article $article, ArticleValidate $request)
    {
        $input = $request->validated();
        if(request('post_image')){
            $filename = $request->post_image->getClientOriginalName();
            $input['post_image'] = request('post_image')->move('images', $filename);
        }

        $article->title = $input['title'];
        $article->slug = Str::of($input['title'])->slug('-');
        $article->status = $input['status'];
        $article->source = $input['source'];
        $article->second_source = $input['second_source'];
        $article->body = $input['body'];
        $article->description = Str::limit($input['body'], 150);

        if(request('image_caption')) {
            $article->image_caption = $input['image_caption'];
        }

        if(request('post_image')) {
            $article->post_image = $input['post_image'];
        }

        auth()->user()->articles()->save($article);

        if(request('category')) {
            $article->categories()->sync($input['category']);
        }

        if(request('tags')) {
            $article->tags()->sync($input['tags']);
        }
    }
}
