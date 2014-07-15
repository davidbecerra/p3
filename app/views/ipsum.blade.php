@extends('_master')

@section('content')

	<a href="/">Home</a>
	<form method="GET" action="{{ url('/lorem-ipsum') }}">
		Number of paragraphs: <input type="text" name='paragraphs' required> (Max 99)
			<input type="submit" value="Submit"><br>
	</form>
	<?php echo $output; ?>
@stop