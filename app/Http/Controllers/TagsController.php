<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;

use Illuminate\Http\Request;

class TagsController extends Controller {

    /**
     * Show all tags.
     *
     * @param Tag $tag
     * @return Response
     */
    public function index(Tag $tag)
    {
        $tags = $tag->all();

        return view('tags.index', compact('tags'));
    }

    /**
     * Show articles in the specified tag.
     *
     * @param Tag $tag
     * @return Response
     */
    public function show(Tag $tag)
    {
       $articles = $tag->articles()->published()->simplePaginate(4); 

       return view('articles.index', compact('articles'));
    }

}
