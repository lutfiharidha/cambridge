<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\Article;
use App\Announce;

class StudentController extends Controller
{
    public function index()
    {
    	$image = array("jpg", "png", "jpeg", "gif");
        $dataannounce = Announce::where('status','Publish')->where('forr','Student')->count();
        $announce = Announce::where('status','Publish')->where('forr','Student')->latest()->paginate(4);
        return view('student.index', compact('image','dataannounce','announce'));
    }
    public function indexarticle()
    {
        $article = Article::latest()->paginate(3);
        return view('student.article',compact('article'));
    }
    public function action($id)
    {
    	$image = array("jpg", "png", "jpeg", "gif");
        $blog = Article::where('status','=',"Publish")->latest()->paginate(3);
    	$posts = Article::where('status','=',"Publish")->find($id);
         if(!$posts)
        	abort(404);
        return view('student.articlemore',compact('posts','blog','image'));
    }
     public function indexmodule()
    {
        $module = Module::latest()->paginate(7);
        return view('student.module',compact('module'));
    }
}
