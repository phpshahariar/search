<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PageController extends Controller
{
    public function index(){
    	$posts = Post::orderBy('id', 'desc')->paginate(1);
    	return view('index')->withPosts($posts);
    }

    public function search(Request $request){
    	$search_txt = $request->search;

    	$posts = Post::orderBy('id', 'desc')
    			->where('title', 'like', '%'.$search_txt.'%')
    			->orwhere('description', 'like', '%'.$search_txt.'%')
    			->get();

    	return view('search')->withPosts($posts);
    }
}
