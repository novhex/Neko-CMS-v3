<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Http\Requests;

use DB;

use Validator;

class HomeController extends Controller{
    //

    public function index(){

        $pages = DB::table('pages')->get();
    	$posts = DB::table('posts')
        ->where('publish_status',1)
        ->orderBy('date_published', 'desc')
        ->limit(5)
        ->get();

    	$stylesheets = array
        (
            url('twitterbs/css/bootstrap.min.css'),
            url('font-awesome/css/font-awesome.min.css'),
            url('twitterbs/css/jquery.tagit.css'),
            url('twitterbs/css/tagit.ui-zendesk.css')
        );

    	$javascripts = array
        (
            url('twitterbs/js/jquery-1.10.2.min.js'),
            url('twitterbs/js/bootstrap.min.js'),
            url('twitterbs/js/jquery-ui.min.js'),
            url('twitterbs/js/tag-it.js'),
            url('twitterbs/js/custom_js.js'),
            url('twitterbs/js/bootbox.js')
        );

    	$page_title =  "Home &ndash; ".DB::table('site_config')
        ->where('config_name', 'site_name')
        ->first()
        ->config_value;

        $site_name = DB::table('site_config')
        ->where('config_name', 'site_name')
        ->first()
        ->config_value;

        $archive = DB::select(DB::raw("SELECT YEAR(date_published) as YEAR , MONTH(date_published)as MONTH,COUNT(*)as TOTAL FROM posts GROUP BY YEAR,MONTH"));
       

    	return View('home.home',compact('posts','page_title','stylesheets','javascripts','pages','site_name','archive'));
  
    }

    public function category($subcat_name,Request $req){

        $pages = DB::table('pages')->get();
        
        $posts = DB::table('posts')
        ->where('post_parent_subcategID',DB::table('page_subcategories')
        ->select('page_subcatID')
        ->where('page_subcat_slug', $subcat_name)
        ->value('page_subcatID'))
        ->where('publish_status',1)
        ->paginate(10);

        $stylesheets = array
        (
            url('twitterbs/css/bootstrap.min.css'),
            url('font-awesome/css/font-awesome.min.css')
        );

        $javascripts = array
        (
            url('twitterbs/js/jquery-1.10.2.min.js'),
            url('twitterbs/js/bootstrap.min.js'),
            url('twitterbs/js/custom_js.js')
        );

        $page_title =  "Category &ndash; ".DB::table('site_config')
        ->where('config_name', 'site_name')
        ->first()
        ->config_value;

        $site_name = DB::table('site_config')
        ->where('config_name', 'site_name')
        ->first()
        ->config_value;

        $archive = DB::select(DB::raw("SELECT YEAR(date_published) as YEAR , MONTH(date_published)as MONTH,COUNT(*)as TOTAL FROM posts GROUP BY YEAR,MONTH"));

        return View('home.category',compact('posts','page_title','stylesheets','javascripts','pages','site_name','archive'));

    }


    public function page($page_name,Request $req){


        $pages = DB::table('pages')->get();

        $stylesheets = array
        (
            url('twitterbs/css/bootstrap.min.css'),
            url('font-awesome/css/font-awesome.min.css')
        );

        $javascripts = array
        (
            url('twitterbs/js/jquery-1.10.2.min.js'),
            url('twitterbs/js/bootstrap.min.js'),
            url('twitterbs/js/custom_js.js')
        );

        $current_page_name = DB::table('pages')
        ->where('page_slug',$page_name)
        ->get()
        ->first()
        ->page_name;


        $page_title =  $current_page_name." &ndash;  ".DB::table('site_config')
        ->where('config_name', 'site_name')
        ->first()
        ->config_value;

        $site_name = DB::table('site_config')
        ->where('config_name', 'site_name')
        ->first()
        ->config_value;


        $current_pageinfo = DB::table('pages')
        ->where('page_slug',$page_name)
        ->get();


        $archive = DB::select(DB::raw("SELECT YEAR(date_published) as YEAR , MONTH(date_published)as MONTH,COUNT(*)as TOTAL FROM posts GROUP BY YEAR,MONTH"));


        return View('home.pageinfo',compact('current_pageinfo','page_title','stylesheets','javascripts','pages','site_name','archive'));



    }


    public function post($article_slug,Request $req){

        $pages = DB::table('pages')->get();

    	$page_title = DB::table('posts')
        ->where('post_urlslug',$article_slug)
        ->value('post_title')." &ndash; ". DB::table('site_config')
        ->where('config_name', 'site_name')
        ->first()
        ->config_value;

        $site_name = DB::table('site_config')
        ->where('config_name', 'site_name')
        ->first()
        ->config_value;

    	$stylesheets = array
        (
            url('twitterbs/css/bootstrap.min.css'),
            url('font-awesome/css/font-awesome.min.css')
        );

        $javascripts = array
        (
            url('twitterbs/js/jquery-1.10.2.min.js'),
            url('twitterbs/js/bootstrap.min.js'),
            url('twitterbs/js/custom_js.js')
        );
        
    	$full_article = DB::table('posts')
        ->where('post_urlslug',$article_slug)
        ->get();

        $archive = DB::select(DB::raw("SELECT YEAR(date_published) as YEAR , MONTH(date_published)as MONTH,COUNT(*)as TOTAL FROM posts GROUP BY YEAR,MONTH"));
    	
 		return View('home.articleview',compact('page_title','stylesheets','javascripts','full_article','pages','site_name','archive'));
    }


    public function search(Request $req){



        $stylesheets = array
        (
            url('twitterbs/css/bootstrap.min.css'),
            url('font-awesome/css/font-awesome.min.css')

        );
        

        $javascripts = array
        (
            url('twitterbs/js/jquery-1.10.2.min.js'),
            url('twitterbs/js/bootstrap.min.js'),
            url('twitterbs/js/custom_js.js')
        );

        $query_string = $req->input('q');
        $pages = DB::table('pages')->get();

        $posts = DB::table('posts')
        ->where('post_title', 'like', '%'.$req->input('q').'%')
        ->paginate(5);

        $page_title =  "Search Result &ndash; ".DB::table('site_config')
        ->where('config_name', 'site_name')
        ->first()
        ->config_value;

        $site_name = DB::table('site_config')
        ->where('config_name', 'site_name')
        ->first()
        ->config_value;

        $archive = DB::select(DB::raw("SELECT YEAR(date_published) as YEAR , MONTH(date_published)as MONTH,COUNT(*)as TOTAL FROM posts GROUP BY YEAR,MONTH"));

        return View('home.search_result',compact('posts','page_title','stylesheets','javascripts','query_string','pages','site_name','archive'));
    }


}
