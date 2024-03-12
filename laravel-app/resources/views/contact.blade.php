@include('templates.header')
@include('templates.menu')

<div class="container">
		<h1>Contact me.</h1>
		<hr />
		<div class="m-3">

@php
	$name = "Khaeg Chumpol";
	$major = "Information Technology";
	$room = "ทส.พ. 3 และ 4";
	$income_out = "";
	$facebook = "https://www.facebook.com";
	$beer = "Asahi";
@endphp

		<b>Name:</b> {{ $name }}<br />
		<b>Major:</b> {{ $major }}<br />
		<b>Room:</b> {{ $room }}<br />
	</div>
</div>

@include('templates.footer')
