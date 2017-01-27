<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title }}</title>

    <!-- Styles -->
    <link href="<?php echo url('twitterbs/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo url('twitterbs/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo url('dashboard/css/ionicons.min.css');?>" rel="stylesheet">
    <link href="<?php echo url('dashboard/css/style.css');?>" rel="stylesheet">
    <link href="<?php echo url('font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
