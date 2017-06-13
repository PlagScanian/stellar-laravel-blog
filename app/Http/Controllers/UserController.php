<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Posts;
use Illuminate\Http\Request;
class UserController extends Controller {
	/**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	/*
	 * Display all the posts of a particular user
	 * 
	 * @param int $id
	 * @return Response
	 */
	public function user_posts_all(Request $request)
	{
		//
		$user = $request->user();
		$posts = Posts::where('user_id', $user->id)->orderBy('created_at','desc')->paginate(5);
		$title = $user->name;
		return view('home')->withPosts($posts)->withTitle($title);
	}
}