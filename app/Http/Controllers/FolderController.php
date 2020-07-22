<?php

namespace App\Http\Controllers;

use App\Folder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function showCreateForm()
    
        {
            return view('folders/create');
        }
    
    public function create(CreateFolder $request)
    
        {
            $login_user = Auth::user();  

            $folder = new Folder();
            
            $folder->user_id = $login_user;
            $folder->title = $request->title;
            $folder->updated_at = Carbon::now();
            $folder->created_at = Carbon::now();
            $folder->save();


            Auth::user()->folders()->save($folder);

            return redirect()->route('tasks.index', [ 'id' => $folder->id,]);
        }      
}
