<div id="hero">
	<a class="slide-nav prev" href="#">{{ trans('globlas.previous') }}</a>
	<a class="slide-nav next" href="#">{{ trans('globlas.next') }}</a>
	<nav>
		<a class="active" href="#"></a>
		<a href="#"></a>
		<a href="#"></a>
	</nav>
	<div class="slides">
		<div class="slide first active">
			<div class="bg"></div>
			<div class="container">
				<div class="row">
					<div class="col-sm-6 info">
						<h1 class="hero-text">
							{{ trans('slide.title_01') }}
						</h1>
						<p>
							{{ trans('slide.message_01') }}
						</p>
						<div class="cta">
							<a href="features.html" class="button-outline">
								{{ trans('slide.button_01') }}
								<i class="fa fa-chevron-right"></i>
							</a>
						</div>
					</div>
					<div class="col-sm-6 hidden-xs mobiles">
						<img src="img/template/devices3.png" class="animated fadeInLeft img-responsive" alt="devices" />
					</div>
				</div>
			</div>
		</div>
		<div class="slide second">
			<div class="bg"></div>
			<div class="container">
				<h1 class="hero-text">{{ trans('slide.title_02') }}</h1>
				<p class="sub-text">
					{{ trans('slide.message_02') }}
				</p>
				<div class="video-wrapper">
					<div class="video animated fadeInUp">
						<img src="img/template/player.png" id="demo-player" alt="videoplayer" />
					</div>
				</div>
			</div>
		</div>
		<div class="slide third">
			<div class="bg"></div>
			<div class="container">
				<h1 class="hero-text animated fadeInLeft">
					{{ trans('slide.title_03') }}
				</h1>
				<p class="sub-text animated fadeInLeft">
					{{ trans('slide.message_03') }}
				</p>
				<div class="cta animated fadeInRight">
					<a href="{{ env('DEMO_SERVER') }}" class="button-outline">{{ trans('slide.button_02') }}</a>
					<a href="/auth/register" class="button">{{ trans('slide.button_03') }}</a>
				</div>
			</div>
		</div>
	</div>

	<div class="video-modal">
		<div class="wrap">
			<iframe src="http://player.vimeo.com/video/22439234" width="620" height="350" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
	</div>
</div>

