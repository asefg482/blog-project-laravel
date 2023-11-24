<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreblogRequest;
use App\Http\Requests\UpdateblogRequest;
use App\Models\FileManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use function Egulias\EmailValidator\Validation\withError;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::where('user_id',Auth::id())->all();
        return view('admin.page.blog.index' , ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreblogRequest $request)
    {
        $validate = $request->validated();
        $fileName = time() . '.' . $validate['image']->extension();
        $validate['image']->storeAs('public/uploads/' , $fileName);
        $validate['image'] = 'storage/uploads/' . $fileName;
        $validate['file'] = 'storage/uploads/' . $fileName;
        $blogSlug = $validate['slug'];
        $validate['slug'] = Str::random(20);
        $validate['user_id'] = Auth::id();
        $fileResult = FileManager::create($validate);
        $validate['slug'] = $blogSlug;
        $validate['image'] = $fileResult->slug;
//        dd($validate);
        $result = Blog::create($validate);
        return redirect()->route('blog.create')->withError($validate)->with(['result' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view(
            'admin.page.blog.update' , [
                                         'title' => $blog['title'] ,
                                         'slug' => $blog['slug'] ,
                                         'description' => $blog['description'] ,
                                         'short_description' => $blog['short_description'] ,
                                         'image' => $blog['image'] ,
                                         'content' => $blog['content'] ,
                                     ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateblogRequest $request , Blog $blog)
    {
        $validate = $request->validated();
        if (isset($validate['image']))
        {
//            $fileName = time() . '.' . $validate['image']->extension();
//            $validate['image']->storeAs('public/uploads/blogs' , $fileName);
//            $validate['image'] = 'storage/uploads/blogs/' . $fileName;



            $fileName = time() . '.' . $validate['image']->extension();
            $validate['image']->storeAs('public/uploads/' , $fileName);
            $validate['image'] = 'storage/uploads/' . $fileName;
            $validate['file'] = 'storage/uploads/' . $fileName;
            $blogSlug = $validate['slug'];
            $validate['slug'] = Str::random(20);
            $validate['user_id'] = Auth::id();
            $fileResult = FileManager::create($validate);
            $validate['slug'] = $blogSlug;
            $validate['image'] = $fileResult->slug;
            unset($validate['file']);
        }
        $result = Blog::where('id' , $blog['id'])->update($validate);
        return redirect()->route('blog.edit' , $validate['slug'])->withError($validate)->with(['result' => $result]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        $deleteResult = $blog->delete();
        return redirect()->route('blog.index')->with($deleteResult);
    }
}
