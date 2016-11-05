@extends('home.head',['title' => $page_title])
@extends('home.navbar')
@section('content')

<div class="container" style="margin-top: 150px;">
	<div class="row">
	<div class="col-md-8">
	<div class="well">
			<?php 

	foreach($current_pageinfo as $p): ?>
		<h1><i class="fa fa-thumb-tack fa-1x"></i> <?php echo $p->page_name; ?></h1>
		<span><i class="fa fa-calendar"></i> Page Added : {{ date('F  j, Y  @ h:i:s a',strtotime($p->date_added)) }}</span>
		<p style="margin-top: 5px;">{{$p->page_desc}}</p>
	<?php endforeach; ?>
		
	</div>
	</div>



		<div class="col-md-4">
			<div class="well">
				<h2>Search:</h2>
				<form action="{{url('search')}}" accept-charset="utf-8" method="GET">
				<input type="search" name="q" class="form-control" required="true"/>
				<button type="submit" class="btn btn-success" style="margin-top: 10px;"><i class="glyphicon glyphicon-search"></i> Search</button>
				</form>
			</div>
		</div>
		<div class="col-md-4">
			<div class="well">
				<h2><i class="fa fa-calendar"></i> Archives</h2>
				<?php foreach($archive as $archieve_post):?>
					<li style="list-style-type: none;"><a href="{{url('archives').'/'.$archieve_post->YEAR.'-'.$archieve_post->MONTH}}">{{ date('F Y ',strtotime($archieve_post->YEAR."-".$archieve_post->MONTH))."($archieve_post->TOTAL)" }}</a></li>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>



@endsection