<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use Toastr;
use Str;

class CatagoryController extends Controller
{
    public function index()
    {
        $data = Catagory::latest()->get();
        return view('admin.catagory.index',compact('data'));
    }

    public function create()
    {
        return view('admin.catagory.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cat_name' => 'required',
        ]);
         Catagory::create([
            'cat_name' => $request->cat_name,
            'slug'=> Str::slug($request->cat_name)
         ],[
             'cat_name.required' => 'The catagory name field is required.'
         ]
        );
         Toastr::success('Catagory created successfully', 'Success');
         return redirect('catagory');
    }


    public function show($id)
    {
        $data = Catagory::find($id);
        return view('admin.catagory.show',compact('data'));
    }
    
    public function edit($id)
    {
        $data = Catagory::find($id);
        return view('admin.catagory.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        Catagory::find($id)->update([
            'cat_name'=>$request->cat_name,
            'slug'=> Str::slug($request->cat_name)
        ]);
        Toastr::success('Catagory updated successfully','Success');
        return redirect('catagory');
    }

    public function destroy($id)
    {
        Catagory::destroy($id);
        return redirect('catagory');
    }
}
