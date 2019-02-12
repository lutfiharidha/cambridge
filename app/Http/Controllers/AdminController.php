<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Package;
use App\Storie;
use App\Order;
use App\Announce;
use App\Blog;
use App\Gallery;
use App\Module;
use App\Article;
use Auth;
class AdminController extends Controller
{
    public function index()
    {
        $dataadmin = User::whereHas('roles', function($q){$q->whereIn('name', ['admin']);})->count();
    	$datateacher = User::whereHas('roles', function($q){$q->whereIn('name', ['teacher']);})->count();
    	$datastudent = User::whereHas('roles', function($q){$q->whereIn('name', ['student']);})->count();
        $datauser= User::count();

        $dataorder = Order::count();

        $datablog = Blog::count();
        $pdatablog = Blog::where('status','Publish')->count();
        $udatablog = Blog::where('status','Not Publish')->count();

        $datamodule = Module::count();
        $pdatamodule = Module::where('status','Publish')->count();
        $udatamodule = Module::where('status','Not Publish')->count();

        $dataarticle = Article::count();
        $pdataarticle = Article::where('status','Publish')->count();
        $udataarticle = Article::where('status','Not Publish')->count();

        $datagallery = Gallery::count();
        $pdatagallery = Gallery::where('status','Publish')->count();
        $udatagallery = Gallery::where('status','Not Publish')->count();

        $dataannounce = Announce::count();
        $pdataannounce = Announce::where('status','Publish')->count();
        $udataannounce = Announce::where('status','Not Publish')->count();

        $datastory = Storie::count();
        $pdatastory = Storie::where('status','Publish')->count();
        $udatastory = Storie::where('status','Not Publish')->count();

        $datapackage = Package::count();
        $pdatapackage = Package::where('status','Publish')->count();
        $udatapackage = Package::where('status','Not Publish')->count();
        return view('admin.index', compact(
            'first_time_login','dataadmin','datateacher','datastudent','datauser','datablog','datagallery','dataannounce','datastory','datapackage','pdatablog','udatablog','pdatagallery','udatagallery','pdataannounce','udataannounce','pdatastory','udatastory','pdatapackage','udatapackage','datamodule','pdatamodule','udatamodule','dataarticle','pdataarticle','udataarticle','dataorder'
        ));
    }
    //ORDERS CONTROLLER
    public function order()
    {
        $orders = Order::with('get_package')->latest()->paginate(7);
        return view('admin.order', compact('orders'));
    }
    //END ORDERS CONTROLLER
//TEACHERS CONTROLLER
    public function indexteacher()
    {
    	$teacher = User::whereHas('roles', function($q){$q->whereIn('name', ['teacher']);})->paginate(5);
        return view('admin.teacher',compact('teacher'));
    }


    public function createteacher()
    {
    	return view('admin.createteacher');
    }


    public function storeteacher(request $request)
    { 
        $validator = Validator::make($request->all(), [
            "name" => "required|string|min:4|max:255",
            "email" => "required|string|email|max:255|unique:users",
            "password" => "required|string|min:6|confirmed",
            ]);
        if ($validator->fails())
                {
                    return redirect()->back()->withErrors($validator);
                }
            else{
        		$user = User::create([
        			'name' => $request->name,
        			'email' => $request->email,
        			'password' => bcrypt($request->password),
        			'phone' => $request->phone,
        			]);
        		 $user->attachRole(Role::where('name','teacher')->first());
                }
		return redirect()->route('data.teacher')->with('message','Your Teacher Has Been Added');
	}


	public function editteacher($id)
	{
		$teacher = User::find($id);
        return view('admin.editteacher',compact('teacher'));
    }


    public function updateteacher(Request $request, $id)
    {
        $teacher = User::find($id);
        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
        ]);
    return redirect()->route('data.teacher')->with('message','Your Teacher Has Been Updated');
    }

    public function teacherdestroy(user $user)
	{
		$user -> delete();
        return redirect()->back()->with('message','Berhasil Di Delete');
    }
//END TEACHERS CONTROLLER

//STUDENTS CONTROLLER
	public function indexstudent()
    {
    	$student = User::whereHas('roles', function($q){
    		$q->whereIn('name', ['student']);})->paginate(5);
        return view('admin.student',compact('student'));
    }


    public function createstudent()
    {
    	return view('admin.createstudent');
    }


    public function storestudent(request $request)
    { 
		$this->validate($request,[
			'name' => 'required|string|min:4|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
		]);
		$user = User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => bcrypt($request->password),
			'type' => $request->type,
			'phone' => $request->phone,
			]);
		 $user->attachRole(Role::where('name','student')->first());
		return redirect()->back()->with('message','Your student Has Been Added');
	}


	public function editstudent($id)
	{
		$student = User::find($id);
        return view('admin.editstudent',compact('student'));
    }


    public function updatestudent(Request $request, $id)
    {
        $student = User::find($id);
        $student->update([
        	'name' => $request->name,
			'email' => $request->email,
			'password' => bcrypt($request->password),
			'type' => $request->type,
			'phone' => $request->phone,
		]);
		return redirect()->back()->with('message','Berhasil Di Delete');

    }


    public function studentdestroy(user $user)
	{
		$user -> delete();
        return redirect()->back()->with('message','Berhasil Di Delete');
    }
//END STUDENTS CONTROLLER


    //PACKAGE CONTROLLER
    public function indexpackage()
    {
        $package = Package::latest()->paginate(5);
        return view('admin.package',compact('package'));
    }


    public function createpackage()
    {
        return view('admin.createpackage');
    }


    public function storepackage(request $request)
    { 
        $package = Package::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'until' => $request->until,
            'status' => $request->status,
            ]);
        return redirect()->route('data.package')->with('message','Your Package Has Been Added');
    }


    public function editpackage($id)
    {
        $package = Package::find($id);
        return view('admin.editpackage',compact('package'));
    }


    public function updatepackage(Request $request, $id)
    {
        $package = Package::find($id);
        $package->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'until' => $request->until,
            'status' => $request->status,
        ]);
        return redirect()->route('data.package')->with('message','Your Package Has Been Updated');

    }


    public function packagedestroy(package $package)
    {
        $package -> delete();
        return redirect()->back()->with('message','Your Package Has Been Deleted');
    }
//END PACKAGE CONTROLLER


    //STORIES CONTROLLER
    public function indexstories()
    {
        $stories = Storie::latest()->paginate(5);
        return view('admin.stories',compact('stories'));
    }


    public function createstories()
    {
        return view('admin.createstories');
    }


    public function storestories(request $request)
    { 
        $destinationPath = public_path().'/img/stories/';
        $validator = Validator::make($request->all(), [
            "image"    => "required|mimes:jpg,jpeg,png,gif|max:2000",
            "description" => "required"
            ]);
            if ($validator->fails())
                {
                    return redirect()->back()->withErrors($validator);
                }
            else{
                $fileName = Input::file('image')->getClientOriginalName();
                $file = Input::file('image')->move($destinationPath, $fileName);
                 Storie::create([
                    'name' => $request->name,
                    'post' => $request->description,
                    'image' => $fileName,
                    'class' => $request->class,
                    'year' => $request->year,
                    'status' => $request->status,
                    ]);
        return redirect()->route('data.stories')->with('message','Your Stories Has Been Added');
    }
}


    public function editstories($id)
    {
        $stories = Storie::find($id);
        return view('admin.editstories',compact('stories'));
    }


    public function updatestories(Request $request, $id)
    {
        $stories = Storie::find($id);
        if($request->file('image') == ""){
            $stories->update([
            'name' => $request->name,
            'post' => $request->description,
            'class' => $request->class,
            'year' => $request->year,
            'status' => $request->status,
        ]);
        }
        else{
        $destinationPath = public_path().'/img/stories/';
        $validator = Validator::make($request->all(), [
            "image"    => "required|mimes:jpg,jpeg,png,gif|max:2000",
            "description" => "required"
            ]);
            if ($validator->fails())
                {
                    return redirect()->back()->withErrors($validator);
                }
            else{
                $fileName = Input::file('image')->getClientOriginalName();
                $file = Input::file('image')->move($destinationPath, $fileName);     
                $stories->update([
                    'name' => $request->name,
                    'post' => $request->description,
                    'image' => $fileName,
                    'class' => $request->class,
                    'year' => $request->year,
                    'status' => $request->status,
                ]);
        }

    }
    return redirect()->route('data.stories')->with('message','Your stories Has Been Updated');

}


    public function storiesdestroy(storie $storie)
    {
        $storie -> delete();
        return redirect()->back()->with('message','Your stories Has Been Deleted');
    }
//END STORIES CONTROLLER


//ANNOUNCEMENT CONTROLLER
    public function indexannounce()
    {
        $announcement = Announce::latest()->paginate(5);
        $image = array("jpg", "png", "jpeg", "gif");
        return view('admin.announce',compact('announcement','image'));
    }


    public function createannounce()
    {
        return view('admin.createannounce');
    }


    public function storeannounce(request $request)
    { 
        if($request->file('file') == ""){
            $announce = Announce::create([
            'title' => $request->title,
            'post' => $request->description,
            'status' => $request->status,
            'forr' => $request->forr,
        ]);
        }
            else{
        $destinationPath = public_path().'/img/announcement/';
        $validator = Validator::make($request->all(), [
            "file"    => "required|mimes:jpg,jpeg,png,gif,pdf,doc,docx,zip,rar|max:2000",
            "description" => "required"
            ]);
            if ($validator->fails())
                {
                    return redirect()->back()->withErrors($validator);
                }
            else{
                $fileName = Input::file('file')->getClientOriginalName();
                $file = Input::file('file')->move($destinationPath, $fileName);
                    Announce::create([
                    'title' => $request->title,
                    'post' => $request->description,
                    'image' => $fileName,
                    'status' => $request->status,
                    'forr' => $request->forr,
                    ]);
    }
        
    }
    return redirect()->route('data.announce')->with('message','Your Announcement Has Been Added');
}

    public function editannounce($id)
    {
         $image = array("jpg", "png", "jpeg", "gif");
        $announce = Announce::find($id);
        return view('admin.editannounce',compact('announce','image'));
    }


    public function updateannounce(Request $request, $id)
    {
        $announce = Announce::find($id);
        if($request->file('file') == ""){
            $announce->update([
            'title' => $request->title,
            'post' => $request->post,
            'status' => $request->status,
            'forr' => $request->forr,
        ]);
        }
        else{
        $destinationPath = public_path().'/img/announcement/';
        $validator = Validator::make($request->all(), [
            "file"    => "required|mimes:jpg,jpeg,png,gif,pdf,doc,docx,zip,rar|max:2000",
            "description" => "required"
            ]);
            if ($validator->fails())
                {
                    return redirect()->back()->withErrors($validator);
                }
            else{
                $fileName = Input::file('file')->getClientOriginalName();
                $file = Input::file('file')->move($destinationPath, $fileName);     
                $announce->update([
                    'title' => $request->title,
                    'post' => $request->description,
                    'image' => $fileName,
                    'status' => $request->status,
                    'forr' => $request->forr,
                ]);
        }
    }
return redirect()->route('data.announce')->with('message','Your Announcement Has Been Updated');

}
    public function announcedestroy(announce $announce)
    {
        $announce -> delete();
        return redirect()->back()->with('message','Your Announcement Has Been Deleted');
    }
//END ANNOUNCEMENT CONTROLLER

    //BLOG CONTROLLER
    public function indexblog()
    {
        $blog = Blog::latest()->paginate(7);
        return view('admin.blog',compact('blog'));
    }


    public function createblog()
    {
        return view('admin.createblog');
    }


    public function storeblog(request $request)
    { 
        $destinationPath = public_path().'/img/blogs/';
        $validator = Validator::make($request->all(), [
            "file"    => "required|mimes:jpg,jpeg,png,gif|max:2000",
            "title" => "required",
            "writer" => "required",
            "post" => "required"
            ]);
            if ($validator->fails())
                {
                    return redirect()->back()->withErrors($validator);
                }
            else{
            $fileName = Input::file('file')->getClientOriginalName();
            $file = Input::file('file')->move($destinationPath, $fileName);
                    Blog::create([
                    'title' => $request->title,
                    'post' => $request->post,
                    'image' => $fileName,
                    'status' => $request->status,
                    'writer' => $request->writer,
                    'uid' => Auth::user()->id,
                    ]);
        return redirect()->route('data.blog')->with('message','Your blog Has Been Added');
    }
}


    public function editblog($id)
    {
        $blog = Blog::find($id);
        return view('admin.editblog',compact('blog'));
    }


    public function updateblog(Request $request, $id)
    {
        $blog = Blog::find($id);
        if($request->file('file') == ""){
            $blog->update([
            'title' => $request->title,
            'post' => $request->post,
            'status' => $request->status,
            'writer' => $request->writer,
            'uid' => Auth::user()->id,
        ]);
        }
        else{
        $destinationPath = public_path().'/img/blogs/';
        $validator = Validator::make($request->all(), [
            "file"    => "required|mimes:jpg,jpeg,png,gif|max:2000",
            "title" => "required",
            "writer" => "required",
            "post" => "required"
            ]);
            if ($validator->fails())
                {
                    return Redirect::back()->withErrors($validator);
                } 
                else{
                $fileName = Input::file('file')->getClientOriginalName();
                $file = Input::file('file')->move($destinationPath, $fileName);   
                $blog->update([
                    'title' => $request->title,
                    'post' => $request->post,
                    'image' => $fileName,
                    'status' => $request->status,
                    'writer' => $request->writer,
                    'uid' => Auth::user()->id,
                ]);
        }
    }
        return redirect()->route('data.blog')->with('message','Your blog Has Been Updated');
}


    public function blogdestroy(blog $blog)
    {
        $blog -> delete();
        return redirect()->back()->with('message','Your blog Has Been Deleted');
    }
//END BLOG CONTROLLER

//GALLERY CONTROLLER
    public function indexgallery()
    {
        $gallery = gallery::latest()->paginate(5);
        return view('admin.gallery',compact('gallery'));
    }


    public function creategallery()
    {
        return view('admin.creategallery');
    }


    public function storegallery(request $request)
    { 
        $destinationPath = public_path().'/img/galleries/';
        $validator = Validator::make($request->all(), [
            "image"    => "required|mimes:jpg,jpeg,png,gif|max:2000",
            "caption" => "required"
            ]);
            if ($validator->fails())
                {
                    return redirect()->back()->withErrors($validator);
                }
            else{
            $fileName = Input::file('image')->getClientOriginalName();
            $file = Input::file('image')->move($destinationPath, $fileName);
            Gallery::create([
            'caption' => $request->caption,
            'image' => $fileName,
            'status' => $request->status,
            ]);
            }
            return redirect()->route('data.gallery')->with('message','Your Photo Has Been Added');
        }


    public function editgallery($id)
    {
        $gallery = Gallery::find($id);
        return view('admin.editgallery',compact('gallery'));
    }


    public function updategallery(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        if($request->file('image') == ""){
            $gallery->update([
            'caption' => $request->caption,
            'status' => $request->status,
        ]);
        }
        else{
        $destinationPath = public_path().'/img/blogs/';
        $validator = Validator::make($request->all(), [
            "image"    => "required|mimes:jpg,jpeg,png,gif|max:2000",
            "caption" => "required",
            ]);
            if ($validator->fails())
                {
                    return Redirect::back()->withErrors($validator);
                } 
                else{
                    $fileName = Input::file('image')->getClientOriginalName();
                    $file = Input::file('image')->move($destinationPath, $fileName);
                    $gallery->update([
                        'caption' => $request->caption,
                        'image' => $fileName,
                        'status' => $request->status,
                    ]);
                    }
                }
        return redirect()->route('data.gallery')->with('message','Your Photo Has Been Updated');
    }

    public function gallerydestroy(gallery $gallery)
    {
        $gallery -> delete();
        return redirect()->back()->with('message','Your Photo Has Been Deleted');
    }
//END GALLERY CONTROLLER

// MODULE CONTROLLER
    public function indexmodule()
    {
        $module = Module::latest()->paginate(7);
        return view('admin.module',compact('module'));
    }
    public function moduledestroy(module $module)
    {
        $module -> delete();
        return redirect()->back()->with('message','Your Module Has Been Deleted');
    }
    // END MODULE CONTROLLER

    // ARTICLE CONTROLLER
    public function indexarticle()
    {
        $article = Module::latest()->paginate(7);
        return view('admin.article',compact('article'));
    }
    public function articledestroy(article $article)
    {
        $article -> delete();
        return redirect()->back()->with('message','Your Article Has Been Deleted');
    }
// END ARTICLE CONTROLLER
}