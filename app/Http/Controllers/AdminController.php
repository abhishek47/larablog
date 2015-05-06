<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {


    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

    /**
     *  Admin Panel Dashboard
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
       return view('admin.index');
    }

    /**
     * View all articles of the user
     *
     * @return \Illuminate\View\View
     */
    public function articles()
    {
        return view('admin.articles');
    }

    /**
     * View settings page for the blog
     *
     * @return \Illuminate\View\View
     */
    public function settings()
    {
        return view('admin.settings');
    }

}
