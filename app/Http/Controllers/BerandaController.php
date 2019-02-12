<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Announce;
use App\Blog;
use App\User;
use App\Order;
use App\Package;
use App\Gallery;

class BerandaController extends Controller
{
    public function beranda()
    {
    	$package = DB::select('SELECT * FROM packages where status = "Publish" ORDER BY id DESC');
    	$stories = DB::select('SELECT * FROM stories where status = "Publish" ORDER BY id DESC');
        $teacher = User::whereHas('roles', function($q){$q->whereIn('name', ['teacher']);})->get();
    	return view('welcome', compact('package','stories','teacher'));
    }
    public function announcement()
    {
        $image = array("jpg", "png", "jpeg", "gif");
    	$announcement = Announce::where('status','=', "Publish")->where('forr','=', "Everyone")->latest()->paginate(5);
    	return view('announcement', compact('announcement','image'));
    }
    public function index()
    {
    	$blog = Blog::where('status','=', "Publish")->latest()->paginate(5);
    	$blogs = Blog::where('status','=',"Publish")->orderBy('id', 'asc')->paginate(3);
    	return view('blog', compact('blog','blogs'));
    }
    public function galleries()
    {
        $gallery = Gallery::where('status','=', "Publish")->latest()->paginate(5);
        $blogs = Blog::where('status','=',"Publish")->orderBy('id', 'asc')->paginate(3);
        return view('gallery', compact('gallery','blogs'));
    }
    public function action($id)
    {
        $blog = Blog::where('status','=',"Publish")->latest()->paginate(3);
    	$posts = Blog::where('status','=',"Publish")->find($id);
         if(!$posts)
        	abort(404);
        return view('posting',compact('posts','blog'));
    }
    public function order(request $request)
    { 
                Order::create([
                    'name' => $request->name,
                    'address' => $request->address,
                    'telp' => $request->phone,
                    'whatsapp' => $request->wa,
                    'package' => $request->package,
                    ]);
        return redirect()->back()->with('message','Thanks for your order we will contact you');
    }
    public function actionorder($id)
    {
        $posts = Package::where('status','=',"Publish")->find($id);
         if(!$posts)
            abort(404);
        return view('order',compact('posts'));
    }
}
