<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Dashboard</title>

    @include('partials.dashboardheader')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    @include('partials.navbar')

    @include('partials.sidebar')

    @yield('content')



    @include('partials.dashboardscript')
</body>

</html>