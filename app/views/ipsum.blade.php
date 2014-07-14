@extends('_master')

@section('content')
<?php
	$generator = new Badcow\LoremIpsum\Generator();
	$paragraphs = $generator->getParagraphs(2);
	echo implode('<p>', $paragraphs);
?>
@stop