<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Validator;

use DB;

class AdminController extends Controller
{
    //


    public function __construct(Request $req){

    }

    public function index(Request $req){

        if($req->session()->has('userlogged')==FALSE){

            $page_title = 'Site Administrator Login';

            $css = array
            (
                url('twitterbs/css/bootstrap.min.css'),
                url('font-awesome/css/font-awesome.min.css')
            );

            $javascripts = array
            (
                url('twitterbs/js/jquery-1.10.2.min.js'),
                url('twitterbs/js/bootstrap.min.js'),
                url('twitterbs/js/jquery.ui.shake.js')
            );

            return View('admin.loginpage',compact('page_title','javascripts','css'));

        }else{

            return redirect('admin/dashboard/');

        }

    }

    public function add_page(Request $req){

         if($req->session()->has('userlogged')==TRUE){

            $page_title = 'Admin Dashboard - Add Page';

            $css = array
            (
                url('twitterbs/css/bootstrap.min.css'),
                url('dashboard/css/ionicons.min.css'),
                url('dashboard/css/style.css'),
                url('font-awesome/css/font-awesome.min.css'),
                url('twitterbs/css/dataTables.css')
            );

            $javascripts = array
            (
                url('twitterbs/js/jquery-1.10.2.min.js'),
                url('twitterbs/js/bootstrap.min.js'),
                url('dashboard/js/app.js'),
                url('twitterbs/js/select2.full.min.js'),
                url('twitterbs/js/tinymce.min.js'),
                url('twitterbs/js/tinymce_init.js')
                
                
            );

            $pages = DB::table('pages')->get();

            return View('admin.addpage',compact('page_title','javascripts','css','pages'));

        }else{
            $req->session()->flash('not_logged','Please Login. ');
            return redirect('admin/');
        }

    }

    public function all_post(Request $req){

        if($req->session()->has('userlogged')==TRUE){

            $page_title = 'Admin Dashboard - All Posts';

            $css = array
            (
                url('twitterbs/css/bootstrap.min.css'),
                url('dashboard/css/ionicons.min.css'),
                url('dashboard/css/style.css'),
                url('font-awesome/css/font-awesome.min.css'),
                url('twitterbs/css/dataTables.css')
            );

            $javascripts = array
            (
                url('twitterbs/js/jquery-1.10.2.min.js'),
                url('twitterbs/js/bootstrap.min.js'),
                url('dashboard/js/app.js'),
                url('twitterbs/js/select2.full.min.js'),
                url('twitterbs/js/tinymce.min.js'),
                url('twitterbs/js/dataTables.js'),
                url('twitterbs/js/dtable-init.js')
                
            );

            $posts = DB::table('posts')
            ->join('page_subcategories', 'posts.post_parent_subcategID', '=', 'page_subcategories.page_subcatID')
            ->join('users','posts.post_author','=','users.usrsID')
            ->get();

            return View('admin.allpost',compact('page_title','javascripts','css','posts'));

        }else{
            $req->session()->flash('not_logged','Please Login. ');
            return redirect('admin/');
        }

    }

   public function auth(Request $req){

      $validator = Validator::make($req->all(), [
            'username' => 'required',
            'password'=>'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin')
                ->withInput()
                ->withErrors($validator);
        }else{
        	$username_existence = DB::table('users')
            ->where('usrs_username',$req->input('username'))
            ->value('usrs_username');

        	if($username_existence!=NULL){

        		$userpass = DB::table('users')
                ->where('usrs_username',$req->input('username'))
                ->value('usrs_pw');

        		if(password_verify($req->input('password'),trim($userpass))){

        			$req->session()
                    ->put('userlogged',$req->input('username'));
        			return redirect('admin/dashboard/');

        		}else{
        			$req->session()
                    ->flash('auth_failed','Invalid Username or Password. ');
        			return redirect('admin/');
        		}

        	}
        	else{
        			$req->session()->flash('auth_failed','Invalid Username or Password. ');
        			return redirect('admin/');
        	}
        }

    }

    public function create_post(Request $req){

        if($req->session()->has('userlogged')==TRUE){

            $page_title = 'Admin Dashboard - Create Post';

            $css = array
            (
                url('twitterbs/css/bootstrap.min.css'),
                url('dashboard/css/ionicons.min.css'),
                url('dashboard/css/style.css'),
                url('font-awesome/css/font-awesome.min.css'),
                url('twitterbs/css/select2.min.css'),
                url('twitterbs/css/jquery.tagit.css'),
                url('twitterbs/css/tagit.ui-zendesk.css')
            );

            $javascripts = array
            (
                url('twitterbs/js/jquery-1.10.2.min.js'),
                url('twitterbs/js/bootstrap.min.js'),
                url('dashboard/js/app.js'),
                url('twitterbs/js/select2.full.min.js'),
                url('twitterbs/js/tinymce.min.js'),
                url('twitterbs/js/tinymce_init.js'),
                url('twitterbs/js/jquery-ui.min.js'),
                url('twitterbs/js/tag-it.js'),
                url('twitterbs/js/backend.js')
                
                
            );

            $categories = DB::table('page_subcategories')->get();

            return View('admin.createpost',compact('page_title','javascripts','css','categories'));

        }else{
            $req->session()->flash('not_logged','Please Login. ');
            return redirect('admin/');
        }

    }


     public function dashboard(Request $req){


        if($req->session()->has('userlogged')==TRUE){
            $page_title = 'Admin Dashboard - Home';

            $css = array
            (
                url('twitterbs/css/bootstrap.min.css'),
                url('dashboard/css/ionicons.min.css'),
                url('dashboard/css/style.css'),
                url('font-awesome/css/font-awesome.min.css')
            );

            $javascripts = array
            (
                url('twitterbs/js/jquery-1.10.2.min.js'),
                url('twitterbs/js/bootstrap.min.js'),
                url('dashboard/js/app.js')
                
            );
            return View('admin.dashboard',compact('page_title','css','javascripts'));   
        }else{
            $req->session()->flash('not_logged','Please Login. ');
            return redirect('admin/');
        }
        
    }

    public function edit_post($post_id,Request $req){

         if($req->session()->has('userlogged')==TRUE){

            $page_title = 'Admin Dashboard - Editing Post';

            $css = array
            (
                url('twitterbs/css/bootstrap.min.css'),
                url('dashboard/css/ionicons.min.css'),
                url('dashboard/css/style.css'),
                url('font-awesome/css/font-awesome.min.css'),
                url('twitterbs/css/select2.min.css'),
                url('twitterbs/css/jquery.tagit.css'),
                url('twitterbs/css/tagit.ui-zendesk.css')
            );

            $javascripts = array
            (
                url('twitterbs/js/jquery-1.10.2.min.js'),
                url('twitterbs/js/bootstrap.min.js'),
                url('dashboard/js/app.js'),
                url('twitterbs/js/select2.full.min.js'),
                url('twitterbs/js/tinymce.min.js'),
                url('twitterbs/js/tinymce_init.js'),
                url('twitterbs/js/jquery-ui.min.js'),
                url('twitterbs/js/tag-it.js'),
                url('twitterbs/js/backend.js')
                
                
            );

            $categories = DB::table('page_subcategories')->get();
            $post_to_edit = DB::table('posts')
            ->where('posts.postID',$post_id)
            ->get();

            return View('admin.editpost',compact('page_title','javascripts','css','categories','post_to_edit'));


         }else{
            $req->session()->flash('not_logged','Please Login. ');
            return redirect('admin/');
        }

    }

    public function logout(Request $req){
    
    		$req->session()->forget('userlogged');
    		$req->session()->flush();
   			return redirect('admin/');
    	
    }


    public function submit_page(Request $req){

        $validator = Validator::make($req->all(),[
                'page_name'=>'required|min:5|max:255',
                'page_desc'=>'required|min:10',
                'is_published_page'=>'required',
                'parent_page'=>'required'
            ]);

        if($validator->fails()){
            return redirect('/admin/add-page')
            ->withInput()
            ->withErrors($validator);
        }else{

            if($req->input('parent_page')==0){
                
                DB::table('pages')
                ->insert([
                    'page_name'=>$req->input('page_name'),
                    'page_desc'=>$req->input('page_desc'),
                    'page_slug'=>str_slug($req->input('page_name')).'/',
                    'page_is_visible'=>$req->input('is_published_page'),
                    'date_added'=>date('Y-m-d h:i:s')
                    ]);
                return redirect('/admin/dashboard');
            }else{

                DB::table('page_subcategories')
                ->insert([
                    'page_subcat_name'=>$req->input('page_name'),
                    'page_subcat_slug'=>str_slug($req->input('page_name')),
                    'parent_page'=>$req->input('parent_page'),
                    'date_added'=>date('Y-m-d h:i:s')
                ]);

                return redirect('/admin/dashboard');
            }

        }

    }


    public function submit_post(Request $req){

        $validator = Validator::make($req->all(), [
            'post_title' => 'required|max:255|min:5',
            'post_content'=>'required|min:10',
            'categories'=>'required',
            'is_publish'=>'required'

        ]);

        if ($validator->fails()) {
            return redirect('/admin/create-post')
                ->withInput()
                ->withErrors($validator);
        }else{

        DB::table('posts')
            ->insert( 
                [
                'post_parent_subcategID' => $req->input('categories'), 
                'post_title' =>  $req->input('post_title'),
                'post_content'=> $req->input('post_content'),
                'post_urlslug'=>str_slug($req->input('post_title')),
                'post_author'=>1,
                'date_published'=>date('Y-m-d h:i:s'),
                'publish_status'=>$req->input('is_publish'),
                'tags'=>$req->input('post_tags_hidden_field'),
                'last_modified'=>date('Y-m-d h:i:s')
                ]);

         return redirect('/admin/all-posts');


     }


    }

    public function update_post(Request $req){
        
        $validator = Validator::make($req->all(), [
            'post_title' => 'required|max:255|min:5',
            'post_content'=>'required|min:10',
            'categories'=>'required',
            'is_publish'=>'required'

        ]);

        if ($validator->fails()) {
            return redirect('/admin/edit-post'.'/'.$req->input('post_id'))
                ->withInput()
                ->withErrors($validator);
        }else{

            DB::table('posts')
            ->where('postID',$req->input('post_id'))
            ->update( 
                [
                'post_parent_subcategID' => $req->input('categories'), 
                'post_title' =>  $req->input('post_title'),
                'post_content'=> $req->input('post_content'),
                'post_urlslug'=>str_slug($req->input('post_title')),
                'post_author'=>1,
                'publish_status'=>$req->input('is_publish'),
                'tags'=>$req->input('post_tags_hidden_field'),
                'last_modified'=>date('Y-m-d h:i:s')
                ]);

         return redirect('/admin/all-posts');

        }
        
    }



}
