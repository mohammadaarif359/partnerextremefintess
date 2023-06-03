<footer id="footer" class="footer bg-black">
	<div class="container">
		<div class="row">
			<div class="main_footer text-center p-top-40 p-bottom-30">
				<p class="wow fadeInRight" data-wow-duration="1s">
					Made by
					<a target="_blank" href="">Suntec Web Services</a> {{ date('Y') }}. All Rights Reserved
				</p>
			</div>
		</div>
	</div>
</footer>
<!-- JS includes -->
<script src="{{ asset('web/js/vendor/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('web/js/vendor/popper.min.js') }}"></script>
<script src="{{ asset('web/js/vendor/bootstrap.min.js') }}"></script>

<script src="{{ asset('web/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('web/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('web/js/slick.min.js') }}"></script>
<script src="{{ asset('web/js/jquery.collapse.js') }}"></script>
<script src="{{ asset('web/js/bootsnav.js') }}"></script>
<!-- paradise slider js -->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyD_tAQD36pKp9v4at5AnpGbvBUsLCOSJx8"></script>
<script src="{{ asset('web/js/gmaps.min.js') }}"></script>
<script>
	function showmap() {
		var mapOptions = {
			zoom: 8,
			scrollwheel: false,
			center: new google.maps.LatLng(-34.397, 150.644),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
		$('.mapheight').css('height', '350');
		$('.maps_text h3').hide();
	}

</script>
<script src="{{ asset('web/js/plugins.js') }}"></script>
<script src="{{ asset('web/js/main.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>