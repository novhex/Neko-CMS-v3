@extends('admin.dashboard_head',['page_title'=>$page_title])
@extends('admin.dashboard_nav')
@section('content')

 <aside class="right-side">
 <section class="content">


	<div class="row">

				<form action="{{url('admin/submit-subpage')}}" method="POST" accept-charset="utf-8" >    
				    <div class="col-md-12">

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
			                              <i class="fa fa-book"></i>
			                                 Add Subcategory Page 
			                              </header>
			                      <div class="panel-body">
			                          {{csrf_field()}}
			                              <label>* Subcategory Page Name</label>
			                              <input value="{{old('page_name')}}" style=" font-size: 25px;" type="text" name="page_name" class="form-control" />

					                    <label>* Select Parent Page</label>
					                    <select  name="parent_page" class="form-control">
					                    	<option value="0">No Parent Page </option>
					                    	<?php foreach($pages as $p) :?>
					                    	<option value="{{$p->pageID}}">{{$p->page_name}}</option>	
					                    	<?php endforeach; ?>
					                    </select>


			               					<button style="margin-top: 10px;" class="btn btn-success"><i class="fa fa-book"></i> Add Subcategory Page</button>



			                                  
			                         </div>



				     </div>

				</form>
      		</section>


  </aside>
               

@endsection
