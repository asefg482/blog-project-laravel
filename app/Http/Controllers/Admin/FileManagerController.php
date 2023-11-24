<?php

namespace App\Http\Controllers\Admin;

use App\Models\FileManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFileManagerRequest;
use App\Http\Requests\UpdateFileManagerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use function Egulias\EmailValidator\Validation\withError;

class FileManagerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = FileManager::all();
        return view('admin.page.fileManager.index' , ['files' => $files]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.fileManager.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFileManagerRequest $request)
    {
        $validate = $request->validated();
        $fileName = time() . '.' . $validate['file']->extension();
        $validate['file']->storeAs('public/uploads/' , $fileName);
        $validate['file'] = 'storage/uploads/' . $fileName;
        $validate['slug'] = Str::random(20);
        $validate['user_id'] = Auth::id();
        $result = FileManager::create($validate);
        return redirect()->route('file-manager.create')->withError($validate)->with(['result' => $result]);
    }

    /**
     * Display the specified resource.
     */
    public function show(FileManager $fileManager)
    {
//        dd($fileManager);
        $path = str_replace('storage/' , 'public/' , $fileManager->file);
        $extension = pathinfo($path)['extension'];
        if (
            $extension == "png" ||
            $extension == "jpg" ||
            $extension == "jpeg" ||
            $extension == "svg" ||
            $extension == "gif"
        )
        {
            $file = Storage::get($path);
            return response($file , 200)->header('Content-Type' , 'image/jpeg');

        }
        else
        {
            echo Storage::get($path);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FileManager $fileManager)
    {
        return view(
            'admin.page.fileManager.update' , [
                                                'description' => $fileManager['description'] ,
                                                'slug' => $fileManager['slug'] ,
                                            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileManagerRequest $request , FileManager $fileManager)
    {
        $validate = $request->validated();
        $result = FileManager::where('id' , $fileManager['id'])->update($validate);
        return redirect()->route('file-manager.edit' , $validate['slug'])->withError($validate)->with(['result' => $result]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FileManager $fileManager)
    {
        $deleteResult = $fileManager->delete();
        return redirect()->route('file-manager.index')->with($deleteResult);
    }
}
