<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Contracts\TagRepository;

use Illuminate\Http\Request;

class TagsController extends Controller {

    /**
     * Instance of the controller.
     *
     * @var TagRepository $tagRepo
     * @return void
     */
    public function __construct(TagRepository $tagRepo)
    {
        $this->tagRepo = $tagRepo;
    }

    /**
     * Show all tags.
     *
     * @return Response
     */
    public function index()
    {
        $tags = $this->tagRepo->getAll();

        return view('tags.index', compact('tags'));
    }

    /**
     * Show articles in the specified tag.
     *
     * @param string $tagName
     * @return Response
     */
    public function show($tagName)
    {
       $articles = $this->tagRepo->getArticlesByTagName($tagName);

       return view('articles.index', compact('articles'));
    }

}
