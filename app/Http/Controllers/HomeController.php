<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = Blog::all()->forPage(1 , 3);
        $pageLength = Blog::all(['id'])->count();
        return view(
            'website.home' , [
                               'blogs' => $blogs ,
                               'page' => 1 ,
                               'pageLength' => $pageLength
                           ]
        );
    }

    public function search(Request $request)
    {
        $validate = Validator::make($request->all() , ['search' => 'required|min:3|max:100|string'])->validate();
        $search = '%'.$validate['search'].'%';
        $blogs = Blog::where('title' , 'LIKE' ,$search )->orWhere('description' , 'LIKE' ,$search )->orWhere('short_description' , 'LIKE' ,$search )->orWhere('content' , 'LIKE' ,$search )->orWhere('title' , 'LIKE' ,$search )->get();
        return view(
            'website.home' , [
                               'blogs' => $blogs ,
                               'page' => 1 ,
                               'pageLength' => 1
                           ]
        );
    }

    public function page($page)
    {
        $validate = Validator::make(['page' => $page] , ['page' => 'required|integer|min:1|max:1000'])->validated();
        $blogs = Blog::all(['id' , 'title' , 'slug' , 'short_description' , 'image'])->forPage($validate['page'] , 3);
        $pageLength = Blog::all(['id'])->count();
        return view(
            'website.home' , [
                               'blogs' => $blogs ,
                               'page' => $page ,
                               'pageLength' => $pageLength
                           ]
        );
    }

    public function single(Blog $blog)
    {
        return view(
            'website.single' , [
                                 'blog' => $blog
                             ]
        );
    }
}
