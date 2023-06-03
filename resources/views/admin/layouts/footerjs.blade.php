<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
	@if(Session::get('success'))
	/*$(document).Toasts('create', {
		class: 'bg-success',
		title: 'Success',
		autohide: true,
		delay: 750,
		body: '{!! Session::get('success') !!}'
    })*/
	toastr.success('{!! Session::get('success') !!}')
	@elseif(Session::get('error'))
	/*$(document).Toasts('create', {
		class: 'bg-danger',
		title: 'Error',
		autohide: true,
		delay: 750,
		body: '{!! Session::get('error') !!}'
    })*/
	toastr.error('{!! Session::get('error') !!}')
	@endif
</script>