@extends('admin.dashboard_head',['page_title'=>$page_title])
@extends('admin.dashboard_nav')
@section('content')


<?php

$post_id = NULL;
$post_title = NULL;
$post_content = NULL;
$post_tags = NULL;
$post_category  = NULL;

foreach($post_to_edit as $p){

  $post_id = $p->postID;
  $post_title = $p->post_title;
  $post_content = $p->post_content;
  $post_tags = $p->tags;
  $post_category  = $p->post_parent_subcategID;

}

?>

 <aside class="right-side">
 <section class="content">
<div class="row">
<form class="form-horizontal tasi-form" method="POST" accept-charset="utf-8" action="{{url('admin/update-post')}}">
                        <div class="col-md-9">
   @if (count($errors) > 0)
   <div class="alert alert-danger">
   <strong style="color:red;"><i class="fa fa-exclamation-triangle"></i>&nbsp; 	Please check the following errors</strong>
     @foreach ($errors->all() as $error)
                <p style="color:red;">* {{ $error }}</p>
    @endforeach
    </div>
@endif
         <section class="panel">
                      <header class="panel-heading">
                              <i class="fa fa-edit"></i>
                                 Editing A Post
                              </header>
                              <div class="panel-body">
                              
                  
                                  	{{csrf_field()}}

                                      <input type="hidden" name="post_id" value="{{$post_id}}" />

                                  		<label>* Enter New Post Title</label>
                                              <input style=" font-size: 25px;" value="{{$post_title}}" type="text" class="form-control" name="post_title"/>
                                  		<br>
                                      <textarea cols="108" rows="20" name="post_content">{{$post_content}}</textarea>
                                      <br>
 
                                  
                              </div>

               </div>
               <div class="col-md-3">
               		         <section class="panel">
                              <header class="panel-heading">
                              <i class="fa fa-cog"></i>
                                 Options
                              </header>
                              <div class="panel-body">

                                 <label>* Post it under </label>
                                 <input type="hidden" name="categories" id="categories" value="{{$post_category}}" />
                                    <select class="form-control" name="categories_combo" id="categories_combo">
                                         <option value="">Please Select Category</option>
                                           <?php foreach($categories as $cat): ?>
                                            <option value="{{$cat->page_subcatID}}">{{$cat->page_subcat_name}}</option>
                                            <?php endforeach; ?>
                                   </select>

                              <label>* Make it visible after published</label>

                              <select name="is_publish" class="form-control">
	                              	<option value="1">Yes</option>
	                              	<option value="0">No</option>
                              </select>

                                     <button style="margin-top: 5px;" type="submit" class="btn btn-success btn-block" name="btn_submit"><i class="fa fa-edit"></i> Update Post</button>
                                     
                              </div>
              		 			</div>

                        <div class="col-md-3">
                          <section class="panel">
                              <header class="panel-heading">
                              <i class="fa fa-tag"></i>
                                Post Tags
                              </header>
                              <div class="panel-body">
                                <ul id="myTags"></ul>
                                <input type="text" style="display: none;" id="single_field_node" value="{{$post_tags}}" name="post_tags_hidden_field"/>
                              </div>
                        </div>

               				</section>
               		</aside>
               </form>

@endsection