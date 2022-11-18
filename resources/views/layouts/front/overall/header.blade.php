<!DOCTYPE html>
<html lang="en">
@include('layouts.front.head')
<body class="hold-transition login-page"> 

	<video id="headVideo" class="pos-absolute a-0 wd-100p ht-100p object-fit-cover" autoplay muted loop>
		<source src="{{ asset('assets/videos/videobg.mp4') }}" type="video/mp4"> 
	</video><!-- /video -->

    @include('layouts.front.preloader')
	
	
	
	 