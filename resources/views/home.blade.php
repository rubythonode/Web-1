@extends('layouts/master')

@section('title') Home @stop 

@section('id_page', 'home2') @stop

@include('partial.message')

@section('content')
		
		{{-- <div class="row">
			<button id="test">here</button>
		</div> --}}

		@include('partial.slide')
		
		@include('partial.features')
		
		@include('partial.pricing')
		
		@include('partial.featuresHover')
		
		@include('partial.testimonials')
		
		<div id="cta">
			<p>
				Start your free 14 day trial! 
			</p>
			<a href="signup.html">
				Sign up for free
			</a>
		</div>
		
		@include('partial.clients')	

@stop

@section('scripts')
	<script type="text/javascript">
	$(function()
	{
		//slide
		var $navDots = $("#hero nav a")
		var $next = $(".slide-nav.next");
		var $prev = $(".slide-nav.prev");
		var $slides = $("#hero .slides .slide");
		var actualIndex = 0;
		var swiping = false;
		var interval;

		$navDots.click(function (e) {
			e.preventDefault();
			if (swiping) { return; }
			swiping = true;

			actualIndex = $navDots.index(this);
			updateSlides(actualIndex);
		});

		$next.click(function (e) {
			e.preventDefault();
			if (swiping) { return; }
			swiping = true;

			clearInterval(interval);
			interval = null;

			actualIndex++;
			if (actualIndex >= $slides.length) {
				actualIndex = 0;
			}

			updateSlides(actualIndex);
		});

		$prev.click(function (e) {
			e.preventDefault();
			if (swiping) { return; }
			swiping = true;

			clearInterval(interval);
			interval = null;

			actualIndex--;
			if (actualIndex < 0) {
				actualIndex = $slides.length - 1;
			}

			updateSlides(actualIndex);
		});

		function updateSlides(index) {
			// update nav dots
			$navDots.removeClass("active");
			$navDots.eq(index).addClass("active");

			// update slides
			var $activeSlide = $("#hero .slide.active");
			var $nextSlide = $slides.eq(index);

			$activeSlide.fadeOut();
			$nextSlide.addClass("next").fadeIn();
			
			setTimeout(function () {
				$slides.removeClass("next").removeClass("active");
				$nextSlide.addClass("active");
				$activeSlide.removeAttr('style');
				swiping = false;
			}, 1000);
		}

		interval = setInterval(function () {
			if (swiping) { return; }
			swiping = true;

			actualIndex++;
			if (actualIndex >= $slides.length) {
				actualIndex = 0;
			}

			updateSlides(actualIndex);
		}, 5000);

		// demo player
		var $videoModal = $(".video-modal");
		$("#demo-player").click(function () {
			$videoModal.toggleClass("active");
			clearInterval(interval);
			interval = null;
		});

		$videoModal.click(function () {
			$videoModal.removeClass("active");
			setTimeout(function () {
				$videoModal.find(".wrap").html('<iframe src="http://player.vimeo.com/video/22439234" width="620" height="350" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
			}, 1000);
		})
		
		$videoModal.find(".wrap").click(function (e) {
			e.stopPropagation();
		});
	});	
	</script>
@stop