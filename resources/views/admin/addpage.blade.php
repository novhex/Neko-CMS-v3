@extends('admin.dashboard_head',['page_title'=>$page_title])
@extends('admin.dashboard_nav')
@section('content')

 <aside class="right-side">
 <section class="content">


<div class="row">

			<form action="{{url('admin/submit-page')}}" method="POST" accept-charset="utf-8" >    
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
			                              <i class="fa fa-book"></i>
			                                 Add Page
			                              </header>
			                          <div class="panel-body">
			                          {{csrf_field()}}
			                              <label>* Page Name</label>
			                              <input value="{{old('page_name')}}" style=" font-size: 25px;" type="text" name="page_name" class="form-control" />
			 							   <label>* Page Description</label>
			 							   <textarea name="page_desc">{{old('page_desc')}}</textarea>
			                                  
			                          </div>
			     </div>

			     <div class="col-md-3">
			     	         <section class="panel">
			                  <header class="panel-heading">
			                       <i class="fa fa-cog"></i>
			                         Page Options
			                  </header>
			                    <div class="panel-body">
			                    <label>* Make page visible after published</label>
			                    <select name="is_published_page" class="form-control">
			                    	<option value="1">Yes</option>
			                    	<option value="0">No</option>
			                    </select>
			                    <label>* Select Parent Page</label>
			                    <select  name="parent_page" class="form-control">
			                    	<option value="0">No Parent</option>
			                    	<?php foreach($pages as $p) :?>
			                    	<option value="{{$p->pageID}}">{{$p->page_name}}</option>	
			                    	<?php endforeach; ?>
			                    </select>
			                    <button style="margin-top: 5px;" class="btn btn-success btn-block"><i class="fa fa-book"></i> Add New Page</button>
			                    </div>
			     </div>
			</form>
      </section>
  </aside>
               

@endsection
