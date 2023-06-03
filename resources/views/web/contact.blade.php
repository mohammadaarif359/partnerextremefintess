@extends('web.layouts.main')

@section('content')
	{!! $page['content'] !!}
	
	<section id="contact" class="contact bg-mega fix">
		<div class="container">
			<div class="row">
				<div class="main_contact roomy-50 text-white">
					<div class="col-md-4">
						<div class="rage_widget">
							<div class="widget_head">
								<h3 class="text-white">RAGE</h3>
								<div class="separator_small"></div>
							</div>
							<p>
							  A108 Adam Street New York<br>
							  NY 535022 United States <br>
							  <strong>Phone:</strong> +1 5589 55488 55<br>
							  <strong>Email:</strong> info@example.com<br>
							</p>

							<div class="widget_socail m-top-30">
								<ul class="list-inline-item">
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-linkedin"></i></a></li>
									<li><a href=""><i class="fa fa-vimeo"></i></a></li>
									<li><a href=""><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-8 sm-m-top-30">
						<form id="contact-inquiry-form" name="contact-inquiry-form">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<input id="name" name="name" type="text" placeholder="Name" class="form-control">
										<span class="help-block"></span>
									</div>
								</div>

								<div class="col-sm-6">
									<div class="form-group">
										<input id="mobile" name="mobile" type="text" placeholder="Mobile" class="form-control">
										<span class="help-block"></span>
									</div>
								</div>

								<div class="col-sm-12">
									<div class="form-group">
										<textarea name="message" class="form-control" rows="6" placeholder="Message"></textarea>
										<span class="help-block"></span>
									</div>
									<div class="form-group text-center">
										<button type="button" id="contact-inquiry-btn" class="btn btn-primary">SEND MESSAGE
									</button></div>
								</div>
							</div>
						</form>
						
					</div>
				</div>
			</div>
			<!--End off row -->
		</div>
		<!--End off container -->
	</section>
@endsection
@section('pagejs')
	<script>
		$("#contact-inquiry-btn").click(function(e){
			e.preventDefault();
			$(this).prop("disabled",true);
			$(this).html('SEND MESSAGE <i class="fa fa-spinner fa-spin"></i>');
			var FormData = $( "#contact-inquiry-form" ).serialize();
			var url = '{{ url("/") }}'+'/contact-inquiry';
			var thisVar = $(this);
			
			$.post(url,FormData,function(res){
				  $('#contact-inquiry-form .help-block').html('');
				  thisVar.prop("disabled",false);
				  thisVar.html("SEND MESSAGE");
				  if(res.code == "200"){
					toastr.success(res.success)
					setTimeout(function(){ window.location.reload(); }, 1000);
				 }
				 else if(res.error){
					$.each(res.error,function(key,val){
						$.each(val,function(k,v){
							$(":input[name='"+key+"']").parent().addClass("has-error");
							$(":input[name='"+key+"']").parent().find('.help-block').html(v);
						});
					});
				 }
			});
		});
	</script>
@endsection