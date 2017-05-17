@extends('admin.dashboard_head',['page_title'=>$page_title])
@extends('admin.dashboard_nav')
@section('content')

 <aside class="right-side">
 <section class="content">
<div class="row">
<form class="form-horizontal tasi-form" method="POST" accept-charset="utf-8" action="{{url('admin/submit-post')}}">
                        <div class="col-md-9">
   @if (count($errors) > 0)
   <div class="alert alert-danger">
   <strong style="color:red;"><i class="fa fa-exclamation-triangle"></i>&nbsp; 	Please check the following errors</strong>
     @foreach ($errors->all() as $error)
                <p style="color:red;">* {{ $error }}</p>
    @endforeach
    </div>
@endif
         <section class="panel panel-primary">
                      <header class="panel-heading">
                              <i class="fa fa-pencil"></i>
                                 Create a Post
                              </header>
                              <div class="panel-body">
                              
                                     

                                  	{{csrf_field()}}
                                  		<label>* Enter Post Title</label>
                                              <input style=" font-size: 25px;" value="{{old('post_title')}}" type="text" class="form-control" name="post_title"/>
                                  		<br>
                                      <textarea cols="108" rows="20" name="post_content">{{old('post_content')}}</textarea>
                                      <br>
 
                                  
                              </div>

               </div>
               <div class="col-md-3">
               		         <section class="panel panel-primary">
                              <header class="panel-heading">
                              <i class="fa fa-cog"></i>
                                 Options
                              </header>
                              <div class="panel-body">

                                 <label>* Post it under </label>

                                    <select class="form-control" name="categories">
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

                                     <button style="margin-top: 10px;" type="submit" class="btn btn-success btn-block" name="btn_submit"><i class="fa fa-paper-plane-o"></i> Publish Post </button>
                                     
                              </div>
              		 			</div>

                        <div class="col-md-3">
                          <section class="panel panel-primary">
                              <header class="panel-heading">
                              <i class="fa fa-tag"></i>
                                Post Tags
                              </header>
                              <div class="panel-body">
                                <ul id="myTags"></ul>
                                <input type="text" style="display: none;" id="single_field_node" value="{{old('post_tags_hidden_field')}}" name="post_tags_hidden_field"/>
                              </div>
                        </div>

               				</section>
               		</aside>
               </form>

@endsection