@extends('layouts.master2')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
@endsection
@section('content')
		<!-- Page -->
		<div class="page main-signin-wrapper">

			<!-- Row -->
			<div class="row text-center pl-0 pr-0 ml-0 mr-0">
				<div class="col-lg-3 d-block mx-auto">
					<div class="text-center mb-2">
						<img src="{{URL::asset('assets/img/brand/logo.png')}}" class="header-brand-img" alt="logo">
						<img src="{{URL::asset('assets/img/brand/logo-light.png')}}" class="header-brand-img theme-logos" alt="logo">
					</div>
					<div class="card custom-card">
						<div class="card-body">
							<h4 class="text-center">Signin to Your Account</h4>
							<form>
								<div class="form-group text-left">
									<label>Email</label>
									<input class="form-control" id="email" placeholder="Enter your email" type="text">
								</div>
								<div class="form-group text-left">
									<label>Password</label>
									<input class="form-control" id="password" placeholder="Enter your password" type="password">
								</div>
								<button type="button" class="btn ripple btn-main-primary btn-block" id="signInBtn">Sign In</button>
							</form>
							<div class="mt-3 text-center">
								<p class="mb-1"><a href="">Forgot password?</a></p>
								<p class="mb-0">Don't have an account? <a href="{{ url('/' . $page='signup') }}">Create an Account</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->

		</div>
		<!-- End Page -->
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script>
	$(document).ready(function() {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

		$('#email').keypress(function (e) {
			if(e.which ==13)
				$('#password').focus()		
		})

		$('#password').keypress(function (e) {
			if(e.which ==13)
				$("#signInBtn").click()
		})

		$("#signInBtn").click(function() {
			let email = $("#email").val()
			let password = $("#password").val()
			$.ajax({
				type: 'POST',
				url: "{{ url('/login') }}",
				async: false,
				data: {
					email: email, password: password
				},
				success: function(result) {
					if (result == 1) {
						window.location = "{{ url('/dashboard')}}"
					} else {
						toastr.error("Please input correct information", "Not registered user")
					}
				}
			});
		})
	});
</script>
@endsection