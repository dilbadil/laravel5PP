<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\HttpResponse;
use App\Tag;
use App\Contracts\ArticleRepository;

use App\Commands\Articles\CreateArticle;
use App\Commands\Articles\PublishArticle;
use App\Commands\Articles\UpdateArticle;

class ArticlesController extends Controller {

    /**
     * @var ArticleRepository
     */
    protected $articleRepo;

    /**
     * Create articles controller instance 
     *
     * @param ArticleRepository $articleRepo
     */
    public function __construct(ArticleRepository $articleRepo)
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->articleRepo = $articleRepo;
    }

	/**
	 * Display a listing of the article.
	 *
	 * @return Response
	 */
	public function index()
	{
        $articles = $this->articleRepo->getAllPublished();

        return view('articles.index', compact('articles'));
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
        $article = $this->articleRepo->getPublishedBySlug($articleSlug);

        return view('articles.show', compact('article'));
	}

	/**
	 * Show the form for editing the specified article.
	 *
	 * @param  string  $articleSlug
	 * @param  Tag  $tag
	 * @return Response
	 */
	public function edit($articleSlug, Tag $tag)
	{
        $article = $this->articleRepo->getPublishedBySlug($articleSlug);
        $tags = $tag->lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
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
		$article = $this->articleRepo->delete($articleId);

        return redirectImportant('articles', 'Article has been deleted');
	}

}
