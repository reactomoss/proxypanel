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
		<h2 class="main-content-title tx-20 mg-b-5">Proxy locations</h2>
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
											<button class="btn btn-sm ripple btn-success mb-1 connectBtn" >Connect</button>
										@elseif ($m['load'] < 100)
											<button class="btn btn-sm ripple btn-warning mb-1 connectBtn" style="color:white" >Connect</button>
										@else
											<button class="btn btn-sm ripple btn-danger mb-1 connectBtn" >Connect</button>
										@endif
									</td>
									<td class="text-center" style="vertical-align: middle">
										<div class="progress mg-b-10">
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
			$.ajax({
				type: 'POST',
				url: "{{ route('refreshAllLocation') }}",
				data: {},
				success: function(result) {
					$("tbody").html(result)
				}
			})
		}, 5000)

	})

	$(document).on("click", ".connectBtn", function() {
		const id = "{{ session('id') }}"
		if (!id)
			window.location = "{{ url('/signin') }}"
		else
			window.location = "{{ url('/dashboard') }}"
	})
</script>
@endsection