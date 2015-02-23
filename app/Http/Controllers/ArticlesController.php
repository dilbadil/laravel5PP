<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Guard;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\HttpResponse;
use App\Tag;

class ArticlesController extends Controller {

    /**
     * @var Guard
     */
    protected $auth;

    /**
     * Create articles controller instance 
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->auth = $auth;
    }

	/**
	 * Display a listing of the article.
	 *
	 * @return Response
	 */
	public function index()
	{
		$articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
	}

	/**
	 * Show the form for creating a new article.
	 *
	 * @return Response
	 */
	public function create()
	{
        $tags = Tag::lists('name', 'id');

		return view('articles.create', compact('tags'));
	}

	/**
	 * Store a newly created article in storage.
	 *
	 * @return Response
	 */
	public function store(ArticleRequest $request)
	{
        $this->createArticle($request);

        return redirect('articles')->with([
            'flash_message' => 'Your article has been created',
            'flash_message_important' => true
        ]);
	}

	/**
	 * Display the specified article.
	 *
	 * @param  Article $article
	 * @return Response
	 */
	public function show(Article $article)
	{
        return view('articles.show', compact('article'));
	}

	/**
	 * Show the form for editing the specified article.
	 *
	 * @param  Article  $article
	 * @return Response
	 */
	public function edit(Article $article)
	{
        $tags = Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
	}

	/**
	 * Update the specified article in storage.
	 *
	 * @param  Article  $article
	 * @return Response
	 */
	public function update(Article $article, ArticleRequest $request)
	{
        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');
	}

	/**
	 * Remove the specified article from storage.
	 *
	 * @param  Article  $article
	 * @return void
	 */
	public function destroy($article)
	{
		$article->delete();

        return redirect('articles');
	}

    /**
     * Sync up the list of tags in the database.
     *
     * @param Article $article
     * @param array $tags
     */
    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }

    /**
     * Save a new article
     *
     * @param ArticleRequest $request
     * @return mixed
     */
    private function createArticle(ArticleRequest $request)
    {
        $article = $this->auth->user()->articles()->create($request->all());

        $article->tags()->attach($request->input('tag_list'));
        
        return $article;    
    }

}
