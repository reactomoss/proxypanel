@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
<!-- Page Header -->
<div class="page-header">
	<div>
		<h2 class="main-content-title tx-20 mg-b-5">API</h2>
		<!-- <ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Pages</a></li>
								<li class="breadcrumb-item active" aria-current="page">Empty Page</li>
							</ol> -->
	</div>
	<div class="btn btn-list">
		<!-- <a class="btn ripple btn-primary" href="#"><i class="fe fe-external-link"></i> Export</a>
		<a class="btn ripple btn-secondary" href="#"><i class="fe fe-download"></i> Download</a> -->
		<a class="btn ripple btn-info" href="#"><i class="fe fe-help-circle"></i> Help</a>
		<a class="btn ripple btn-danger dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
			<i class="fe fe-settings"></i> Settings <i class="fas fa-caret-down ml-1"></i>
		</a>
		<div  class="dropdown-menu tx-13">
			<a class="dropdown-item" href="#"><i class="fe fe-eye mr-2"></i>View</a>
			<a class="dropdown-item" href="#"><i class="fe fe-plus-circle mr-2"></i>Add</a>
			<a class="dropdown-item" href="#"><i class="fe fe-mail mr-2"></i>Email</a>
			<a class="dropdown-item" href="#"><i class="fe fe-folder-plus mr-2"></i>Save</a>
			<a class="dropdown-item" href="#"><i class="fe fe-trash-2 mr-2"></i>Remove</a>
			<a class="dropdown-item" href="#"><i class="fe fe-settings mr-2"></i>More</a>
		</div>
	</div>
</div>
<!-- End Page Header -->
@endsection
@section('content')

<!-- Row -->
<div class="row">
	<div class="col-md-12 col-xl-12">
		<div class="card custom-card">
			<div class="card-header custom-card-header">
				<div class="card-options">
					<label class="custom-switch">
						<input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
						<span class="custom-switch-indicator"></span>
						<span class="custom-switch-description">Enable API</span>
					</label>
				</div>
			</div>
			<div class="card-body">
				<p class="h5">Your API Key:</p>
				<p>7bac8875ae062f738aa33d2997d88c5d:G-UxLbYrkVN0b4McQiDXX3RCBKrN24sxM-FI6t4dv0U</p>
				<button class="btn ripple btn-primary btn-with-icon">
					<i class="fa fa-sync"></i> Refresh API Key
				</button><br>
				<p class="h4 text-secondary">Change Proxy IP</p>
				<p>https://proxypanel.io/proxy/change-ip/USERNAME/NICKNAME/7bac8875ae062f738aa33d2997d88c5d:G-UxLbYrkVN0b4McQiDXX3RCBKrN24sxM-FI6t4dv0U</p>
				<p class="h4 text-secondary">Change Proxy Location</p>
				<p class="h6 text-info">Location conventions: Replace whitespace with underscore '_' symbol and use lowercase. Hermosa Beach -> hermosa_beach</p>
				<p>https://proxypanel.io/proxy/locations/USERNAME/NICKNAME/LOCATION/7bac8875ae062f738aa33d2997d88c5d:G-UxLbYrkVN0b4McQiDXX3RCBKrN24sxM-FI6t4dv0U</p>
				<p class="h4 text-secondary">Connect to a random location</p>
				<p>https://proxypanel.io/proxy/locations/USERNAME/NICKNAME/7bac8875ae062f738aa33d2997d88c5d:G-UxLbYrkVN0b4McQiDXX3RCBKrN24sxM-FI6t4dv0U</p>
			</div>
		</div>
	</div>
</div>
<!-- End Row -->

</div>
</div>
<!-- End Main Content-->
@endsection
@section('js')
@endsection