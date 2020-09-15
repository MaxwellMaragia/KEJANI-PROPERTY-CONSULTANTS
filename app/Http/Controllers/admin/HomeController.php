<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\user\post;
use App\User;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $posts = post::all();
        $unpublished = post::where('status','')->get();
        $users = User::all();
        $unactivated = User::where('status',NULL);
        $latest = post::orderBy('posts.created_at','DESC')->take(5)->get();
        return view('admin.home',compact('unpublished','latest','posts','users','unactivated'));
    }

    public function unauthorised()
    {
        return view('admin.unauthorised');
    }

}
