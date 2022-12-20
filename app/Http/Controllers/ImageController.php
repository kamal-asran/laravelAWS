<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //
    public function upload()
    {
        return view('upload');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $extension  = request()->file('image')->getClientOriginalExtension(); 
            $image_name = time() .'_' . $request->title . '.' . $extension;
            $path = $request->file('image')->storeAs(
                'images',
                $image_name,
                's3'
            );
            Image::create([
                'title'=>$request->title,
                'image'=>$path
            ]);

            $imageURL=Storage::disk('s3')->url($path);

            return redirect()->back()->with([
                'message'=> "Image uploaded successfully",'imageURL'=>$imageURL
            ]);
        }
    }

}
