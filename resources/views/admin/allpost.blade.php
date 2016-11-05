@extends('admin.dashboard_head',['page_title'=>$page_title])
@extends('admin.dashboard_nav')
@section('content')

 <aside class="right-side">
 <section class="content">
<div class="row">

    
    <div class="col-md-12">

         <section class="panel">
                      <header class="panel-heading">
                              <i class="fa fa-eye"></i>
                                 All Posts
                              </header>
                              <div class="panel-body">
                              
                                  <div class="table-responsive">
                                    <table id="tbl_posts">
                                      <thead>
                                          <tr>
                                              <th>Post ID </th>
                                              <th> Post Title</th>
                                              <th> Author </th>
                                              <th> Category </th>
                                              <th> Date Posted</th>
                                              <th> Last Edited </th>
                                              <th> Actions </th>

                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php foreach($posts as $p):?>
                                          <tr>
                                              <td>{{$p->postID}}</td>
                                              <td>{{$p->post_title}}</td>
                                              <td>{{$p->usrs_username}}</td>
                                              <td>{{$p->page_subcat_name}}</td>
                                              <td>{{ date('F  j, Y - h:i:s:a',strtotime($p->date_published)) }}</td>
                                              <td>{{ $p->last_modified == '0000-00-00 00:00:00' ? 'No edit history yet' : date('F  j, Y - h:i:s:a',strtotime($p->last_modified)) }}</td>
                                              <td>
                                              <a href="{{url('admin/edit-post').'/'.$p->postID}}" title="Edit Post" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                              <a href="" title="Delete Post" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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