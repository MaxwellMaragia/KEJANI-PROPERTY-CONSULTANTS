<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        //
        $types = type::all();
        return view('admin.type.show',compact('types'));
    }

    public function create()
    {
        return view('admin.type.create');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'icon' => 'required',
            'name'=>'required|unique:types',
        ]);

        $type = new type();
        $type->name = $request->name;
        $type->slug = Str::slug($request->name);
        $type->icon = $request->icon;
        $type->status = $request->status;

        if($request->hasFile('image'))
        {

            $type->image = $request->image->store('public/files/types');
        }

        $type->save();
        return redirect()->back()->with('success','Property type created successfully');
    }

    public function edit($id)
    {
        $type = type::where('id',$id)->first();
        return view('admin.type.edit',compact('type'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'icon' => 'required',
            'name'=>'required',
        ]);

        $type = type::find($id);
        $type->name = $request->name;
        $type->slug = Str::slug($request->name);
        $type->icon = $request->icon;
        $type->status = $request->status;

        if($request->hasFile('image'))
        {

            //delete old type first
            if(file_exists($type->image))
            {
                unlink($type->image);
            }
            $type->image = $request->image->store('public/files/types');
        }

        $type->save();
        return redirect()->back()->with('success','type updated successfully');
    }


    public function destroy($id)
    {
        $type = type::find($id);
        $current_image = 'storage/files/types/'.substr($type->image,19);

        //delete old type first
        if(file_exists($current_image))
        {
            unlink($current_image);
        }
        type::where('id',$id)->delete();
        return redirect()->back()->with('success','type deleted successfully');
    }
}
