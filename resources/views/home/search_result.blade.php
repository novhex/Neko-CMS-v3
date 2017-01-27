@extends('home.head',['title' => $page_title])
@extends('home.navbar')
@section('content')

<div class="container" style="margin-top: 150px;">
	<div class="row">

	<?php 
		if(sizeof($posts) > 0){
	?>
		<div class="col-md-8">
		<?php foreach($posts as $article): ?>
			<div class="well">
			<h1><a href="<?php echo url('post').'/'.$article->post_urlslug; ?>">{{$article->post_title}}</a></h1>
			<i class="fa fa-calendar"></i><span class="">&nbsp; {{ date('F j , Y',strtotime($article->date_published))}} &nbsp; <i class="fa fa-comment"></i>&nbsp; 31 Comments</span>
			<p style="text-align: justify;">
				{{word_limiter(strip_tags($article->post_content,50))}}
			</p>
			</div>
		<?php endforeach;?>
			
			<div class="text-center">{{ $posts->appends(['q' => $query_string])->links() }}</div>
		</div>

				<div class="col-md-4">
			<div class="well">
				<h2>Search:</h2>
				<form action="{{url('search')}}" accept-charset="utf-8" method="GET">
				<input type="search" name="q" class="form-control" required="true"/>
				<button type="submit" class="btn btn-success" style="margin-top: 10px;"><i class="glyphicon glyphicon-search"></i> Search</button>
				</form>

			</div>

			<div class="well">
				<h2><i class="fa fa-calendar"></i> Archives</h2>
				<?php foreach($archive as $archieve_post):?>
					<li style="list-style-type: none;"><a href="{{url('archives').'/'.$archieve_post->YEAR.'-'.$archieve_post->MONTH}}">{{ date('F Y ',strtotime($archieve_post->YEAR."-".$archieve_post->MONTH))."($archieve_post->TOTAL)" }}</a></li>
				<?php endforeach; ?>
			</div>
			
			</div>
		</div>
	<?php  } else { ?>



	<div class="col-md-8">
		<h1> No results found.</h1>
		<p><a href="{{url('/')}}"> Back to Home</a></p>
	</div>

			<div class="col-md-4">
			<div class="well">
				<h2>Search:</h2>
				<form action="{{url('search')}}" accept-charset="utf-8" method="GET">
				<input type="search" name="q" class="form-control" required="true"/>
				<button type="submit" class="btn btn-success" style="margin-top: 10px;"><i class="glyphicon glyphicon-search"></i> Search</button>
				</form>
			</div>

			<div class="well">
				<h2><i class="fa fa-calendar"></i> Archives</h2>
				<?php foreach($archive as $archieve_post):?>
					<li style="list-style-type: none;"><a href="{{url('archives').'/'.$archieve_post->YEAR.'-'.$archieve_post->MONTH}}">{{ date('F Y ',strtotime($archieve_post->YEAR."-".$archieve_post->MONTH))."($archieve_post->TOTAL)" }}</a></li>
				<?php endforeach; ?>
			</div>
		</div>

	<?php } ?>


	</div>
</div>



@endsection