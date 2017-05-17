@extends('admin.dashboard_head',['page_title'=>$page_title])
@extends('admin.dashboard_nav')
@section('content')

<aside class="right-side">
 <section class="content">
<div class="row">

    
    <div class="col-md-12">

         <section class="panel panel-primary">
                      <header class="panel-heading">
                              <i class="fa fa-eye"></i>
                                 All Pages
                              </header>
                              <div class="panel-body">
                              
                                  <div class="table-responsive">
                                    <table id="tbl_posts">
                                      <thead>
                                          <tr>
                                              <th> </th>
                                              <th> Page Name</th>
                                              <th> Page Slug </th>
                                              <th> Visibility </th>
                                              
                                              <th> Actions </th>

                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php foreach($pages as $p):?>
                                          <tr>
                                              <td>{{$p->pageID}}</td>
                                              <td>{{$p->page_name}}</td>
                                              <td>{{$p->page_slug}}</td>
                                              <td>{{$p->page_is_visible}}</td>
                                              
                                              
                                              <td>
                                              <a href="{{url('admin/edit-page').'/'.$p->pageID}}" title="Edit Page Details" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                              <a href="" title="Delete Page" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                              </td>
                                          </tr>
                                        <?php endforeach; ?>
                                      </tbody>
                                    </table>
                                  </div>
 
                                  
                              </div>

               </div>
               				</section>
               		</aside>
               


@endsection