<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleRequest;
use App\Tag;
use Carbon\Carbon;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


/**
 * Class ArticlesController
 * @package App\Http\Controllers
 */
class ArticlesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);

        parent::__construct();
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');
        return view('articles.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Controllers\CreateArticleRequest|\App\Http\Requests\ArticleRequest $request
     * @param \Cocur\Slugify\Slugify $slugify
     * @return Response
     */
    public function store(ArticleRequest $request, Slugify $slugify)
    {

        $slug = $slugify->slugify($request->get('title'));

        $request['slug'] = $slug;

        $this->createArticle($request);




        flash()->success('Your article has been successfully created.');

        return redirect('articles');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Article $article
     * @return Response
     */
    public function show(Article $article)
    {

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Article $article
     * @return Response
     */
    public function edit(Article $article)
    {

        $tags = Tag::lists('name', 'id');
        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Article $article
     * @param \App\Http\Requests\ArticleRequest $request
     * @param \Cocur\Slugify\Slugify $slugify
     * @return Response
     */
    public function update(Article $article, ArticleRequest $request, Slugify $slugify)
    {

        $slug = $slugify->slugify($request->get('title'));

        $request['slug'] = $slug;

        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request
     * @internal param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        Article::findOrFail($request->get('id'))->delete();

        return redirect('articles');
    }

    /**
     * Sync Up the list of tags in the database
     *
     * @param Article $article
     * @param $tags
     * @internal param \App\Http\Requests\ArticleRequest $request
     */
    public function syncTags(Article $article, $tags)
    {
        $article->tags()->sync($tags);
    }

    /**
     * Save a new Article
     *
     * @param ArticleRequest $request
     * @return mixed
     */
    public function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }

}
