@section('navbar')
<nav class="navbar navbar-default navbar-static-top" id="topPage">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{url('/')}}">
           {{$site_name}}
          </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <?php foreach($pages as $main_pages) :?>



              <li class="dropdown">
                <a href="{{url('/').'/page/'.$main_pages->page_slug}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $main_pages->page_name}}&nbsp;<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                   <?php
                    //begin foreach
                    foreach(get_page_subcat($main_pages->pageID) as $subcategories){
                    ?>
                    <?php if($subcategories->page_subcat_name !== ''){ ?>
                        <li><a href="{{url('category').'/'.$subcategories->page_subcat_slug}}">{{$subcategories->page_subcat_name}}</a></li>
                    <?php }?>

                   <?php } //end get_page_subcat foreach ?>

                  </ul>
              </li>


          <?php endforeach; ?>
               
          </ul>
       
        </div><!--/.nav-collapse -->
      </div>
    </nav>
@endsection