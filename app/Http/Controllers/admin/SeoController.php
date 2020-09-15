<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\seo;
use Illuminate\Support\Facades\Auth;

class SeoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $seos = seo::all();
        return view('admin.seo.show',compact('seos'));
    }

    public function create()
    {
        if(Auth::user()->can('pages.create')) {
            return view('admin.seo.create');
        }

        $message = "create page settings";
        return view('admin.unauthorised',compact('message'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[

            'page' => 'required|unique:seos',
            'page_title' => 'required',
            'author' => 'required',
            'title' => 'required',
            'description' => 'required',
            'keywords'=>'required',
            'language'=>'required',
            'revisit_after'=>'required',
        ]);

        $seo = new seo();
        $seo->page = $request->page;
        $seo->page_title = $request->page_title;
        $seo->author = $request->author;
        $seo->title = $request->title;
        $seo->description = $request->description;
        $seo->keywords = $request->keywords;
        $seo->language = $request->language;
        $seo->css = $request->css;
        $seo->revisit_after = $request->revisit_after;

        $seo->save();
        return redirect()->back()->with('success','Settings saved successfully');
    }


    public function edit($id)
    {
        if(Auth::user()->can('pages.update')) {
            $seo = seo::where('id', $id)->first();
            return view('admin.seo.edit', compact('seo'));
        }

        $message = "edit page settings";
        return view('admin.unauthorised',compact('message'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'page' => 'required',
            'page_title' => 'required',
            'author' => 'required',
            'title' => 'required',
            'description' => 'required',
            'keywords'=>'required',
            'language'=>'required',
            'revisit_after'=>'required',
        ]);

        $seo = seo::find($id);
        $seo->page = $request->page;
        $seo->page_title = $request->page_title;
        $seo->author = $request->author;
        $seo->title = $request->title;
        $seo->description = $request->description;
        $seo->keywords = $request->keywords;
        $seo->language = $request->language;
        $seo->css = $request->css;
        $seo->revisit_after = $request->revisit_after;

        $seo->save();
        return redirect()->back()->with('success','Settings updated successfully');
    }

    public function destroy($id)
    {
        if(Auth::user()->can('pages.delete')) {
            seo::where('id',$id)->delete();
            return redirect()->back()->with('success','SEO fields deleted successfully');
        }

        $message = "delete page settings";
        return view('admin.unauthorised',compact('message'));

    }
}
