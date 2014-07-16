<!doctype html>
<html>
<head>

  <title>@yield('title', "A Developer's Best Friend")</title>
  
  <link rel='stylesheet' type='text/css' href='{{ URL::asset("/styles/master.css"); }}'>
  @yield('head')

</head>

<body>
	<div id="container">
	  @yield('content')
	</div>
	
  @yield('body')

</body>

</html>