<!doctype html>
<html>
<head>

  <title>@yield('title', "A Developer's Best Friend")</title>
  
  <link rel='stylesheet' type='text/css' href='{{ URL::asset("/styles/master.css"); }}'>
  @yield('head')

</head>

<body>
  @yield('content')

  @yield('body')

</body>

</html>