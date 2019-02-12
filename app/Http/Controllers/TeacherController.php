<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Article;
use Auth;
use App\Module;
use App\Announce;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
class TeacherController extends Controller
{
    public function index()
    {
        $image = array("jpg", "png", "jpeg", "gif");
        $dataannounce = Announce::where('status','Publish')->where('forr','teacher')->count();
        $announce = Announce::where('status','Publish')->where('forr','Teacher')->latest()->paginate(3);
    	$datablog = Auth::user()->get_blog()->count();
        $pdatablog = Auth::user()->get_blog()->where('status','Publish')->count();
        $udatablog = Auth::user()->get_blog()->where('status','Not Publish')->count();

        $datamodule = Auth::user()->get_module()->count();
        $pdatamodule = Auth::user()->get_module()->where('status','Publish')->count();
        $udatamodule = Auth::user()->get_module()->where('status','Not Publish')->count();

        $dataarticle = Auth::user()->get_article()->count();
        $pdataarticle = Auth::user()->get_article()->where('status','Publish')->count();
        $udataarticle = Auth::user()->get_article()->where('status','Not Publish')->count();
        return view('teacher.index', compact('dataannounce','announce','datablog','pdatablog','udatablog','datamodule','pdatamodule','udatamodule','dataarticle','pdataarticle','udataarticle','image'));
    }
    //BLOG CONTROLLER
    public function indexblog()
    {
        $blog = Auth::user()->get_blog()->latest()->paginate(7);
        return view('teacher.blog',compact('blog'));
    }


    public function createblog()
    {
        return view('teacher.createblog');
    }


    public function storeblog(request $request)
    { 
        $destinationPath = public_path().'/img/blogs/';
        $validator = Validator::make($request->all(), [
            "image"    => "required|mimes:jpg,jpeg,png,gif|max:2000",
            "title" => "required",
            "writer" => "required",
            "description" => "required"
            ]);
            if ($validator->fails())
                {
                    return redirect()->back()->withErrors($validator);
                }
            else{
            $fileName = Input::file('image')->getClientOriginalName();
            $file = Input::file('image')->move($destinationPath, $fileName);
                    Blog::create([
                    'title' => $request->title,
                    'post' => $request->description,
                    'image' => $fileName,
                    'status' => $request->status,
                    'writer' => $request->writer,
                    'uid' => Auth::user()->id,
                    ]);
        return redirect()->route('te.blog')->with('message','Your blog Has Been Added');
    }
}


    public function editblog($id)
    {
        $blog = Blog::find($id);
        return view('teacher.editblog',compact('blog'));
    }


    public function updateblog(Request $request, $id)
    {
        $blog = Blog::find($id);
        if($request->file('file') == ""){
            $blog->update([
            'title' => $request->title,
            'post' => $request->description,
            'status' => $request->status,
            'writer' => $request->writer,
            'uid' => Auth::user()->id,
        ]);
        }
        else{
        $destinationPath = public_path().'/img/blogs/';
        $validator = Validator::make($request->all(), [
            "image"    => "required|mimes:jpg,jpeg,png,gif|max:2000",
            "title" => "required",
            "writer" => "required",
            "description" => "required"
            ]);
            if ($validator->fails())
                {
                    return Redirect::back()->withErrors($validator);
                } 
                else{
                $fileName = Input::file('image')->getClientOriginalName();
                $file = Input::file('image')->move($destinationPath, $fileName);   
                $blog->update([
                    'title' => $request->title,
                    'post' => $request->description,
                    'image' => $fileName,
                    'status' => $request->status,
                    'writer' => $request->writer,
                    'uid' => Auth::user()->id,
                ]);
        }
        return redirect()->route('te.blog')->with('message','Your blog Has Been Updated');

    }
}


    public function blogdestroy(blog $blog)
    {
        $blog -> delete();
        return redirect()->back()->with('message','Your blog Has Been Deleted');
    }
//END BLOG CONTROLLER

    //MODULE CONTROLLER
    public function indexmodule()
    {
        $module = Auth::user()->get_module()->latest()->paginate(7);
        return view('teacher.module',compact('module'));
    }


    public function createmodule()
    {
        return view('teacher.createmodule');
    }


    public function storemodule(request $request)
    { 

      $destinationPath = public_path().'/files/article/';
      $validator = Validator::make($request->all(), [
            "file"    => "required|mimes:pdf,doc,docx,zip,rar|max:2000",
            "title" => "required",
            "uploader" => "required",
            ]);
            if ($validator->fails())
				{
                    return redirect()->back()->withErrors($validator);
        		}
	        else{
                $fileName = Input::file('file')->getClientOriginalName();
                $file = Input::file('file')->move($destinationPath, $fileName);
                        Module::create([
                        'title' => $request->title,
                        'file' => $fileName,
                        'status' => $request->status,
                        'uploader' => $request->uploader,
                        'uid' => Auth::user()->id,

                        ]);
	        } 
	return redirect()->route('data.module')->with('message','Your module Has Been Added');
    }

    public function editmodule($id)
    {
        $module = Module::find($id);
        return view('teacher.editmodule',compact('module'));
    }


    public function updatemodule(Request $request, $id)
    {
        $module = Module::find($id);
        if($request->file('file') == ""){
            $module->update([
            'title' => $request->title,
			'status' => $request->status,
			'uploader' => $request->uploader,
			'uid' => Auth::user()->id,
        ]);
        }
        else{
        $destinationPath = public_path().'/files/module/';
        $validator = Validator::make($request->all(), [
            "file"    => "required|mimes:pdf,doc,docx,zip,rar|max:2000",
            "title" => "required",
            "uploader" => "required",
            ]);
            if ($validator->fails())
                {
                    return redirect()->back()->withErrors($validator);
                } 
                else{
                $fileName = Input::file('file')->getClientOriginalName();
                $file = Input::file('file')->move($destinationPath, $fileName);   
			            $module->update([
			            'title' => $request->title,
			            'file' => $fileName,
			            'status' => $request->status,
			            'uploader' => $request->uploader,
			            'uid' => Auth::user()->id,

			            ]);
        		}

        return redirect()->route('data.module')->with('message','Your module Has Been Updated');

    }
}


    public function moduledestroy(module $module)
    {
        $module -> delete();
        return redirect()->back()->with('message','Your module Has Been Deleted');
    }
//END module CONTROLLER

    //ARTICLE CONTROLLER
    public function indexarticle()
    {
        $article = Auth::user()->get_article()->latest()->paginate(7);
        return view('teacher.article',compact('article'));
    }


    public function createarticle()
    {
        return view('teacher.createarticle');
    }


    public function storearticle(request $request)
    { 

      $destinationPath = public_path().'/files/article/';
      $validator = Validator::make($request->all(), [
            "file"    => "required|mimes:pdf,doc,docx,zip,rar|max:2000",
            "title" => "required",
            "article" => "required",
            "writer" => "required",
            ]);
            if ($validator->fails())
                {
                    return redirect()->back()->withErrors($validator);
                }
            else{
                $fileName = Input::file('file')->getClientOriginalName();
                $file = Input::file('file')->move($destinationPath, $fileName);
                        article::create([
                        'title' => $request->title,
                        'file' => $fileName,
                        'article' => $request->article,
                        'status' => $request->status,
                        'writer' => $request->writer,
                        'uid' => Auth::user()->id,

                        ]);
            } 
    return redirect()->route('data.article')->with('message','Your article Has Been Added');
    }

    public function editarticle($id)
    {
        $article = article::find($id);
        return view('teacher.editarticle',compact('article'));
    }


    public function updatearticle(Request $request, $id)
    {
        $article = article::find($id);
        if($request->file('file') == ""){
            $article->update([
            'title' => $request->title,
            'article' => $request->article,
            'status' => $request->status,
            'writer' => $request->writer,
            'uid' => Auth::user()->id,
        ]);
        }
        else{
        $destinationPath = public_path().'/files/article/';
        $validator = Validator::make($request->all(), [
            "file"    => "required|mimes:pdf,doc,docx,zip,rar|max:2000",
            "title" => "required",
            "article" => "required",
            "writer" => "required",
            ]);
            if ($validator->fails())
                {
                    return redirect()->back()->withErrors($validator);
                } 
                else{
                $fileName = Input::file('file')->getClientOriginalName();
                $file = Input::file('file')->move($destinationPath, $fileName);   
                        $article->update([
                        'title' => $request->title,
                        'file' => $fileName,
                        'article' => $request->article,
                        'status' => $request->status,
                        'writer' => $request->writer,
                        'uid' => Auth::user()->id,

                        ]);


                }
    }
    return redirect()->route('data.article')->with('message','Your article Has Been Updated');
}


    public function articledestroy(article $article)
    {
        $article -> delete();
        return redirect()->back()->with('message','Your article Has Been Deleted');
    }
//END ARTICLE CONTROLLER
}
