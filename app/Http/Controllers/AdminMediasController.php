<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\Session;


class AdminMediasController extends Controller
{
    //

    public function index()
    {
    	$photos = Photo::all();
    	return view('admin.media.index',compact('photos'));
    }

    public function create()
    {
    	return view('admin.media.create');
    }


    public function store(Request $resquest)
    {
    	$file = $resquest->file('file');
    	
    	$name = $file->getClientOriginalName();
    	
    	$file->move('images',$name);

    	Photo::create(['file' => $name]);

    	return redirect('/admin/media');
    }

    public function destroy($id)
    {
    	$photo = Photo::findOrFail($id);
    	unlink(public_path().$photo->file);
    	$photo->delete();
    	Session::flash('photo_deleted','Photo has been deleted succesfully');
		return redirect('/admin/media');    	
    }

    public function deleteMedia(Request $request)
    {    

       if(isset($request->delete_single)){        
          $photoId = array_search('Delete', $request->delete_single);
          $this->destroy($photoId);
          return redirect()->back();
        }
        else if(isset($request->delete_all))
        {
                        
            $photos = Photo::findOrFail($request->checkboxArray);        
            foreach ($photos as $key) {
                $key->delete();
            }

        }
        return redirect()->back();
    }
}
