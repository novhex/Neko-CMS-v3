<!DOCTYPE html>
<html>
<head>
<?php foreach($css as $stylesheets){?>

<link rel="stylesheet" type="text/css" href="{{$stylesheets}}">
<?php }?>
	<title>{{$page_title}}</title>
</head>
<body class="skin-black">
	@yield('navbar')
	@yield('content')

    <?php foreach($javascripts as $js){?>
    <script type="text/javascript" src="{{$js}}"></script>
    <?php }?>

              <!-- row end -->
                </section><!-- /.content -->

            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


</body>
</html>