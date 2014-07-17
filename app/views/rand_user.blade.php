@extends('_master')

@section('title')
	Random User Generator
@stop

@section('content')
	<div id='centered'>

		<a href="/">Home</a>
		<form method="GET" action="">
			Number of Users: <input type="text" name="users" required> (Max 9)<br>
			
			<div id="options">
				<input type="checkbox" name="addr"> Address<br>
				<input type="checkbox" name="bio"> Bio<br>
				<input type="submit" value="Submit">
			</div>
		
		</form>

		<div id="user_output">
			<?php echo $user_data; ?>
		</div>

	</div>
@stop