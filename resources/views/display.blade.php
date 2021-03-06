@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
					<!-- Page Header -->
					<div class="page-header">
						<div>
							<h2 class="main-content-title tx-24 mg-b-5">Display</h2>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Utilities</a></li>
								<li class="breadcrumb-item active" aria-current="page">Display</li>
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
							<div class="card custom-card" id="basic">
								<div class="card-body">
									<div>
										<h6 class="card-title mb-1">Basic Display</h6>
										<p class="text-muted  card-sub-title">The following display utilities classes will set display property of an element.</p>
									</div>
									<div class="table-responsive">
										<table class="table main-table-reference mt-0 mb-0">
											<thead>
												<tr>
													<th class="wd-30p">Class</th>
													<th class="wd-70p">Description</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><code>.d-inline</code></td>
													<td>Set an inline display property of an element.</td>
												</tr>
												<tr>
													<td><code>.d-inline-block</code></td>
													<td>Set an inline-block display property of an element.</td>
												</tr>
												<tr>
													<td><code>.d-block</code></td>
													<td>Set a block display property of an element.</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="card custom-card" id="hiding">
								<div class="card-body">
									<div>
										<h6 class="card-title mb-1">Hiding Elements</h6>
										<p class="text-muted  card-sub-title">For faster mobile-friendly development, use responsive display classes for showing and hiding elements by device.</p>
									</div>
									<div class="table-responsive">
										<table class="table main-table-reference mt-0 mb-0">
											<thead>
												<tr>
													<th class="wd-40p">Class</th>
													<th class="wd-60p">Screen Size</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><code>.d-none</code></td>
													<td>Hidden on all</td>
												</tr>
												<tr>
													<td><code>.d-none .d-sm-block</code></td>
													<td>Hidden only on xs</td>
												</tr>
												<tr>
													<td><code>.d-sm-none .d-md-block</code></td>
													<td>Hidden only on sm</td>
												</tr>
												<tr>
													<td><code>.d-md-none .d-lg-block</code></td>
													<td>Hidden only on md</td>
												</tr>
												<tr>
													<td><code>.d-lg-none .d-xl-block</code></td>
													<td>Hidden only on lg</td>
												</tr>
												<tr>
													<td><code>.d-xl-none</code></td>
													<td>Hidden only on xl</td>
												</tr>
												<tr>
													<td><code>.d-block</code></td>
													<td>Visible on all</td>
												</tr>
												<tr>
													<td><code>.d-block .d-sm-none</code></td>
													<td>Visible only on xs</td>
												</tr>
												<tr>
													<td><code>.d-none .d-sm-block .d-md-none</code></td>
													<td>Visible only on sm</td>
												</tr>
												<tr>
													<td><code>.d-none .d-md-block .d-lg-none</code></td>
													<td>Visible only on md</td>
												</tr>
												<tr>
													<td><code>.d-none .d-lg-block .d-xl-none</code></td>
													<td>Visible only on lg</td>
												</tr>
												<tr>
													<td><code>.d-none .d-xl-block</code></td>
													<td>Visible only on xl</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-12 d-none d-xl-block custom-leftnav">
							<div class="main-content-left-components">
								<div class="card custom-card">
									<div class="card-body component-item">
										<nav class="nav flex-column">
											<a class="nav-link" href="#basic">Basic</a>
											<a class="nav-link" href="#hiding">Hiding</a>
										</nav>
									</div>
								</div>
								<div class="card custom-card">
									<div class="card-body user-card text-center">
										<div class="main-img-user avatar-lg online text-center">
											<img alt="avatar" class="rounded-circle" src="{{URL::asset('assets/img/users/5.jpg')}}">
										</div>
										<div class="mt-2">
											<h5 class="mb-1">Reynante</h5>
											<p class="mb-1 tx-inverse">Web Developer</p>
											<span class="text-muted"><i class="far fa-check-circle text-success mr-1"></i>Verified</span>
										</div>
										<a href="#" class="btn ripple btn-primary btn-sm mt-3">View Profile</a>
									</div>
								</div>
								<div class="card custom-card">
									<div class="card-body user-card text-center">
										<div class="main-img-user avatar-lg online text-center">
											<img alt="avatar" class="rounded-circle" src="{{URL::asset('assets/img/users/4.jpg')}}">
										</div>
										<div class="mt-2">
											<h5 class="mb-1">Joyce Chua</h5>
											<p class="mb-1 tx-inverse">Team Leader</p>
											<span class="text-muted"><i class="far fa-check-circle text-success mr-1"></i>Verified</span>
										</div>
										<a href="#" class="btn ripple btn-secondary btn-sm mt-3">View Profile</a>
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
@endsection