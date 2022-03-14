<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Catagory;
use Toastr;
use Str;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::latest()->get();
        return view('home',compact('data'));
    }

    public function create()
    {
        $catagories = Catagory::all();
        return view('admin.post.create',compact('catagories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'cat_id' => 'required',
            'image' => 'required',
        ],[
            'body.required' => 'The post description field is required.',
            'cat_id.required' => 'The catagory field is required.',
        ]);
        $imageName =  time().'-'.$request->image->getClientOriginalName();
        $request->image->move(public_path('image'),$imageName);
        Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'author' => 'Hafizur',
            'cat_id' => $request->cat_id,
            'image' => $imageName,
            'status' => $request->status,
        ]);
        Toastr::success('Post created successfully','Success');
         return redirect('post');
    }


    public function show($id)
    {
        $data = Post::find($id);
        return view('admin.post.show',compact('data'));
    }
    
    public function edit($id)
    {
        $catagories = Catagory::all();
        $data = Post::find($id);
        return view('admin.post.edit',compact(['data','catagories']));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ],[
            'body.required' => 'The post description field is required.',
        ]);
        $oldfile = $request->oldimg;
        $check = $request->image;
        if(!$check){
            $newfile = $oldfile;
        }else{
            unlink('image/'.$oldfile);
            $newfile =  time().'-'.$request->image->getClientOriginalName();
            $request->image->move(public_path('image'),$newfile);
        }

        Post::find($id)->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'body' => $request->body,
            'cat_id' => $request->cat_id,
            'image' => $newfile,
            'status' => $request->status,
        ]);
        Toastr::success('Post updated successfully','Success');
        return redirect('post');
    }

    public function destroy($id)
    {

        $post = Post::find($id);
        $image = 'image/'.$post->image;
        if(file_exists($image)){
            unlink($image);
            $post->delete();
        }else{
            $post->delete();
        }
        return redirect('post');

    }
}
