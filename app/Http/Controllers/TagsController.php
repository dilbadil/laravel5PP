<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tag;

use Illuminate\Http\Request;

class TagsController extends Controller {

    public function show(Tag $tag)
    {
       $articles = $tag->articles()->published()->get(); 

       return view('articles.index', compact('articles'));
    }

}
