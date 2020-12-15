<?php

namespace App\Http\Controllers\admin;

use App\feature;
use App\Http\Controllers\Controller;
use App\property;
use App\type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $properties = property::all();
        return view('admin.property.show',compact('properties'));
    }

    public function create()
    {
        $types = type::all();
        $features = feature::all();
        return view('admin.property.create',compact('types','features'));
    }

    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name' => 'required|unique:properties',
            'location' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'banner_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            'description'=>'required',
            'video'=> 'mimes:mp4,mov,ogg,qt | max:20000',

        ]);

        $property = new property();
        $property->name = $request->name;
        $property->slug = Str::slug($request->name);
        $property->location = $request->location;
        $property->price = $request->price;
        $property->deposit = $request->deposit;
        $property->size = $request->size;
        $property->date_built = $request->date_built;
        $property->garage = $request->garage;
        $property->bedroom = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->description = $request->description;
        $property->keywords = $request->name .' '. $request->location .' '. strip_tags(trim($request->description));

        //make directory for media
        $directory = 'public/properties/'.$request->name;
        Storage::makeDirectory($directory);
        if($request->hasFile('image'))
        {
            $property->image = $request->image->store($directory);
        }

        if($request->hasFile('video'))
        {
            $property->video = $request->video->store($directory);
        }

        $property->meta_title = $request->meta_title;
        $property->meta_description = $request->meta_description;
        $property->meta_keywords = $request->meta_keywords;

        $property->banner = $request->banner;
        if($request->hasFile('banner_image'))
        {
            $property->banner_image = $request->banner_image->store($directory);
        }

        $property->Property_status = $request->property_status;
        $property->featured = $request->featured;
        $property->status = $request->status;
        $property->save();
        $property->types()->sync($request->types);
        $property->features()->sync($request->features);



        $carousel_images = $request->file('carousel');
        if($request->hasFile('carousel'))
        {
            foreach ($carousel_images as $carousel_image) {
                $carousel_image->store($directory . '/carousel');
            }
        }

        return redirect()->back()->with('success',"Property added successfully");

    }

    public function edit($id)
    {
        $property = property::where('id', $id)->first();
        $types = type::all();
        $features = feature::all();
        return view('admin.property.edit', compact('property','types','features'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //

        $property = property::find($id);
        $directory = 'public/properties/'.$property->name;
        property::where('id',$id)->delete();
        Storage::deleteDirectory($directory);
        return redirect()->back()->with('success','property deleted successfully');
    }

}
