@extends('web.layouts.main')

@section('content')
	{!! $page['content'] !!}
{{--<section id="hello" class="home bg-mega">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="main_home">
					<div class="home_text">
						<h1 class="text-white">WE’RE <br /> CREATIVE DESIGNERS!</h1>
					</div>
					<div class="home_btns m-top-40">
						<a href="https://bootstrapthemes.co" target="_blank" class="btn btn-primary m-top-20">GET STARTED</a>
						<a href="https://bootstrapthemes.co" target="_blank" class="btn btn-default m-top-20">DOWNLOAD NOW</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--About Sections-->
	<section id="about" class="about roomy-50">
		<div class="container">
			<div class="row">
				<div class="main_about">
					<div class="col-md-6">
						<div class="about_content">
							<h2>ABOUT US</h2>
							<div class="separator_left"></div>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
							<div class="about_btns m-top-40">
								<a href="" class="btn btn-primary">DOWNLOAD NOW</a>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="about_accordion wow fadeIn">
							<div id="faq_main_content" class="faq_main_content">
								<h6><i class="fa fa-angle-right"></i> UNIQUE DESIGN </h6>
								<div>
									<div class="content">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, </p>
									</div>
								</div>
								<h6 class="open"><i class="fa fa-angle-right"></i> EXPERIENCE TEAM</h6>
								<div class="open">
									<div class="content">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, </p>
									</div>
								</div>
								<h6> <i class="fa fa-angle-right"></i> GREAT SERVICE </h6>
								<div>
									<div class="content">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, </p>
									</div>
								</div>
								<h6><i class="fa fa-angle-right"></i> FREE UPDATES </h6>
								<div>
									<div class="content">
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, </p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--End off row-->
		</div>
		<!--End off container -->
		<br />
		<br />
		<br />
		<br />
		<hr />
		<br />
		<br />
		<div class="container">
			<div class="row">
				<div class="about_bottom_content">
					<div class="col-md-4">
						<div class="about_bottom_item m-top-20">
							<div class="ab_head">
								<div class="ab_head_icon">
									<i class="icofont icofont-fire-burn"></i>
								</div>
								<h6 class="m-top-20"> WE’RE CREATIVE</h6>
							</div>
							<p class="m-top-20">Lorem ipsum dolor sit amet, consectetuer adipiscing ealit, sed diaim nonummy nibsih euismod tincidiunt laorieet doloire magna diam aliquafm erat voluitpati. </p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="about_bottom_item m-top-20">
							<div class="ab_head">
								<div class="ab_head_icon">
									<i class="icofont icofont-speech-comments"></i>
								</div>
								<h6 class="m-top-20">WE'RE FRIENDLY</h6>
							</div>
							<p class="m-top-20">Lorem ipsum dolor sit amet, consectetuer adipiscing ealit, sed diaim nonummy nibsih euismod tincidiunt laorieet doloire magna diam aliquafm erat voluitpati. </p>
						</div>
					</div>
					<div class="col-md-4">
						<div class="about_bottom_item m-top-20">
							<div class="ab_head">
								<div class="ab_head_icon">
									<i class="icofont icofont-heart"></i>
								</div>
								<h6 class="m-top-20">WE LOVE MINIMALISM</h6>
							</div>
							<p class="m-top-20">Lorem ipsum dolor sit amet, consectetuer adipiscing ealit, sed diaim nonummy nibsih euismod tincidiunt laorieet doloire magna diam aliquafm erat voluitpati. </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section id="video" class="video">
		<div class="overlay"></div>
		<div class="main_video roomy-50 m-top-100 m-bottom-100 text-center">
			<div class="video_text text-center">
				<a href="http://www.youtube.com/watch?v=7HKoqNJtMTQ" class="video-link"><span class="fa fa-play"></span></a>
			</div>
		</div>
	</section>
	
	<section id="service" class="service">
		<div class="container">
			<div class="row">
				<div class="main_service roomy-40">
					<div class="col-md-8 col-sm-10 mr-md-auto ml-md-auto mr-sm-auto ml-sm-auto">
						<div class="head_title text-center">
							<h2>OUR SERVICES</h2>
							<div class="separator_auto"></div>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
						</div>
					</div>
					<div class="row">


						<div class="col-md-4">
							<div class="service_item">
								<i class="icofont icofont-light-bulb"></i>
								<h6 class="m-top-30">BRANDING</h6>
								<div class="separator_small"></div>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="service_item">
								<i class="icofont icofont-imac"></i>
								<h6 class="m-top-30">BRANDING</h6>
								<div class="separator_small"></div>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="service_item">
								<i class="icofont icofont-video"></i>
								<h6 class="m-top-30">BRANDING</h6>
								<div class="separator_small"></div>
								<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--End off row -->
		</div>
		<!--End off container -->
	</section>
	<section id="pricing" class="pricing lightbg">
		<div class="container">
			<div class="row">
				<div class="main_pricing">
					<div class="col-md-8 ml-md-auto mr-md-auto">
						<div class="head_title text-center">
							<h2>OUR PRICING</h2>
							<div class="separator_auto"></div>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-sm-12">
					<div class="pricing_item">
						<div class="pricing_head p-top-30 p-bottom-100 text-center">
							<h3 class="text-uppercase">STARTER</h3>
						</div>
						<div class="pricing_price_border text-center">
							<div class="pricing_price">
								<h3 class="text-white">$19</h3>
								<p class="text-white">per month</p>
							</div>
						</div>

						<div class="pricing_body bg-white p-top-110 p-bottom-60">
							<ul>
								<li><i class="fa fa-check-circle text-primary"></i> <span>10</span> user</li>
								<li class="disabled"><i class="fa fa-times-circle"></i> Unlimited Bandwidth</li>
								<li class="disabled"><i class="fa fa-times-circle"></i> Full Statistics</li>

							</ul>
							<div class="pricing_btn text-center m-top-40">
								<a href="" class="btn btn-primary">CHOOSE PLAN</a>
							</div>
						</div>
					</div>
				</div>
				<!-- End off col-md-4 -->

				<div class="col-md-4 col-sm-12">
					<div class="pricing_item sm-m-top-30">
						<div class="pricing_top_border"></div>
						<div class="pricing_head p-top-30 p-bottom-100 text-center">
							<h3 class="text-uppercase">PREMIUM</h3>
						</div>
						<div class="pricing_price_border text-center">
							<div class="pricing_price">
								<h3 class="text-white">$39</h3>
								<p class="text-white">per month</p>
							</div>
						</div>

						<div class="pricing_body bg-white p-top-110 p-bottom-60">
							<ul>
								<li><i class="fa fa-check-circle text-primary"></i> <span>50</span> user</li>
								<li><i class="fa fa-check-circle text-primary"></i> Unlimited Bandwidth</li>
								<li class="disabled"><i class="fa fa-times-circle"></i> Full Statistics</li>
							</ul>
							<div class="pricing_btn text-center m-top-40">
								<a href="" class="btn btn-primary">CHOOSE PLAN</a>
							</div>
						</div>
					</div>
				</div>
				<!-- End off col-md-4 -->

				<div class="col-md-4 col-sm-12">
					<div class="pricing_item sm-m-top-30">
						<div class="pricing_head p-top-30 p-bottom-100 text-center">
							<h3 class="text-uppercase">bUSINESS</h3>
						</div>
						<div class="pricing_price_border text-center">
							<div class="pricing_price">
								<h3 class="text-white">$99</h3>
								<p class="text-white">per month</p>
							</div>
						</div>

						<div class="pricing_body bg-white p-top-110 p-bottom-60">
							<ul>
								<li><i class="fa fa-check-circle text-primary"></i> Unlimited Users</li>
								<li><i class="fa fa-check-circle text-primary"></i> Unlimited Bandwidth</li>
								<li><i class="fa fa-check-circle text-primary"></i> Full Statistics</li>
							</ul>
							<div class="pricing_btn text-center m-top-40">
								<a href="" class="btn btn-primary">CHOOSE PLAN</a>
							</div>
						</div>
					</div>
				</div>
				<!-- End off col-md-4 -->
			</div>
			<!--End off row-->
		</div>
		<!--End off container -->
	</section>
	<section id="skill" class="skill roomy-50">
		<div class="container">
			<div class="row">
				<div class="skill_bottom_content text-center">
					<div class="col-md-3">
						<div class="skill_bottom_item">
							<h2 class="statistic-counter">3468</h2>
							<div class="separator_small"></div>
							<h5><em>Projects Finished</em></h5>
						</div>
					</div>
					<div class="col-md-3">
						<div class="skill_bottom_item">
							<h2 class="statistic-counter">4638</h2>
							<div class="separator_small"></div>
							<h5><em>Happy Clients</em></h5>
						</div>
					</div>
					<div class="col-md-3">
						<div class="skill_bottom_item">
							<h2 class="statistic-counter">3468</h2>
							<div class="separator_small"></div>
							<h5><em>Hours of work</em></h5>
						</div>
					</div>
					<div class="col-md-3">
						<div class="skill_bottom_item">
							<h2 class="statistic-counter">3468</h2>
							<div class="separator_small"></div>
							<h5><em>Cup of coffee</em></h5>
						</div>
					</div>
				</div>
			</div>
			<!--End off row-->
		</div>
</section>--}}	
@endsection	