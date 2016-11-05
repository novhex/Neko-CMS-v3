@extends('home.head',['title' => $page_title])
@extends('home.navbar')
@section('content')

<div class="container" style="margin-top: 70px;">
<div class="row">
	<div class="col-md-12">
		<?php foreach($full_article as $content): ?>
			<h1>{{$content->post_title}}</h1>
			<hr>
			<p style="text-align: justify-all;"><?php echo $content->post_content; ?></p>
		<?php endforeach;?>
	</div>
</div>
</div>

@endsection