<?php

namespace App\Http\Controllers\user;
use App\case_study;
use App\property;
use App\type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use App\Download;
use App\Http\Controllers\Controller;
use App\Model\admin\service;
use App\Model\user\category;
use App\Model\user\tag;
use App\banner;
use App\Model\user\post;
use App\offer;
use App\portfolio;
use App\team_member;
use App\testimonials;
use App\User;
use App\settings;
use App\Admin\seo;
use Illuminate\Foundation\Inspiring;


class HomeController extends Controller
{
    //
    public function __construct()
    {
        View::share('logo_light', settings::where('name','logo_light')->first());
        View::share('logo_dark', settings::where('name','logo_dark')->first());
        View::share('favicon', settings::where('name','favicon')->first());
        View::share('email', settings::where('name','email')->first());
        View::share('mobile', settings::where('name','mobile')->first());
        View::share('whatsapp', settings::where('name','whatsapp')->first());
        View::share('facebook', settings::where('name','facebook')->first());
        View::share('linkedin', settings::where('name','linkedin')->first());
        View::share('github', settings::where('name','github')->first());
        View::share('custom_css', settings::where('name','custom_css')->first());
        View::share('address', settings::where('name','address')->first());
        View::share('footer_text', settings::where('name','footer_text')->first());
        View::share('map', settings::where('name','map')->first());
    }


    public function home()
    {
        $seo = seo::where('page','home')->first();

        $services = service::where('status',1)->get();
        $banners = property::where('status',1 AND 'banner',1)->get();
        $featured_properties = property::where('featured',1)->get();
        $types = type::where('status',1)->get();
        $featured_posts = post::join('users','users.id','=','posts.posted_by')->select('posts.*','users.name as name','users.avatar as avatar')->where('posts.status','1' and 'posts.featured','1')->orderBy('posts.created_at','DESC')->take(4)->get();
        return view('user.home',compact('banners','featured_properties','services','seo','types'));
    }

    public function blog()
    {
        $seo = seo::where('page','blog')->first();
        $tags = tag::all();
        $categories = category::all();
        $posts = post::join('users','users.id','=','posts.posted_by')->select('posts.*','users.name as name','users.avatar as avatar')->where('posts.status','1')->orderBy('posts.created_at','DESC')->paginate(6);
        $featured = post::where('featured',1 AND 'status',1)->get();
        return view('user.blog',compact('posts','featured','seo','tags','categories'));
    }

    public function about(){
        $seo = seo::where('page','about')->first();
        $testimonials = testimonials::where('status','1')->get();
        $members = team_member::where('status','1')->get();
        return view('user.about',compact('seo','members','testimonials'));
    }

    public function post(post $post){

        $user_id = $post->posted_by;
        $user = User::where('id',$user_id)->first();
        $tags = tag::all();
        $categories = category::all();
        return view('user.post',compact('post','user','tags','categories'));
    }

    public function service(service $service)
    {
        return view('user.service',compact('service'));
    }

    public function property(property $property)
    {
        $path = "properties/".$property->name."/carousel";
        $images = Storage::disk('public')->files($path);
        //$images = \File::allFiles(public_path("properties/".$property->name."/carousel"));
        $featured = property::where('featured',1)->get();
        return view('user.property',compact('property','images','featured'));
    }

    public function buy(){
        $seo = seo::where('page','Home')->first();
        $properties = property::where('Property_status','For sale')->paginate();
        return view('user.buy',compact('properties','seo'));
    }

    public function rent(){
        $seo = seo::where('page','Home')->first();
        $properties = property::where('Property_status','For rent')->paginate();
        return view('user.rent',compact('properties','seo'));
    }

    public function contact(){
        $seo = seo::where('page','contact')->first();
        return view('user.contact',compact('seo'));
    }

    public function tag(tag $tag)
    {
        $tags = tag::all();
        $categories = category::all();
        $seo = seo::where('page','blog')->first();
        $posts = $tag->posts();
        return view('user.tag',compact('posts','tags','categories','seo','tag'));
    }

    public function category(category $category)
    {
        $tags = tag::all();
        $categories = category::all();
        $posts = $category->posts();
        $seo = seo::where('page','blog')->first();
        return view('user.category',compact('posts','tags','seo','categories','category'));
    }

    public function download(Download $download){
        $seo = seo::where('page','home')->first();
        return view('user.download',compact('download','seo'));
    }

    public function portfolio(){
        $seo = seo::where('page','Portfolio')->first();
        $portfolios = portfolio::where('status',1)->get();
        return view('user.portfolio',compact('portfolios','seo'));
    }

    public function search(Request $request){
        $keywords = $request->keywords;
        $results = post::whereRaw('MATCH (keywords) AGAINST (?)' , $keywords)->paginate(6);
        return view('user.search',compact('results','keywords'));
    }

    public function csd(case_study $case_study)
    {
        return view('user.case_study',compact('case_study'));
    }

    public function error_404(){
        return view('user.404');
    }

}
