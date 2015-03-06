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
	 * @param  string $id
	 * @return Response
	 */
	public function show($id)
	{
        $article = $this->articleRepo->getPublishedById($id);

        return view('articles.show', compact('article'));
	}

	/**
	 * Show the form for editing the specified article.
	 *
	 * @param  string  $id
	 * @param  Tag  $tag
	 * @return Response
	 */
	public function edit($id, Tag $tag)
	{
        $article = $this->articleRepo->getPublishedById($id);
        $tags = $tag->lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
	}

	/**
	 * Update the specified article in storage.
	 *
	 * @param  string  $id
	 * @return Response
	 */
	public function update($id, ArticleRequest $request)
	{
       $articleRequest = array_add($request->all(), 'id', $id);

       $this->dispatch(
           new UpdateArticle($articleRequest)
       );

        return redirectImportant('articles','Your article has been updated');
	}

	/**
	 * Remove the specified article from storage.
	 *
	 * @param  int  $id
	 * @return void
	 */
	public function destroy($id)
	{
		$article = $this->articleRepo->delete($id);

        return redirectImportant('articles', 'Article has been deleted');
	}

}
