<?php

namespace App\Http\Controllers\user;
use App\case_study;
use Illuminate\Http\Request;
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
        $offer = offer::where('status','1')->first();
        $quote = Inspiring::quote();
        $banners = banner::where('status',1)->get();
        $services = service::where('status',1)->get();
        $case_studies = case_study::where('status',1)->get();
        $latest = post::join('users','users.id','=','posts.posted_by')->select('posts.*','users.name as name')->where('posts.status','1')->orderBy('posts.created_at','DESC')->take(3)->get();
        $featured = post::join('users','users.id','=','posts.posted_by')->select('posts.*','users.name as name','users.avatar as avatar')->where('posts.status','1' and 'posts.featured','1')->orderBy('posts.created_at','DESC')->take(4)->get();
        return view('user.home',compact('banners','quote','featured','offer','services','case_studies','seo'));
    }

    public function blog()
    {
        $seo = seo::where('page','blog')->first();
        $tags = tag::all();
        $categories = category::all();
        $posts = post::join('users','users.id','=','posts.posted_by')->select('posts.*','users.name as name')->where('posts.status','1')->orderBy('posts.created_at','DESC')->paginate(8);
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
        return view('user.post',compact('post','user'));
    }

    public function service(service $service)
    {
        return view('user.service',compact('service'));
    }

    public function offer(offer $offer)
    {
        return view('user.offer',compact('offer'));
    }

    public function offers(){
        $seo = seo::where('page','offers')->first();
        $offers = offer::all();
        return view('user.offers',compact('offers','seo'));
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
