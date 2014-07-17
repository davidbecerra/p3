@extends('_master')

@section('title')
	Lorem Ipsum Generator
@stop


@section('content')

	<div id='centered'>
		<a href="/">Home</a>
		<form method="GET" action="{{ url('/lorem-ipsum') }}">
			Number of paragraphs: <input type="text" name='paragraphs' required> (Max 99)<br>
				<input type="submit" value="Submit"><br>
		</form>
	</div>

	<div id="lorem_output">
		<?php echo $output; ?>
	</div>
@stop