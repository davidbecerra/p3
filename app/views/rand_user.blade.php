@extends('_master')

@section('content')
	<a href="/">Home</a>
	<form method="GET" action="">
		Number of Users: <input type="text" name="users" required> (Max 9)<br>
		<input type="submit" value="Submit">
	</form>
	<?php echo $user_data; ?>
@stop