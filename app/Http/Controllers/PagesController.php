<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

    /**
     * Show the home page to the user
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::latest('published_at')->published()->limit(4)->get();
        return view('pages.index', compact('articles'));
    }

    /**
     * Return the about page view
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Display the contact page
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('pages.contact');
    }

}
