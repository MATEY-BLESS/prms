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

class BackendUserArticleController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        // return $articles;
        return view('accounts.articles.index', compact('users'));
    }

    public function create()
    {
        return view('accounts.articles.create');
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

        return redirect()->route('dashboard.user.article.index');
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('accounts.articles.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('accounts.articles.edit', compact('article'));
    }

    public function update(Article $article, ArticleValidate $request)
    {
        $this->addUpdate($article, $request);
        return redirect()->route('dashboard.user.article.index');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('dashboard.user.article.index');
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
