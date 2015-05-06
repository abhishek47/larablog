<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller {

    /**
     *  Display all articles of the given tag..
     *
     * @param Tag $tag
     * @return \Illuminate\View\View
     */
    public function show(Tag $tag)
    {
        $articles =  $tag->articles()->published()->paginate(8);

        return view('articles.index', compact('articles', 'tag'));
    }

    /**
     * Display view to create a new tag
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
       $tags = Tag::all();
       return view('admin.tags', compact('tags'));
    }

    /**
     * Store the new tag to the database
     *
     */
    public function store(Request $request)
    {
         $this->validate($request, ['name' => 'required']);

         Tag::create($request->all());

         return redirect('admin/tags');

    }


}
