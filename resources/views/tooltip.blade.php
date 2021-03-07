@extends('layouts.master')
@section('css')
<!---Prism css-->
<link href="{{ URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
<!---Jquery.mCustomScrollbar css-->
<link href="{{ URL::asset('assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
@endsection
@section('page-header')
					<!-- Page Header -->
					<div class="page-header">
						<div>
							<h2 class="main-content-title tx-24 mg-b-5">Tooltip</h2>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Elements</a></li>
								<li class="breadcrumb-item active" aria-current="page">Tooltip</li>
							</ol>
						</div>
						<div class="btn btn-list">
							<a class="btn ripple btn-primary" href="#"><i class="fe fe-external-link"></i> Export</a>
							<a class="btn ripple btn-secondary" href="#"><i class="fe fe-download"></i> Download</a>
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
						<div class="col-xl-9 col-lg-12">
							<div class="card custom-card" id="default">
								<div class="card-body">
									<div>
										<h6 class="card-title mb-1">Default Tooltip</h6>
										<p class="text-muted card-sub-title">Below are basic pagination navigation.</p>
									</div>
									<div class="main-content-label main-content-label-sm mg-b-10">
										Static Example
									</div>
									<div class="tooltip-static-demo mg-b-20">
										<div class="row row-sm">
											<div class="col-sm-6 col-lg-3">
												<div class="tooltip bs-tooltip-top" role="tooltip">
													<div class="arrow"></div>
													<div class="tooltip-inner">
														Tooltip on the bottom
													</div>
												</div>
											</div>
											<div class="col-sm-6 col-lg-3 mg-t-30 mg-sm-t-0">
												<div class="tooltip bs-tooltip-bottom" role="tooltip">
													<div class="arrow"></div>
													<div class="tooltip-inner">
														Tooltip on the top
													</div>
												</div>
											</div>
											<div class="col-sm-6 col-lg-3 mg-t-30 mg-lg-t-0">
												<div class="tooltip bs-tooltip-left" role="tooltip">
													<div class="arrow"></div>
													<div class="tooltip-inner">
														Tooltip on the left
													</div>
												</div>
											</div>
											<div class="col-sm-6 col-lg-3 mg-t-30 mg-lg-t-0">
												<div class="tooltip bs-tooltip-right" role="tooltip">
													<div class="arrow"></div>
													<div class="tooltip-inner">
														Tooltip on the right
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="main-content-label main-content-label-sm mg-b-10">
										Live Example
									</div>
									<div class="text-wrap">
										<div class="example">
											<div class="row row-sm tx-center">
												<div class="col-sm-6 col-lg-3">
													<button class="btn ripple btn-primary" data-placement="top" data-toggle="tooltip" title="Tooltip on top" type="button">Hover me</button>
												</div>
												<div class="col-sm-6 col-lg-3 mg-t-30 mg-sm-t-0">
													<button class="btn ripple btn-secondary" data-placement="bottom" data-toggle="tooltip" title="Tooltip on top" type="button">Hover me</button>
												</div>
												<div class="col-sm-6 col-lg-3 mg-t-30 mg-lg-t-0">
													<button class="btn ripple btn-info" data-placement="left" data-toggle="tooltip" title="Tooltip on left" type="button">Hover me</button>
												</div>
												<div class="col-sm-6 col-lg-3 mg-t-30 mg-lg-t-0">
													<button class="btn ripple btn-danger" data-placement="right" data-toggle="tooltip" title="Tooltip on right" type="button">Hover me</button>
												</div>
											</div>
										</div>
<!-- Prism Precode -->
<figure class="highlight clip-widget" id="tooltip1"><pre><code class="language-markup"><script type="html-dashlead/script"><div class="row row-sm tx-center">
	<div class="col-sm-6 col-lg-3">
		<button class="btn ripple btn-primary" data-placement="top" data-toggle="tooltip" title="Tooltip on top" type="button">Hover me</button>
	</div>
	<div class="col-sm-6 col-lg-3 mg-t-30 mg-sm-t-0">
		<button class="btn ripple btn-secondary" data-placement="bottom" data-toggle="tooltip" title="Tooltip on top" type="button">Hover me</button>
	</div>
	<div class="col-sm-6 col-lg-3 mg-t-30 mg-lg-t-0">
		<button class="btn ripple btn-info" data-placement="left" data-toggle="tooltip" title="Tooltip on left" type="button">Hover me</button>
	</div>
	<div class="col-sm-6 col-lg-3 mg-t-30 mg-lg-t-0">
		<button class="btn ripple btn-danger" data-placement="right" data-toggle="tooltip" title="Tooltip on right" type="button">Hover me</button>
	</div>
</div></script></code></pre>
	<div class="clipboard-icon" data-clipboard-target="#tooltip1"><i class="fa fa-clipboard"></i></div>
</figure>
<!-- End Prism Precode -->
									</div>
								</div>
							</div>
							<div class="card custom-card" id="colored">
								<div class="card-body">
									<div>
										<h6 class="card-title mb-1">Colored Tooltip</h6>
										<p class="text-muted card-sub-title">Colored tooltip. Four options are available: top, right, bottom, and left aligned.</p>
									</div>
									<div class="main-content-label main-content-label-sm mg-b-10">
										Static Example
									</div>
									<div class="tooltip-static-demo mg-b-20">
										<div class="row row-sm">
											<div class="col-sm-6 col-lg-3">
												<div class="tooltip tooltip-primary bs-tooltip-top" role="tooltip">
													<div class="arrow"></div>
													<div class="tooltip-inner">
														Tooltip on the bottom
													</div>
												</div>
											</div>
											<div class="col-sm-6 col-lg-3 mg-t-30 mg-sm-t-0">
												<div class="tooltip tooltip-secondary bs-tooltip-bottom" role="tooltip">
													<div class="arrow"></div>
													<div class="tooltip-inner">
														Tooltip on the top
													</div>
												</div>
											</div>
											<div class="col-sm-6 col-lg-3 mg-t-30 mg-lg-t-0">
												<div class="tooltip tooltip-info bs-tooltip-left" role="tooltip">
													<div class="arrow"></div>
													<div class="tooltip-inner">
														Tooltip on the left
													</div>
												</div>
											</div>
											<div class="col-sm-6 col-lg-3 mg-t-30 mg-lg-t-0">
												<div class="tooltip tooltip-danger bs-tooltip-right" role="tooltip">
													<div class="arrow"></div>
													<div class="tooltip-inner">
														Tooltip on the right
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="main-content-label main-content-label-sm mg-b-10">
										Live Example
									</div>
									<div class="text-wrap">
										<div class="example">
											<div class="row row-sm tx-center">
												<div class="col-sm-6 col-lg-3">
													<button class="btn ripple btn-primary" data-placement="top" data-toggle="tooltip-primary" title="Tooltip on top" type="button">Hover me</button>
												</div>
												<div class="col-sm-6 col-lg-3 mg-t-30 mg-sm-t-0">
													<button class="btn ripple btn-secondary" data-placement="bottom" data-toggle="tooltip-secondary" title="Tooltip on top" type="button">Hover me</button>
												</div>
												<div class="col-sm-6 col-lg-3 mg-t-30 mg-lg-t-0">
													<button class="btn ripple btn-info" data-placement="left" data-toggle="tooltip-info" title="Tooltip on left" type="button">Hover me</button>
												</div>
												<div class="col-sm-6 col-lg-3 mg-t-30 mg-lg-t-0">
													<button class="btn ripple btn-danger" data-placement="right" data-toggle="tooltip-danger" title="Tooltip on right" type="button">Hover me</button>
												</div>
											</div>
										</div>
<!-- Prism Precode -->
<figure class="highlight clip-widget" id="tooltip2"><pre><code class="language-markup"><script type="html-dashlead/script"><div class="row row-sm tx-center">
	<div class="col-sm-6 col-lg-3">
		<button class="btn ripple btn-primary" data-placement="top" data-toggle="tooltip-primary" title="Tooltip on top" type="button">Hover me</button>
	</div>
	<div class="col-sm-6 col-lg-3 mg-t-30 mg-sm-t-0">
		<button class="btn ripple btn-secondary" data-placement="bottom" data-toggle="tooltip-secondary" title="Tooltip on top" type="button">Hover me</button>
	</div>
	<div class="col-sm-6 col-lg-3 mg-t-30 mg-lg-t-0">
		<button class="btn ripple btn-info" data-placement="left" data-toggle="tooltip-info" title="Tooltip on left" type="button">Hover me</button>
	</div>
	<div class="col-sm-6 col-lg-3 mg-t-30 mg-lg-t-0">
		<button class="btn ripple btn-danger" data-placement="right" data-toggle="tooltip-danger" title="Tooltip on right" type="button">Hover me</button>
	</div>
</div></script></code></pre>
	<div class="clipboard-icon" data-clipboard-target="#tooltip2"><i class="fa fa-clipboard"></i></div>
</figure>
<!-- End Prism Precode -->
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-12 d-none d-xl-block custom-leftnav">
							<div class="main-content-left-components">
								<div class="card custom-card">
									<div class="card-body component-item">
										<nav class="nav flex-column">
											<a class="nav-link" href="#default">Default Tooltip</a>
											<a class="nav-link" href="#colored">Colored Tooltip</a>
										</nav>
									</div>
								</div>
								<div class="card custom-card">
									<div class="card-body text-center">
										<div class="icon-service bg-primary-transparent rounded-circle text-primary">
											<i class="fe fe-user"></i>
										</div>
										<p class="mb-1 text-muted">Total Users</p>
										<h3 class="mb-0">34,789</h3>
									</div>
								</div>
								<div class="card custom-card">
									<div class="card-body text-center">
										<div class="icon-service bg-secondary-transparent rounded-circle text-secondary">
											<i class="fe fe-trending-up"></i>
										</div>
										<p class="mb-1 text-muted">Total Sales</p>
										<h3 class="mb-0">98,674</h3>
									</div>
								</div>
								<div class="card custom-card">
									<div class="card-body text-center">
										<div class="icon-service bg-info-transparent rounded-circle text-info">
											<i class="fe fe-dollar-sign"></i>
										</div>
										<p class="mb-1 text-muted">Total Profits</p>
										<h3 class="mb-0"><span>$</span>45,078</h3>
									</div>
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
<!-- Jquery.mCustomScrollbar js-->
<script src="{{ URL::asset('assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- Clipboard js-->
<script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
<!-- Prism js-->
<script src="{{ URL::asset('assets/plugins/prism/prism.js')}}"></script>
<!-- Tooltip js-->
<script src="{{ URL::asset('assets/js/tooltip.js')}}"></script>
@endsection