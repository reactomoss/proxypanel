@extends('layouts.master')
@section('css')
<!---Sweet-Alert css-->
<link href="{{ URL::asset('assets/plugins/sweet-alert/sweetalert.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />
<style>
	.no-data {
		text-align: center;
	}
	.deleteBtn {
		border-radius: 20px;
	}
	.fa-trash {
		font-size: 14px !important;
	}
	#deleteForm {
		display: none;
	}
	#loadingBtn, #loadingBtn1 {
		display: none;
	}
	#randForm {
		display: none;
	}
	.locBtn {
		width: 200px;
	}
	.fa-thumbs-up {
		font-size: 30px;
		position: absolute;
		left: 10px;
		top: 10px;
	}

	#accordion .card .card-header a {
		background-color: white;
		font-size: 1.2em;
		line-height: 1.3;
		font-weight: 600;
		text-align: center;
	}

	#accordion .card .card-header .accordionActive:after {
		content: "\002B";
		float: right;
	}

	#accordion .card .card-header .accordionDeactive:after {
		content: "\2212";
		float: right;
	}

	#accordion .card .card-header {
		border: 0;
		position: relative;
	}

	#accordion .card .card-header i {
		position: absolute;
		font-size: 17px;
		top: 15px;
    	right: 17px;
	}

	#accordion .card .card-body {
		border: 0;
	}

	#accordion .card {
		border-bottom: 1.5px solid rgba(159, 165, 169, 0.2);
	}

	.priceCard {
		border: 1px solid rgba(159, 165, 169, 0.2);
		border-radius: 1rem;
		padding: 1rem;
		box-shadow: rgb(0 25 40 / 10%) 0px 0px 0.1rem 0px, rgb(0 27 41 / 10%) 0px 0rem 0.3rem 0px;
	}

	.priceButton {
		border: 2px solid;
		border-radius: 14px;
		height: 48px;
	}
	.priceType span:nth-child(2) {
		color: rgb(159, 165, 169);
		font-size: 1.5em;
	}
	.priceType span:nth-child(1) {
		font-size: 2rem;
		line-height: 1.22;
		color: rgb(64, 64, 64);
		font-weight: 600;
	}
	.activeColor {
		color: rgb(255, 144, 0);
	}
</style>
@endsection
@section('page-header')
<!-- Page Header -->
<div class="page-header">
	<div>
	</div>
	<div class="btn btn-list">
		<a class="btn ripple btn-info" href="javascript:void(0)" data-target="#modaldemo2" data-toggle="modal">
			<i class="fe fe-help-circle"></i> Help
		</a>
	</div>
</div>
<!-- End Page Header -->
@endsection
@section('content')

<div class="container mb-5" style="max-width: 1000px; margin: 0 auto;">
	<div class="row">
		<div class="col-lg-6">
			<h1>4G Mobile Proxy</h1>
			<span style="font-size: 1.1rem;font-weight: 300;">4G Mobile proxy. Rotating new clear mobile IP every 5 min. HTTP/HTTPS or SOCKS connection. Mobile proxies have direct connection to mobile network, your accounts never will be blocked. USA, Europe or UK mobile proxy 4G LTE / 3G connections and mixed mobile carriers and cities. 4G proxy can be used with Chrome, Firefox, Safari or any other browser or application (jarvee, instagram, telegram etc).</span>
		</div>
		<div class="col-lg-6">
			<img src="land/images/mobile-proxy.svg" class="img-fluid" style="max-width:70%;">
		</div>
	</div>
</div>

<!-- Row -->
<div class="row">
	<div class="col-lg-12">
		<div class="card custom-card">
			<div class="card-body">
				<h2>4G proxy service</h2>
				<span style="font-size: 1rem;font-weight: 300;">Mobile proxies will be locked by ip, username and password, you will get personal IP:PORT. Max dedicated 4G proxy internet connection speed up to 60mbps. Some mobile proxy has unlimited internet data. Anonymous, unique and clear mobile proxy. Get up to 40000 Mobile IP month / per connection. SOCKS5 and mobile ip IPv4. All our proxy has auto renewal option. Mobile proxy more reliable than standard proxy. Simple switch between http, https, socks5</span>
				<br><br>
				@if(session('id'))
					<div class="row">
						<div class="col-md-6">
						</div>
						<div class="col-md-6 text-right my-2">
							@if(session('id'))
								<button class="modal-effect btn ripple btn-primary" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">
									Buy
								</button>
							@else
								<a class="btn btn-primary ripple" href="{{url('/login')}}">Buy</a>
							@endif
							<!-- <button class="modal-effect btn ripple btn-primary" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">
								Buy
							</button> -->
						</div>
						<!-- <p class="text-muted card-sub-title">To enable a hover state on table rows.</p> -->
					</div><br>
					<div class="table-responsive">
						<table class="table table-hover mg-b-0">
							<thead>
								<tr>
									<th width="20%" class="text-center">City</th>
									<th width="7%" class="text-center">Rotation</th>
									<th width="7%" class="text-center">Change IP</th>
									<th width="7%" class="text-center">Ip Auth</th>
									<th width="25%" class="text-center">Host</th>
									<th width="7%" class="text-center">Name</th>
									<th width="10%" class="text-center">Password</th>
									<th width="10%" class="text-center">Next Billing</th>
									<th width="10%" class="text-center">Status</th>
									<th width="7%" class="text-center"></th>
								</tr>
							</thead>
							<tbody>
								@if (count($ports) > 0)
									@foreach ($ports as $p) 
										<tr>
											<td class="text-center" style="vertical-align: middle">
												<input type="hidden" value="{{$p->id}}">
												<button class="btn ripple btn-primary btn-sm mb-1 locationBtn">
													@if ($p->city == '*')
														Select Location
													@else
														{{$p->city}}
													@endif
												</button><br>
												<input type="hidden" value="{{$p->lastchangecitydate}}">
												<input type="hidden" value="{{$p->id}}">
												<button class="btn ripple btn-primary btn-sm mb-1 randBtn" city="{{$p->city}}">
													Random Location
												</button>
												<button class="btn ripple btn-primary btn-sm mb-1" id="loadingBtn1" disabled type="button">
													<span aria-hidden="true" class="spinner-border spinner-border-sm" role="status"></span>
												</button>
											</td>
											<td class="text-center" style="vertical-align: middle">
												@if (!$p->rotation)
													No<br>Rotations
												@else
													{{$p->rotation}}
												@endif
											</td>
											<td class="text-center" style="vertical-align: middle">
												<input type="hidden" value="{{$p->lastchangeipdate}}">
												<input type="hidden" value="{{$p->id}}">
												<input type="hidden" value="{{$p->username.'.'.$p->groupname}}">
												<button class="btn btn-success btn-icon changeIPBtn" style=" margin: auto; border-radius: 20px" title="Change IP">
													<i class="fa fa-sync"></i>
												</button>
												<div class="spinner-border text-success" role="status" style="display: none">
													<span class="sr-only">Loading...</span>
												</div>
											</td>
											<td class="text-center" style="vertical-align: middle;">
												<input type="hidden" value="{{$p->fwdauthips}}">
												<input type="hidden" value="{{$p->id}}">
												<a class="modal-effect btn btn-success btn-sm openIPAuthBtn" data-effect="effect-scale" data-toggle="modal" href="#modaldemo9">
													IPv4 List
												</a>
											</td>
											<td class="text-center" style="vertical-align: middle">
												<div class="hostBtn1">http: 66.42.95.53:8080</div>
												<div class="hostBtn1">socks5: 66.42.95.53:9090</div>
												@if($p->fwdauthips)
													<div class="hostBtn2">socks5: 66.42.95.53:10072</div>
												@endif
											</td>
											<td class="text-center" style="vertical-align: middle">
												{{$p->username}}.{{$p->groupname}}
											</td>
											<td class="text-center" style="vertical-align: middle">
												{{$p->pass}}
											</td>
											<td class="text-center" style="vertical-align: middle">
												{{$p->paidtill}}<br>
												@if($p->paidtill <= $current)
													<input type="hidden" value="{{$p->id}}">
													<a class="modal-effect btn btn-success btn-sm payBtn" data-effect="effect-scale" data-toggle="modal" href="#modaldemo10">
														Renew
													</a>
												@endif
											</td>
											<td class="text-center" style="vertical-align: middle">
												@if($p->paidtill > $current)
													<i class="fa fa-check text-success"></i>
												@else
													<i class="fa fa-times text-danger"></i>
												@endif
											</td>
											<td class="text-center" style="vertical-align: middle">
												@if($p->paidtill <= $current)
													<input type="hidden" value="{{$p->id}}">
													<button class="btn ripple btn-danger btn-icon deleteBtn" title="delete">
														<i class="fa fa-trash"></i>
													</button>
												@endif
											</td>
										</tr>
									@endforeach
								@else
									<tr>
										<td colspan="20" class="no-data">No data</td>
									</tr>
								@endif
							</tbody>
						</table>
					</div>
				@else
					<div style="width: 100%;text-align:center">
						<a class="btn btn-success ripple" href="{{url('/login')}}" style="width: 250px">Buy Now</a>
					</div>
				@endif
			</div>
		</div>
	</div>
</div>
<!-- End Row -->

<div class="row my-5">
	<div class="col-md-12">
		<h1 class="text-center">Locations</h1>
	</div>
	<div class="col-md-6 text-right my-2">
		<a class="btn btn-primary locBtn" href="{{url('/showLocations')}}">Denver</a>
	</div>
	<div class="col-md-6 text-left my-2">
		<a class="btn btn-primary locBtn" href="{{url('/showLocations')}}">Los Angeles</a>
	</div>
	<div class="col-md-6 text-right my-2">
		<a class="btn btn-primary locBtn" href="{{url('/showLocations')}}">Dallas</a>
	</div>
	<div class="col-md-6 text-left my-2">
		<a class="btn btn-primary locBtn" href="{{url('/showLocations')}}">New York</a>
	</div>
	<div class="col-md-6 text-right my-2">
		<a class="btn btn-primary locBtn" href="{{url('/showLocations')}}">Atlanta</a>
	</div>
	<div class="col-md-6 text-left my-2">
		<a class="btn btn-primary locBtn" href="{{url('/showLocations')}}">Seattle</a>
	</div>
	<div class="col-md-6 text-right my-2">
		<a class="btn btn-primary locBtn" href="{{url('/showLocations')}}">Orlando</a>
	</div>
	<div class="col-md-6 text-left my-2">
		<a class="btn btn-primary locBtn" href="{{url('/showLocations')}}">Philadelphia</a>
	</div>
	<div class="col-md-6 text-right my-2">
		<a class="btn btn-primary locBtn" href="{{url('/showLocations')}}">Portland</a>
	</div>
	<div class="col-md-6 text-left my-2">
		<a class="btn btn-primary locBtn" href="{{url('/showLocations')}}">Helena</a>
	</div>
	<div class="col-md-6 text-right my-2">
		<a class="btn btn-primary locBtn" href="{{url('/showLocations')}}">Chicago</a>
	</div>
	<div class="col-md-6 text-left my-2">
		<a class="btn btn-primary locBtn" href="{{url('/showLocations')}}">Birmingham</a>
	</div>
	<div class="col-md-6 text-right my-2">
		<a class="btn btn-primary locBtn" href="{{url('/showLocations')}}">Cleveland</a>
	</div>
	<div class="col-md-6 text-left my-2">
		<a class="btn btn-primary locBtn" href="{{url('/showLocations')}}">Pensacola</a>
	</div>
</div>

<div class="mt-5">
	<h1 class="text-center">Pricing</h1>
</div>
<div class="row" style="margin: 0 auto">
	<div class="col-md-2"></div>
	<div class="col-md-4">
		<div class="card priceCard">
			<div class="card-body">
				<h3 class="activeColor">Monthly</h3>
				<p class="font-weight-bold">The easiest way to get started with Apify. Forever free, but with limits.</p>
				<p class="priceType">
					<span>$175</span>
					<span class="ml-1"> / Month</span>
				</p>
				<p>
					<i class="fa fa-check mr-3 activeColor"></i>
					$5 platform usage credits
				</p>
				<p>
					<i class="fa fa-check mr-3 activeColor"></i>
					$5 platform usage credits
				</p>
				<p>
					<i class="fa fa-check mr-3 activeColor"></i>
					$5 platform usage credits
				</p>
				<p>
					<i class="fa fa-check mr-3 activeColor"></i>
					$5 platform usage credits
				</p>
				<p>
					<i class="fa fa-check mr-3 activeColor"></i>
					$5 platform usage credits
				</p>
				<a href="{{url('/dashboard')}}" class="btn btn-block ripple priceButton mt-3 activeColor">Order Now</a>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card priceCard">
			<div class="card-body">
				<h3>Weekly</h3>
				<p class="font-weight-bold">The easiest way to get started with Apify. Forever free, but with limits.</p>
				<p class="priceType">
					<span>$75</span>
					<span class="ml-1"> / Week</span>
				</p>
				<p>
					<i class="fa fa-check mr-3"></i>
					$5 platform usage credits
				</p>
				<p>
					<i class="fa fa-check mr-3"></i>
					$5 platform usage credits
				</p>
				<p>
					<i class="fa fa-check mr-3"></i>
					$5 platform usage credits
				</p>
				<p>
					<i class="fa fa-check mr-3"></i>
					$5 platform usage credits
				</p>
				<p>
					<i class="fa fa-check mr-3"></i>
					$5 platform usage credits
				</p>
				<a href="{{url('/dashboard')}}" class="btn btn-block ripple priceButton mt-3">Order Now</a>
			</div>
		</div>
	</div>
</div>

<div class="row my-5">
	<div class="col-sm-12 col-md-12">
		<div class="card custom-card">
			<div class="card-body">
				<h1 class="text-center">Frequently asked questions</h1>
				<br>
				<div aria-multiselectable="true" class="accordion" id="accordion" role="tablist">
					<div class="card">
						<div class="card-header collapseCardHeader" count="0" id="headingOne" role="tab">
							<a class="accordionDeactive" aria-controls="collapseOne" aria-expanded="true" data-toggle="collapse" href="#collapseOne">1.How To Insert All The Plugins?</a>
						</div>
						<div aria-labelledby="headingOne" class="collapse show" data-parent="#accordion" id="collapseOne" role="tabpanel">
							<div class="card-body">
								I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header collapseCardHeader" count="0" id="headingTwo" role="tab">
							<a class="accordionActive" aria-controls="collapseTwo" aria-expanded="false" class="collapsed" data-toggle="collapse" href="#collapseTwo">2.How Can I contact?</a>
						</div>
						<div aria-labelledby="headingTwo" class="collapse" data-parent="#accordion" id="collapseTwo" role="tabpanel">
							<div class="card-body">
								I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-header collapseCardHeader" count="0" id="headingThree" role="tab">
							<a class="accordionActive" aria-controls="collapseThree" aria-expanded="false" class="collapsed" data-toggle="collapse" href="#collapseThree">3.Can I use this Plugins in Another Template?</a>
						</div>
						<div aria-labelledby="headingThree" class="collapse" data-parent="#accordion" id="collapseThree" role="tabpanel">
							<div class="card-body">
								I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences
							</div>
						</div><!-- collapse -->
					</div>
					<div class="card">
						<div class="card-header collapseCardHeader" count="0" id="headingfour" role="tab">
							<a class="accordionActive" aria-controls="collapsefour" aria-expanded="false" class="collapsed" data-toggle="collapse" href="#collapsefour">4.How Can I Add another page in Template?</a>
						</div>
						<div aria-labelledby="headingfour" class="collapse" data-parent="#accordion" id="collapsefour" role="tabpanel">
							<div class="card-body">
								I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences
							</div>
						</div><!-- collapse -->
					</div>
					<div class="card">
						<div class="card-header collapseCardHeader" count="0" id="headingfive" role="tab">
							<a class="accordionActive" aria-controls="collapsefive" aria-expanded="false" class="collapsed" data-toggle="collapse" href="#collapsefive">5.It is Easy to Customizable?</a>
						</div>
						<div aria-labelledby="headingfive" class="collapse" data-parent="#accordion" id="collapsefive" role="tabpanel">
							<div class="card-body">
								I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences
							</div>
						</div><!-- collapse -->
					</div>
					<div class="card">
						<div class="card-header collapseCardHeader" count="0" id="headingsix" role="tab">
							<a class="accordionActive" aria-controls="collapsesix" aria-expanded="false" class="collapsed" data-toggle="collapse" href="#collapsesix">6.How can I download This template?</a>
						</div>
						<div aria-labelledby="headingsix" class="collapse" data-parent="#accordion" id="collapsesix" role="tabpanel">
							<div class="card-body">
								I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences
							</div>
						</div><!-- collapse -->
					</div>
				</div><!-- accordion -->
			</div>
		</div>
	</div>
</div>
<!-- Modal effects -->
<div class="modal" id="modaldemo10">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content modal-content-demo">
			<input type="hidden" value="" name="payId" id="payId">
			<div class="modal-header">
				<h6 class="modal-title">Payment</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<h6 class="font-weight-bold">Order # <span id="paySpan"></span></h6>
				<label class="rdiobox"><input name="rdio" id="typeMonth" type="radio" value="monthly" checked> <span>Monthly | $175</span></label>
				<label class="rdiobox"><input name="rdio" id="typeWeek" type="radio" value="weekly"> <span>Weekly | $75</span></label>
				<!-- <label class="rdiobox"><input name="rdio" id="typeDay" type="radio" value="daily"> <span>Daily | $20</span></label>
				<label class="rdiobox"><input name="rdio" id="typeHour" type="radio" value="hour"> <span>One Hour | $10</span></label> -->
				<label class="rdiobox"><input name="rdio" id="typeTest" type="radio" value="test"> <span>test(weekly) | $0.01</span></label>
			</div>
			<div class="modal-footer">
				<button class="btn ripple btn-success" type="button" id="proceedPay">Pay by PayPal</button>
				<button class="btn ripple btn-success" style="display: none" disabled type="button"><span aria-hidden="true" class="spinner-border spinner-border-sm" role="status"></span> Saving...</button>
				<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal effects-->

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="payForm" style="display:none">
	<input type="hidden" name="cmd" value="_xclick" id="id_cmd">
	<input type="hidden" name="charset" value="utf-8" id="id_charset">
	<input type="hidden" name="currency_code" value="USD" id="id_currency_code">
	<input type="hidden" name="no_shipping" value="1" id="id_no_shipping">
	<input type="hidden" name="business" value="vpnrgr@gmail.com" id="id_business">
	<input type="hidden" name="amount" value="100" id="id_amount">
	<input type="hidden" name="item_name" value="100$" id="id_item_name">
	<!-- <input type="hidden" name="invoice" value="invoice-1-1534-1079-9" id="id_invoice"> -->
	<input type="hidden" name="notify_url" value="{{route('notify')}}" id="id_notify_url">
	<input type="hidden" name="rm" value="1" id="id_rm">
	<input type="hidden" name="return" value="{{route('success')}}" id="id_return">
	<input type="hidden" name="cancel_return" value="{{url('cancel')}}" id="id_cancel_return">
	<input type="hidden" name="custom" value="premium_plan" id="id_custom">
	<div class="form-group">
		<input class="btn btn-primary" type="submit" value="Test pay 100$">
	</div>
</form>

<!-- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="payForm" style="display:none">
	<input type="hidden" name="cmd" value="_xclick" id="id_cmd">
	<input type="hidden" name="charset" value="utf-8" id="id_charset">
	<input type="hidden" name="currency_code" value="USD" id="id_currency_code">
	<input type="hidden" name="no_shipping" value="1" id="id_no_shipping">
	<input type="hidden" name="business" value="sb-1b2tq5457191@business.example.com" id="id_business">
	<input type="hidden" name="amount" value="100" id="id_amount">
	<input type="hidden" name="item_name" value="test" id="id_item_name">
	<input type="hidden" name="notify_url" value="{{route('notify')}}" id="id_notify_url">
	<input type="hidden" name="rm" value="1" id="id_rm">
	<input type="hidden" name="return" value="{{route('success')}}" id="id_return">
	<input type="hidden" name="cancel_return" value="{{url('cancel')}}" id="id_cancel_return">
	<input type="hidden" name="custom" value="premium_plan" id="id_custom">
	<div class="form-group">
		<button class="btn ripple btn-primary" type="submit">Test 100$</button>
	</div>
</form> -->

<!-- Modal effects -->
<div class="modal" id="modaldemo9">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content modal-content-demo">
			<div class="modal-body">
				<br>
				<form method="post" action="{{route('changeAuthIP')}}" id="ipAuthForm">
					@csrf
					<div class="form-group">
						<input type="hidden" id="idForAuth" name="id">
						<p class="mg-b-10">IPv4 whitelist</p>
						<input type="text" class="form-control" name="ip" placeholder="IPv4" id="ipAuthInput">
						<p class="text-muted card-sub-title">Enter comma seperated IPv4 addresses</p>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn ripple btn-primary" type="button" id="ipAuthBtn">Save</button>
				<button class="btn ripple btn-primary" style="display: none" disabled type="button"><span aria-hidden="true" class="spinner-border spinner-border-sm" role="status"></span> Saving...</button>
				<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal effects-->

<!-- Modal effects -->
<div class="modal" id="modaldemo8">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content modal-content-demo">
			<form method="post" action="{{route('addProxy')}}" id="addProxyForm">
				@csrf
				<div class="modal-body">
					<p class="mg-b-5">Name: </p>
					<input type="text" class="form-control" name="name" id="proxyName" value="Proxy{{count($ports) + 1}}" required>
					<p class="text-muted card-sub-title">A unique alphanumeric name for this proxy</p>
					<button class="btn ripple btn-primary submitBtn" style="display: none"></button>
				</div>
				<div class="modal-footer">
					<button class="btn ripple btn-primary" id="addProxyBtn" type="button">Save</button>
					<button class="btn ripple btn-primary" id="loadingBtn" disabled type="button"><span aria-hidden="true" class="spinner-border spinner-border-sm" role="status"></span> Saving...</button>
					<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Modal effects-->

<form method="post" action="{{route('deleteProxy')}}" id="deleteForm">
	@csrf
	<input type="text" name="id" value="0" id="deleteId">
</form>

<form action="{{route('randomLocation')}}" method="post" id="randForm">
	@csrf
	<input type="hidden" name="id" value="0" id="randInput">
</form>

<form action="{{route('changeIp')}}" method="post" id="changeIpForm">
	@csrf
	<input type="hidden" name="userInfo" value="0" id="userInfo">
	<input type="hidden" name="portId" value="0" id="portId">
</form>

<!-- Small modal -->
<div class="modal" id="modaldemo2">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title"><i class="fe fe-help-circle text-info" style="font-size:45px"></i></h6>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<p class="tx-16"><span class="text-primary">Skype:</span> live:support_56965</p>
				<p class="tx-16"><span class="text-primary">Email:</span> support@proxypanel.io</p>
			</div>
		</div>
	</div>
</div>
<!-- End Small Modal -->
</div>
</div>
<!-- End Main Content-->
@endsection
@section('js')
<!-- Sweet-Alert js-->
<script src="{{ URL::asset('assets/plugins/sweet-alert/sweetalert.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/sweet-alert/dark-jquery.sweet-alert.js')}}"></script>
<script src="{{ URL::asset('assets/js/modal.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		<?php if (session('delete-success')){?>
			toastr.success("{{session('delete-success')}}", "Success")
		<?php } else if (session('delete-failed')){?>
			toastr.error("{{session('delete-failed')}}", "Error")
		<?php }?>

		<?php if (session('paymentSuccess')){?>
			toastr.success("{{session('paymentSuccess')}}.\n Date will be updated after some time", "Success")
		<?php } else if (session('paymentCancel')){?>
			toastr.info("{{session('paymentCancel')}}", "Info")
		<?php } else if (session('paymentFailed')){?>
			toastr.error("{{session('paymentFailed')}}", "error")
		<?php }?>

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		})

		$(".locationBtn").click(function(){
			const id = $(this).prev().val()
			window.location = "{{url('/location_')}}?id=" + id
		})

		$(".randBtn").click(function(){
			const cityName = $(this).attr('city')

			const lastDate = $(this).prev().prev().val()
			const last = new Date(lastDate)
			const d1 = new Date()
			const now = new Date(d1.getUTCFullYear(), d1.getUTCMonth(), d1.getUTCDate(), d1.getUTCHours(), d1.getUTCMinutes(), d1.getUTCSeconds())

			const diff = (now.getTime() - last.getTime()) / 1000;
			if (cityName != '*' && diff < 180) {
				const seconds = 180 - diff
				const min = Math.ceil(seconds / 60)
				toastr.info("You can change this location after " + min + " minutes.")
			} else {
				const id = $(this).prev().val()
				$(this).hide()
				$(this).next().show()
				$("#randInput").val(id)
				$("#randForm").submit()
			}
		})

		$(".hostBtn").click(function(){
			swal("Success!", "Copied", "success");
		})

		$(".deleteBtn").click(function(){
			const id = $(this).prev().val()

			swal({
				title: "Are you sure?",
				text: "Delete",
				type: "warning",
				showCancelButton: true,
				confirmButtonText: 'Yes, delete it!',
				closeOnConfirm: false,
			},
			function(){
				$("#deleteId").val(id)
				$("#deleteForm").submit();
				swal.close()
			});
		})

		$("#addProxyBtn").click(function(){
			const name = $("#proxyName").val()
			if (name) {
				$(this).hide()
				$("#loadingBtn").show()
			}
			$(".submitBtn").click()
		})

		$(".changeIPBtn").click(function(){
			const lastDate = $(this).prev().prev().prev().val()
			const last = new Date(lastDate)
			const d1 = new Date()
			const now = new Date(d1.getUTCFullYear(), d1.getUTCMonth(), d1.getUTCDate(), d1.getUTCHours(), d1.getUTCMinutes(), d1.getUTCSeconds())

			const diff = (now.getTime() - last.getTime()) / 1000;
			if (diff < 180) {
				const seconds = 180 - diff
				const min = Math.ceil(seconds / 60)
				toastr.info("You can change Ip after " + min + " minutes.")
				return
			}
			$(this).hide()
			$(this).next().show()

			const id = $(this).prev().prev().val()
			const userInfo = $(this).prev().val()
			
			$("#userInfo").val(userInfo)
			$("#portId").val(id)
			$("#changeIpForm").submit()
		})

		$(".payBtn").click(function() {
			const id = $(this).prev().val()
			$("#payId").val(id)
			$("#paySpan").html(id)
		})

		$("#proceedPay").click(function() {
			const month = $("#typeMonth").is(':checked');
			const week = $("#typeWeek").is(':checked');
			const day = $("#typeDay").is(':checked');
			const hour = $("#typeHour").is(':checked');
			const test = $("#typeTest").is(':checked');

			const id = $("#payId").val()

			let amount = 0
			let item_name = ''
			if (month) {
				amount = 175
				item_name = 'monthly | $175 | order | ' + id
			} else if (week) {
				amount = 75
				item_name = 'weekly | $75 | order | ' + id
			} else if (day) {
				amount = 20
				item_name ='daily | $20 | order | ' + id
			} else if (hour) {
				amount = 10
				item_name ='hour | $10 | order | ' + id
			} else if (test) {
				amount = 0.01
				item_name ='test | $0.01 | order | ' + id
			}

			$(this).hide()
			$(this).next().show()

			$("#id_amount").val(amount)
			$("#id_item_name").val(item_name)
			$("#payForm").submit()
		})

		$(".openIPAuthBtn").click(function () {
			const id = $(this).prev().val()
			const ips = $(this).prev().prev().val()
			$("#idForAuth").val(id)
			$("#ipAuthInput").val(ips)
		})

		function ValidateIPaddress(ipaddress) 
		{
			if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(ipaddress))
			{
				return (true)
			}
			return (false)
		}

		$("#ipAuthBtn").click(function() {
			const ip = $("#ipAuthInput").val()
			if (!ip) {
				toastr.error("Please input ip address", "Error")
				return
			} else {
				const ips = ip.split(',')
				for(let i in ips) {
					const item = ips[i].trim()
					if (!ValidateIPaddress(item)) {
						toastr.error("Please input valid ip address", "Error")
						return
					}
				}
			}
			$(this).hide()
			$(this).next().show()
			$("#ipAuthForm").submit()
		})

		// $("#accordion i").click(function(e) {
		// })

		$(".collapseCardHeader").click(function() {
			const aTag = $(this).children().eq(0)
			const expand = aTag.attr('aria-expanded')
			if(expand == 'false') {
				$(".collapseCardHeader a").attr('class', 'accordionActive')
				aTag.attr('class', 'accordionDeactive')
			} else {
				// $(".collapseCardHeader a").attr('class', 'accordionActive')
				aTag.attr('class', 'accordionActive')
			}
		})
	}) 
</script>
@endsection