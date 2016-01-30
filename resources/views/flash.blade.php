@if(session()->has('flash_message'))
	<script>
        swal({
			title: "Error!",
			text: "Here's my error message!",
			type: "info",
			timer: 2000,
			confirmButtonText: false
        }); 
	</script>
@endif