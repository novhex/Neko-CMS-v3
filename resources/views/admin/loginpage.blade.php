<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php foreach($css as $stylesheets){?>

<link rel="stylesheet" type="text/css" href="{{$stylesheets}}">
<?php }?>
	<title>{{$page_title}}</title>

</head>
<body>

<div class="container" style="margin-top: 100px;">
	<div class="row">
		<div class="col-md-4 col-md-push-4">
			
			<div class="text-center"><i class="fa fa-paw fa-5x"></i> <h1>NekoVel</h1></div>

			@if (count($errors) > 0)
			    <div class="alert alert-warning">
			     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			     @foreach ($errors->all() as $error)
			            <p style="color:white;">* {{ $error }}</p>

			    @endforeach
			    </div>
			@endif


			@if(Session::has('not_logged'))
				 <div class="alert alert-warning">
			     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			     <p style="color:white;">{{session('not_logged')}}</p>
			     </div>
			@endif

			@if(Session::has('auth_failed'))
				 <div class="alert alert-warning">
			     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			     <p style="color:white;">{{session('auth_failed')}}</p>
			     </div>
			@endif


			<div class="well">


				<form action="{{url('admin/auth')}}" method="POST" accept-charset="utf-8">
				{{csrf_field()}}
				<label><i class="fa fa-user"></i> Username:</label>
					<input type="text" name="username"  class="form-control" style="font-size: 20px; font-weight: bold; text-align: center;" />
				<label><i class="fa fa-key"></i> Password:</label>
					<input type="password" name="password" class="form-control" style="font-size: 20px; font-weight: bold; text-align: center;	"/>
				<button class="btn btn-info" style="margin-top: 10px;"><span class="fa fa-lock"></span> Login</button>
				</form>
			</div>
			<div class="text-center">&copy; NekoCMS Software Foundation {{date('Y')}}</div>
			<div class="text-center">Powered by <a href="https://laravel.com/">Laravel 5.3</a> | Return to <a href="{{url('/')}}">Front Page</a></div>
		</div>
	</div>
</div>


<?php foreach($javascripts as $jscripts){?>
<script type="text/javascript" src="{{$jscripts}}"></script>
<?php }?>

@if (count($errors) > 0 || Session::has('auth_failed') || Session::has('not_logged'))
	<script type="text/javascript">
		$('.well').shake();
	</script>
@endif
</body>
</html>