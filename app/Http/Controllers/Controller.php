<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;




    /**
     * The authenticated user
     *
     * @var App/User|null
     */
    protected $user;

    /**
     * Wether the user is logged in or not
     *
     * @var App/User|null
     */
    protected $signedIn;

    /**
     * Initialize the authenticated user
     *
     */
    public function __construct()
    {
        $this->user = $this->signedIn = Auth::user();
    }

}
