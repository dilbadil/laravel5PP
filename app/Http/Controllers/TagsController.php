<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Contracts\TagRepository;

use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;

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

    /**
     * Show form to create tag.
     *
     * @return Response
     */
    public function create()
    {
        $tag = $this->tagRepo->getModel();

        return view('tags.create', compact('tag'));
    }

	/**
	 * Store a newly created tag in storage.
	 *
     * @param TagRequest $request
	 * @return Response
	 */
	public function store(TagRequest $request)
	{
		$tag = $this->tagRepo->add($request->all());

        return redirectImportant('tags', $tag->name . ' has been created');
	}

    /**
     * Show form to edit the specified tag.
     *
     * @param string $tagName
     * @return Response
     */
	public function edit($tagName)
	{
        $tag = $this->tagRepo->getBy('name', $tagName);

		return view('tags.edit', compact('tag'));
	}

	/**
	 * Update the specified tag in storage.
	 *
	 * @param  TagRequest  $request
	 * @param  int  $tagId 
	 * @return Response
	 */
	public function update(TagRequest $request, $tagId)
	{
        $tag = $this->tagRepo->update($tagId, $request->all());

        return redirectImportant('tags', "Tag  " . $request->input('name') . " has been updated");
	}

	/**
	 * Remove the specified tag from storage.
	 *
	 * @param  int  $tagId
	 * @return Response
	 */
	public function destroy($tagId)
	{
        $tag = $this->tagRepo->remove($tagId);

        return redirectImportant('tags', "Tag " . $tag->name . " has been deleted");
	}


}
