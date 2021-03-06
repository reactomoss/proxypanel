@extends('layouts.master')
@section('css')
<!---Sweet-Alert css-->
<link href="{{ URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
<style>
.loadingBtn {
	display: none;
}
</style>
@endsection
@section('page-header')
<!-- Page Header -->
<div class="page-header">
	<div>
		<h2 class="main-content-title tx-20 mg-b-5">Manage proxy locations</h2>
		<p class="text-muted card-sub-title">Choose a city to connect to.<br>
		Location Load means how full a location is.<br>
		For example, if there is are 100 4G modems in Los Angels, and the load shows 44, that means there are 44 modems in use and 66 available.</p>
	</div>
</div>
<!-- End Page Header -->
@endsection
@section('content')

<!-- Row -->
<div class="row">
	<div class="col-lg-12">
		<div class="card custom-card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hover mg-b-0">
						<thead>
							<tr>
								<th width="15%" class="text-center">Location</th>
								<th width="15%" class="text-center">Action</th>
								<th width="70%" class="text-center">Location Load</th>
							</tr>
						</thead>
						<tbody>
							@if(count($locations))
								@foreach ($locations as $m) 
								<tr>
									<td class="text-center" style="vertical-align: middle">
										{{$m['location']}}
									</td>
									<td class="text-center" style="vertical-align: middle">
										<input type="hidden" value="{{$m['location']}}">
										@if ($m['load'] <= 80 )
											<button class="btn btn-sm ripple btn-success loadingBtn" disabled type="button"><span aria-hidden="true" class="spinner-border spinner-border-sm" role="status"></span> Saving...</button>
											<button class="btn btn-sm ripple btn-success mb-1 connectBtn" date="{{$last}}" city="{{$city}}">Connect</button>
										@elseif ($m['load'] < 100)
											<button class="btn btn-sm ripple btn-warning loadingBtn" style="color:white" disabled type="button"><span aria-hidden="true" class="spinner-border spinner-border-sm" role="status"></span> Saving...</button>
											<button class="btn btn-sm ripple btn-warning mb-1 connectBtn" style="color:white" date="{{$last}}" city="{{$city}}">Connect</button>
										@else
											<button class="btn btn-sm ripple btn-danger loadingBtn" disabled type="button"><span aria-hidden="true" class="spinner-border spinner-border-sm" role="status"></span> Saving...</button>
											<button class="btn btn-sm ripple btn-danger mb-1 connectBtn" date="{{$last}}" city="{{$city}}">Connect</button>
										@endif
									</td>
									<td class="text-center" style="vertical-align: middle">
										<div class="progress mg-b-10">
											<!-- <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress-bar progress-bar-lg bg-success ht-20" role="progressbar" style="width: {{$m['load']}}%">
												{{$m['load']}}
											</div> -->
										@if ($m['load'] <= 80 )
											<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress-bar progress-bar-lg bg-success ht-20" role="progressbar" style="width: {{$m['load']}}%">
												{{$m['load']}}
											</div>
										@elseif ($m['load'] < 100)
											<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress-bar progress-bar-lg bg-warning ht-20" role="progressbar" style="width: {{$m['load']}}%">
												{{$m['load']}}
											</div>
										@else
											<div aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" class="progress-bar progress-bar-lg bg-danger ht-20" role="progressbar" style="width: {{$m['load']}}%">
												{{$m['load']}}
											</div>
										@endif
										</div>
									</td>
								</tr>
								@endforeach
							@else
								<tr>
									<td colspan="20" class="text-center">No data</td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Row -->

<div id="test">

</div>

</div>
</div>

<!-- End Main Content-->
@endsection
@section('js')
<!-- Sweet-Alert js-->
<script src="{{ URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/sweet-alert/dark-jquery.sweet-alert.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		})

		setInterval(function() {
			const id = "{{$id}}"
			$.ajax({
				type: 'POST',
				url: "{{ route('refreshLocation') }}",
				data: {
					id: id
				},
				success: function(result) {
					$("tbody").html(result)
				}
			})
		}, 5000)

	})

	$(document).on("click", ".connectBtn", function() {
		const city = $(".connectBtn").attr('city')
		// const last = new Date("{{$last}}")
		const last = new Date($(".connectBtn").attr('date'))
		const d1 = new Date()
		const now = new Date(d1.getUTCFullYear(), d1.getUTCMonth(), d1.getUTCDate(), d1.getUTCHours(), d1.getUTCMinutes(), d1.getUTCSeconds())

		const diff = (now.getTime() - last.getTime()) / 1000;
		if (city != "*" && diff < 180) {
			const seconds = 180 - diff
			const min = Math.ceil(seconds / 60)
			toastr.info("You can change this location after " + min + " minutes.")
			return
		}
		const id = "{{$id}}"
		const location = $(this).prev().prev().val()

		const thisBtn = $(this)
		const loadingBtn = $(this).prev()
		loadingBtn.show()
		thisBtn.hide()

		$.ajax({
			type: 'POST',
			url: "{{ route('changeLocation') }}",
			data: {
				id: id, 
				location: location
			},
			success: function(result) {
				loadingBtn.hide()
				thisBtn.show()

				if (result == 1) {
					toastr.success("Location is changed", "Success")
					window.location = "{{url('/dashboard')}}"
				} else {
					toastr.error("Something went wrong", "Failed")
				}
			}
		})
	})
</script>
@endsection