<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php foreach($stylesheets as $css){?>
        	<link rel="stylesheet" type="text/css" href="{{$css}}">
        <?php }?>

	<title>{{$title}}</title>
</head>
<body>
<style type="text/css">
  /* Sticky footer styles
-------------------------------------------------- */
html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 60px;
}
footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 50px;
  background-color: #000000;
}



</style>

	@yield('navbar')
	@yield('content')


	<?php foreach($javascripts as $js){?>
	<script type="text/javascript" src="{{$js}}"></script>
	<?php }?>



    <footer class="footer text-center">
        <div class="container">
            <small style="color:white;">© Copyright {{date('Y')}}. Crafted with love by <a href="https://www.twitter.com/novhz94">@novhz94</a></small>
        </div>
    </footer>

	</body>
</html>