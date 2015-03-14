<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\HttpResponse;

use App\Commands\Articles\ShowAllArticles;
use App\Commands\Articles\CreateArticle;
use App\Commands\Articles\ShowAnArticle;
use App\Commands\Articles\PublishArticle;
use App\Commands\Articles\UpdateArticle;
use App\Commands\Articles\RemoveArticle;

class ArticlesController extends Controller {

    /**
     * Create articles controller instance 
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('owner.article', ['only' => ['edit', 'update', 'destroy']]);
    }

	/**
	 * Display a listing of the article.
	 *
	 * @return Response
	 */
	public function index()
	{
        $data = $this->dispatch(new ShowAllArticles);

        return view('articles.index', $data);
	}

	/**
	 * Show the form for creating a new article.
	 *
	 * @return Response
	 */
	public function create()
	{
        $data = $this->dispatch(new CreateArticle);

		return view('articles.create', $data);
	}

	/**
	 * Store a newly created article in storage.
	 *
	 * @return Response
	 */
	public function store(ArticleRequest $request)
	{
        $article = $this->dispatch(
            new PublishArticle($request->all())
        );

        return redirectImportant('articles','Your article has been created');
	}

	/**
	 * Display the specified article.
	 *
	 * @param  string $articleSlug
	 * @return Response
	 */
	public function show($articleSlug)
	{
        $data = $this->dispatch(new ShowAnArticle($articleSlug));

        return view('articles.show', $data);
	}

	/**
	 * Show the form for editing the specified article.
	 *
	 * @param  string  $articleSlug
	 * @return Response
	 */
	public function edit($articleSlug)
	{
        $data = $this->dispatch(new ShowAnArticle($articleSlug));

        return view('articles.edit', $data);
	}

	/**
	 * Update the specified article in storage.
	 *
	 * @param  string  $articleId
	 * @return Response
	 */
	public function update($articleId, ArticleRequest $request)
	{
       $this->dispatch(
           new UpdateArticle($articleId, $request->all())
       );

        return redirectImportant('articles','Your article has been updated');
	}

	/**
	 * Remove the specified article from storage.
	 *
	 * @param  int  $articleId
	 * @return void
	 */
	public function destroy($articleId)
	{
        $article = $this->dispatch(new RemoveArticle($articleId));

        return redirectImportant('articles', 'Article has been deleted');
	}

}
