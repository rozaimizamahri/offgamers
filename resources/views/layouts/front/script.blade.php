<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }} "></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }} "></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }} "></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{ asset('assets/js/jquery.slimscroll.js') }} "></script>
<!--Wave Effects -->
<script src="{{ asset('assets/js/waves.js') }} "></script>
<!--Menu sidebar -->
<script src="{{ asset('assets/js/sidebarmenu.js') }} "></script>
<!--stickey kit -->
<script src="{{ asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }} "></script>
<script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.min.js') }} "></script>
<!--Custom JavaScript -->
<script src="{{ asset('assets/js/custom.min.js') }} "></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{ asset('assets/plugins/styleswitcher/jQuery.style.switcher.js') }} "></script>

<script>
  $(function(){
	'use strict';

	// Check if video can play, and play it
	var video = document.getElementById('headVideo');
	video.addEventListener('canplay', function() {
	  video.play();
	});

  });
</script>