@extends('layouts.header')
@section('content')
<div class="wrapper-inline" style="background-image: linear-gradient(#D2CCC4, #2F4353);">

	<main>
		<link rel="stylesheet" href="/assets/chart/css/jquery.jOrgChart.css" />
		<link rel="stylesheet" href="/assets/chart/css/custom1.css" />
		<link href="/assets/chart/css/prettify.css" type="text/css" rel="stylesheet" />
		<script type="text/javascript" src="/assets/chart/jquery.min.js"></script>
		<script type="text/javascript" src="/assets/chart/jquery-ui.min.js"></script>
		<script type="text/javascript" src="/assets/chart/prettify.js"></script>
		<style>
			.tip {
				display: none;
				width: 100px;
				height: 100px;
				line-height: 100px;
				text-align: center;
				background-color: orange;
			}
		</style>
		<style>

		/* The Modal (background) */
		.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		background-color: #fefefe;
		margin: auto;
		padding: 20px;
		border: 1px solid #888;
		width: 80%;
		}

		/* The Close Button */
		.close {
		color: #aaaaaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
		}

		.close:hover,
		.close:focus {
		color: #000;
		text-decoration: none;
		cursor: pointer;
		}
		</style>
		<style>
		.ptitle{
			font-size:12px;
		}
		.ptext{
			font-size:11px;
		}

		.btn-info{
			background:#980102;
		}
		i.fa.fa-book{
			color:white;
		}
		</style>
		<!-- jQuery includes -->


		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-card margin-b-30">
					<!-- Start .panel -->
					<div class="panel-heading">
						<h4 class="panel-title">
							Genealogy Tree
						</h4>
						<div class="panel-actions">
							<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
							<a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
						</div>
					</div>
					<div class="panel-body" style=" overflow:scroll;">
						<form id="formtree" action='/web/team/node' method="get">

							<div class="row">
								<div class="col-md-3">
									<div class="input-group">
										<input id="username" name="username" type="text" class="form-control" />
										<span class="input-group-btn">
											<button class="btn blue" type="submit" id='search_user' style="background:#980102">
												<font color="white">
													{{ __('site.SEARCH') }}
												</font>
											</button>
										</span>
									</div>
								</div>
								<div class="col-md-3">
									<button class="btn blue" type="button" id='up_level' style="background:#980102">
										<font color="white">
											{{ __('site.Up_One_Level') }}
										</font>
									</button>
									<button class="btn blue" type="button" id='refresh' style="background:#980102">
										<font color="white">
											{{ __('site.Top') }}
										</font>
									</button>
								</div>
							</div>
						</form>
						<ul id="org" style="display:none">
							<li>

								<img data-username="{{ $chart[0]['username']}}" class="sss"
									src="{{ $chart[0]['image']}}" style="width:70px"></img>
								<p>{{ $chart[0]['username']}}</p>

								<div class="ptitle">{{ __('site.Total_CV') }}</div>
								<div class="ptext">{{ $chart[0]['total_lv']}}|{{ $chart[0]['total_rv']}}</div>


								<p text-align="center">
								<div class="ptitle">{{ __('site.Balance_CV') }}</div>
								<div class="ptext">{{ $chart[0]['left_point']}}|{{ $chart[0]['right_point']}}</div>
								</p>
								<a onclick='show_detail({{ $chart[0]["parrent"]}},"{{ $chart[0]["username"]}}","{{ $chart[0]["package"]}}",{{ $chart[0]["left_point"]}},{{ $chart[0]["right_point"]}},{{ $chart[0]["total_lv"]}},{{ $chart[0]["total_rv"]}})'
															class="btn btn-info btn-circle added"><i
																class="fa fa-book"></i></a>

								<ul>

									<li>
										@if( $chart[1]['username'])
										<img data-username="{{ $chart[1]['username']}}" src="{{ $chart[1]['image']}}"
											style="width:70px" onclick="check_user({{ $chart[1]['parrent']}})"></img>

										<p>{{ $chart[1]['username']}}</p>
										<div class="ptitle">{{ __('site.Total_CV') }}</div>
										<div class="ptext"> {{ $chart[1]['total_lv']}}|{{ $chart[1]['total_rv']}}</div>


										<p text-align="center">
										<div class="ptitle">{{ __('site.Balance_CV') }}</div>
										<div class="ptext"> {{ $chart[1]['left_point']}}|{{ $chart[1]['right_point']}}</div>

										</p>

										<a onclick='show_detail({{ $chart[1]["parrent"]}},"{{ $chart[1]["username"]}}","{{ $chart[1]["package"]}}",{{ $chart[1]["left_point"]}},{{ $chart[1]["right_point"]}},{{ $chart[1]["total_lv"]}},{{ $chart[1]["total_rv"]}})'
															class="btn btn-info btn-circle added"><i
																class="fa fa-book"></i></a>
										@else

										<img data-username="{{ $chart[1]['username']}}" src="/images/package/empty.png"
											style="width:70px"></img>
										<p></p>
										<!-- <button onclick="click_choose(this.value,'A')"
											value="{{ $chart[0]['username']}}" class="btn btn-success btn-circle added"
											data-jid="aaaaa"><i class="fa fa-plus"></i></button> -->

										@endif

										<ul>
											<li>
												@if( $chart[3]['username'])
												<img data-username="{{ $chart[3]['username']}}"
													src="{{ $chart[3]['image']}}" style="width:70px" onclick="check_user({{ $chart[3]['parrent']}})"></img>
												<p>{{ $chart[3]['username']}}</p>
												<div class="ptitle">{{ __('site.Total_CV') }}</div>
												<div class="ptext">{{ $chart[3]['total_lv']}}|{{ $chart[3]['total_rv']}}</div>


												<p text-align="center">
												<div class="ptitle">{{ __('site.Balance_CV') }}</div>
												<div class="ptext">{{ $chart[3]['left_point']}}|{{ $chart[3]['right_point']}}</div>

												</p>

												<a onclick='show_detail({{ $chart[3]["parrent"]}},"{{ $chart[3]["username"]}}","{{ $chart[3]["package"]}}",{{ $chart[3]["left_point"]}},{{ $chart[3]["right_point"]}},{{ $chart[3]["total_lv"]}},{{ $chart[3]["total_rv"]}})'
															class="btn btn-info btn-circle added"><i
																class="fa fa-book"></i></a>
												@else

												<img data-username="{{ $chart[3]['username']}}"
													src="/images/package/empty.png" style="width:70px"></img>
												<p></p>
												<!-- <button onclick="click_choose(this.value,'A')"
													value="{{ $chart[1]['username']}}"
													class="btn btn-success btn-circle added" data-jid="aaaaa"><i
														class="fa fa-plus"></i></button> -->

												@endif

												<ul>
													<li>
														@if( $chart[7]['username'])
														<img data-username="{{ $chart[7]['username']}}"
															src="{{ $chart[7]['image']}}" style="width:70px" onclick="check_user({{ $chart[7]['parrent']}})"></img>
														<p>{{ $chart[7]['username']}}</p>

														<div class="ptitle">{{ __('site.Total_CV') }}</div>
														<div class="ptext">{{ $chart[7]['total_lv']}}|{{ $chart[7]['total_rv']}}</div>


														<p text-align="center">
														<div class="ptitle">{{ __('site.Balance_CV') }}</div>
														<div class="ptext">{{ $chart[7]['left_point']}}|{{$chart[7]['right_point']}}</div>

														</p>

														<a onclick='show_detail({{ $chart[7]["parrent"]}},"{{ $chart[7]["username"]}}","{{ $chart[7]["package"]}}",{{ $chart[7]["left_point"]}},{{ $chart[7]["right_point"]}},{{ $chart[7]["total_lv"]}},{{ $chart[7]["total_rv"]}})'
															class="btn btn-info btn-circle added"><i
																class="fa fa-book"></i></a>
														@else

														<img data-username="{{ $chart[7]['username']}}"
															src="/images/package/empty.png" style="width:70px"></img>
														<p></p>
														<!-- <button onclick="click_choose(this.value,'A')"
															value="{{ $chart[3]['username']}}"
															class="btn btn-success btn-circle added" data-jid="aaaaa"><i
																class="fa fa-plus"></i></button> -->

														@endif

													</li>
													<li>
														@if( $chart[8]['username'])
														<img data-username="{{ $chart[8]['username']}}"
															src="{{ $chart[8]['image']}}" style="width:70px" onclick="check_user({{ $chart[8]['parrent']}})"></img>
														<p>{{ $chart[8]['username']}}</p>

														<div class="ptitle">{{ __('site.Total_CV') }}</div>
														<div class="ptext">{{ $chart[8]['total_lv']}}|{{ $chart[8]['total_rv']}}</div>

														<p text-align="center">
														<div class="ptitle">{{ __('site.Balance_CV') }}</div>
														<div class="ptext">{{ $chart[8]['left_point']}}|{{$chart[8]['right_point']}}</div>

														</p>

														<a onclick='show_detail({{ $chart[8]["parrent"]}},"{{ $chart[8]["username"]}}","{{ $chart[8]["package"]}}",{{ $chart[8]["left_point"]}},{{ $chart[8]["right_point"]}},{{ $chart[8]["total_lv"]}},{{ $chart[8]["total_rv"]}})'
															class="btn btn-info btn-circle added"><i
																class="fa fa-book"></i></a>
														@else

														<img data-username="{{ $chart[8]['username']}}"
															src="/images/package/empty.png" style="width:70px"></img>
														<p></p>
														<!-- <button onclick="click_choose(this.value,'B')"
															value="{{ $chart[3]['username']}}"
															class="btn btn-success btn-circle added" data-jid="aaaaa"><i
																class="fa fa-plus"></i></button> -->

														@endif
													</li>
												</ul>
											</li>
											<li>
												@if( $chart[4]['username'])
												<img data-username="{{ $chart[4]['username']}}"
													src="{{ $chart[4]['image']}}" style="width:70px" onclick="check_user({{ $chart[4]['parrent']}})"></img>
												<p>{{ $chart[4]['username']}}</p>

												<div class="ptitle">{{ __('site.Total_CV') }}</div>
												<div class="ptext">{{ $chart[4]['total_lv']}}|{{ $chart[4]['total_rv']}}</div>


												<p text-align="center">

												<div class="ptitle">{{ __('site.Balance_CV') }}</div>
												<div class="ptext">{{ $chart[4]['left_point']}}|{{ $chart[4]['right_point']}}</div>

												</p>

												<a onclick='show_detail({{ $chart[4]["parrent"]}},"{{ $chart[4]["username"]}}","{{ $chart[4]["package"]}}",{{ $chart[4]["left_point"]}},{{ $chart[4]["right_point"]}},{{ $chart[4]["total_lv"]}},{{ $chart[4]["total_rv"]}})'
															class="btn btn-info btn-circle added"><i
																class="fa fa-book"></i></a>
												@else

												<img data-username="{{ $chart[4]['username']}}"
													src="/images/package/empty.png" style="width:70px"></img>
												<p></p>
												<!-- <button onclick="click_choose(this.value,'B')"
													value="{{ $chart[1]['username']}}"
													class="btn btn-success btn-circle added" data-jid="aaaaa"><i
														class="fa fa-plus"></i></button> -->

												@endif
												<ul>
													<li>
														@if( $chart[9]['username'])
														<img data-username="{{ $chart[9]['username']}}"
															src="{{ $chart[9]['image']}}" style="width:70px" onclick="check_user({{ $chart[9]['parrent']}})"></img>
														<p>{{ $chart[9]['username']}}</p>

														<div class="ptitle">{{ __('site.Total_CV') }}</div>
														<div class="ptext">{{ $chart[9]['total_lv']}}|{{ $chart[9]['total_rv']}}</div>


														<p text-align="center">
														<div class="ptitle">{{ __('site.Balance_CV') }}</div>
														<div class="ptext">{{ $chart[9]['left_point']}}|{{$chart[9]['right_point']}}</div>

														</p>

														<a onclick='show_detail({{ $chart[9]["parrent"]}},"{{ $chart[9]["username"]}}","{{ $chart[9]["package"]}}",{{ $chart[9]["left_point"]}},{{ $chart[9]["right_point"]}},{{ $chart[9]["total_lv"]}},{{ $chart[9]["total_rv"]}})'
															class="btn btn-info btn-circle added"><i
																class="fa fa-book"></i></a>
														@else

														<img data-username="{{ $chart[9]['username']}}"
															src="/images/package/empty.png" style="width:70px"></img>
														<p></p>
														<!-- <button onclick="click_choose(this.value,'A')"
															value="{{ $chart[4]['username']}}"
															class="btn btn-success btn-circle added" data-jid="aaaaa"><i
																class="fa fa-plus"></i></button> -->

														@endif

													</li>
													<li>
														@if( $chart[10]['username'])
														<img data-username="{{ $chart[10]['username']}}"
															src="{{ $chart[10]['image']}}" style="width:70px" onclick="check_user({{ $chart[10]['parrent']}})"></img>
														<p>{{ $chart[10]['username']}}</p>

														<div class="ptitle">{{ __('site.Total_CV') }}</div>
														<div class="ptext">{{ $chart[10]['total_lv']}}|{{$chart[10]['total_rv']}}</div>

														<p text-align="center">

														<div class="ptitle">{{ __('site.Balance_CV') }}</div>
														<div class="ptext">{{ $chart[10]['left_point']}}|{{$chart[10]['right_point']}}</div>

														</p>

														<a onclick='show_detail({{ $chart[10]["parrent"]}},"{{ $chart[10]["username"]}}","{{ $chart[10]["package"]}}",{{ $chart[10]["left_point"]}},{{ $chart[10]["right_point"]}},{{ $chart[10]["total_lv"]}},{{ $chart[10]["total_rv"]}})'
															class="btn btn-info btn-circle added"><i
																class="fa fa-book"></i></a>
														@else

														<img data-username="{{ $chart[10]['username']}}"
															src="/images/package/empty.png" style="width:70px"></img>
														<p></p>
														<!-- <button onclick="click_choose(this.value,'B')"
															value="{{ $chart[4]['username']}}"
															class="btn btn-success btn-circle added" data-jid="aaaaa"><i
																class="fa fa-plus"></i></button> -->

														@endif

													</li>
												</ul>
											</li>
										</ul>
									</li>
									<li>
										@if( $chart[2]['username'])
										<img data-username="{{ $chart[2]['username']}}" src="{{ $chart[2]['image']}}"
											style="width:70px" onclick="check_user({{ $chart[2]['parrent']}})"></img>
										<p>{{ $chart[2]['username']}}</p>

										<div class="ptitle">{{ __('site.Total_CV') }}</div>
										<div class="ptext">{{ $chart[2]['total_lv']}}|{{$chart[2]['total_rv']}}</div>

										<p text-align="center">
										<div class="ptitle">{{ __('site.Balance_CV') }}</div>
										<div class="ptext">{{ $chart[2]['left_point']}}|{{$chart[2]['right_point']}}</div>

										</p>

										<a onclick='show_detail({{ $chart[2]["parrent"]}},"{{ $chart[2]["username"]}}","{{ $chart[2]["package"]}}",{{ $chart[5]["left_point"]}},{{ $chart[2]["right_point"]}},{{ $chart[2]["total_lv"]}},{{ $chart[2]["total_rv"]}})'
															class="btn btn-info btn-circle added"><i
																class="fa fa-book"></i></a>
										@else

										<img data-username="{{ $chart[2]['username']}}" src="/images/package/empty.png"
											style="width:70px"></img>
										<p></p>
										<!-- <button onclick="click_choose(this.value,'B')"
											value="{{ $chart[0]['username']}}" class="btn btn-success btn-circle added"
											data-jid="aaaaa"><i class="fa fa-plus"></i></button> -->

										@endif

										<ul>
											<li>
												@if( $chart[5]['username'])
												<img data-username="{{ $chart[5]['username']}}"
													src="{{ $chart[5]['image']}}" style="width:70px" onclick="check_user({{ $chart[5]['parrent']}})"></img>
												<p>{{ $chart[5]['username']}}</p>

												<div class="ptitle">{{ __('site.Total_CV') }}</div>
												<div class="ptext">{{ $chart[5]['total_lv']}}|{{$chart[5]['total_rv']}}</div>


												<p text-align="center">
												<div class="ptitle">{{ __('site.Balance_CV') }}</div>
												<div class="ptext">{{ $chart[5]['left_point']}}|{{$chart[5]['right_point']}}</div>

												</p>

												<a onclick='show_detail({{ $chart[5]["parrent"]}},"{{ $chart[5]["username"]}}","{{ $chart[5]["package"]}}",{{ $chart[5]["left_point"]}},{{ $chart[5]["right_point"]}},{{ $chart[5]["total_lv"]}},{{ $chart[5]["total_rv"]}})'
															class="btn btn-info btn-circle added"><i
																class="fa fa-book"></i></a>
												@else

												<img data-username="{{ $chart[5]['username']}}"
													src="/images/package/empty.png" style="width:70px"></img>
												<p></p>
												<!-- <button onclick="click_choose(this.value,'A')"
													value="{{ $chart[2]['username']}}"
													class="btn btn-success btn-circle added" data-jid="aaaaa"><i
														class="fa fa-plus"></i></button> -->

												@endif

												<ul>
													<li>
														@if( $chart[11]['username'])
														<img data-username="{{ $chart[11]['username']}}"
															src="{{ $chart[11]['image']}}" style="width:70px" onclick="check_user({{ $chart[11]['parrent']}})"></img>
														<p>{{ $chart[11]['username']}}</p>

														<div class="ptitle">{{ __('site.Total_CV') }}</div>
														<div class="ptext">{{ $chart[11]['total_lv']}}|{{$chart[11]['total_rv']}}</div>


														<p text-align="center">
														<div class="ptitle">{{ __('site.Balance_CV') }}</div>
														<div class="ptext">{{ $chart[11]['left_point']}}|{{$chart[11]['right_point']}}</div>

														</p>

														<a onclick='show_detail({{ $chart[11]["parrent"]}},"{{ $chart[11]["username"]}}","{{ $chart[11]["package"]}}",{{ $chart[11]["left_point"]}},{{ $chart[11]["right_point"]}},{{ $chart[11]["total_lv"]}},{{ $chart[11]["total_rv"]}})'
															class="btn btn-info btn-circle added"><i
																class="fa fa-book"></i></a>
														@else

														<img data-username="{{ $chart[11]['username']}}"
															src="/images/package/empty.png" style="width:70px"></img>
														<p></p>
														<!-- <button onclick="click_choose(this.value,'A')"
															value="{{ $chart[5]['username']}}"
															class="btn btn-success btn-circle added" data-jid="aaaaa"><i
																class="fa fa-plus"></i></button> -->

														@endif
													<li>
														@if( $chart[12]['username'])
														<img data-username="{{ $chart[12]['username']}}"
															src="{{ $chart[12]['image']}}" style="width:70px" onclick="check_user({{ $chart[12]['parrent']}})"></img>
														<p>{{ $chart[12]['username']}}</p>

														<div class="ptitle">{{ __('site.Total_CV') }}</div>
														<div class="ptext">{{ $chart[12]['total_lv']}}|{{$chart[12]['total_rv']}}</div>


														<p text-align="center">
														<div class="ptitle">{{ __('site.Balance_CV') }}</div>
														<div class="ptext">{{ $chart[12]['left_point']}}|{{$chart[12]['right_point']}}</div>

														</p>

														<a onclick='show_detail({{ $chart[12]["parrent"]}},"{{ $chart[12]["username"]}}","{{ $chart[12]["package"]}}",{{ $chart[12]["left_point"]}},{{ $chart[12]["right_point"]}},{{ $chart[12]["total_lv"]}},{{ $chart[12]["total_rv"]}})'
															class="btn btn-info btn-circle added"><i
																class="fa fa-book"></i></a>
														@else

														<img data-username="{{ $chart[12]['username']}}"
															src="/images/package/empty.png" style="width:70px"></img>
														<p></p>
														<!-- <button onclick="click_choose(this.value,'B')"
															value="{{ $chart[5]['username']}}"
															class="btn btn-success btn-circle added" data-jid="aaaaa"><i
																class="fa fa-plus"></i></button> -->

														@endif

													</li>
												</ul>
											</li>
											<li>
												@if( $chart[6]['username'])
												<img data-username="{{ $chart[6]['username']}}"
													src="{{ $chart[6]['image']}}" style="width:70px" onclick="check_user({{ $chart[6]['parrent']}})"></img>
												<p>{{ $chart[6]['username']}}</p>

													<div class="ptitle">{{ __('site.Total_CV') }}</div>
													<div class="ptext">{{ $chart[6]['total_lv']}}|{{$chart[6]['total_rv']}}</div>

												<p text-align="center">
													<div class="ptitle">{{ __('site.Balance_CV') }}</div>
													<div class="ptext">{{ $chart[6]['left_point']}}|{{$chart[6]['right_point']}}</div>

												</p>

												<a onclick='show_detail({{ $chart[6]["parrent"]}},"{{ $chart[6]["username"]}}","{{ $chart[6]["package"]}}",{{ $chart[6]["left_point"]}},{{ $chart[6]["right_point"]}},{{ $chart[6]["total_lv"]}},{{ $chart[6]["total_rv"]}})'
															class="btn btn-info btn-circle added"><i
																class="fa fa-book"></i></a>
												@else

												<img data-username="{{ $chart[6]['username']}}"
													src="/images/package/empty.png" style="width:70px"></img>
												<p></p>
												<!-- <button onclick="click_choose(this.value,'B')"
													value="{{ $chart[2]['username']}}"
													class="btn btn-success btn-circle added" data-jid="aaaaa"><i
														class="fa fa-plus"></i></button> -->

												@endif


												<ul>
													<li>
														@if( $chart[13]['username'])
														<img data-username="{{ $chart[13]['username']}}"
															src="{{ $chart[13]['image']}}" style="width:70px" onclick="check_user({{ $chart[13]['parrent']}})"></img>
														<p>{{ $chart[13]['username']}}</p>

														<div class="ptitle">{{ __('site.Total_CV') }}</div>
														<div class="ptext">{{ $chart[13]['total_lv']}}|{{$chart[13]['total_rv']}}</div>

														<p text-align="center">
														<div class="ptitle">{{ __('site.Balance_CV') }}</div>
														<div class="ptext">{{ $chart[13]['left_point']}}|{{$chart[13]['right_point']}}</div>


														</p>

														<a onclick='show_detail({{ $chart[13]["parrent"]}},"{{ $chart[13]["username"]}}","{{ $chart[13]["package"]}}",{{ $chart[13]["left_point"]}},{{ $chart[13]["right_point"]}},{{ $chart[13]["total_lv"]}},{{ $chart[13]["total_rv"]}})'
															class="btn btn-info btn-circle added"><i
																class="fa fa-book"></i></a>
														@else

														<img data-username="{{ $chart[13]['username']}}"
															src="/images/package/empty.png" style="width:70px"></img>
														<p></p>
														<!-- <button onclick="click_choose(this.value,'A')"
															value="{{ $chart[6]['username']}}"
															class="btn btn-success btn-circle added" data-jid="aaaaa"><i
																class="fa fa-plus"></i></button> -->

														@endif

													</li>
													<li>
														@if( $chart[14]['username'])
														<img data-username="{{ $chart[14]['username']}}"
															src="{{ $chart[14]['image']}}" style="width:70px" onclick="check_user({{ $chart[14]['parrent']}})"></img>
														<p>{{ $chart[14]['username']}}</p>
														<div class="ptitle">{{ __('site.Total_CV') }}</div>
														<div class="ptext">{{ $chart[14]['total_lv']}}|{{$chart[14]['total_rv']}}</div>


														<p text-align="center">
														<div class="ptitle">{{ __('site.Balance_CV') }}</div>
														<div class="ptext">{{ $chart[14]['left_point']}}|{{$chart[14]['right_point']}}</div>

														</p>
														<a onclick='show_detail({{ $chart[14]["parrent"]}},"{{ $chart[14]["username"]}}","{{ $chart[14]["package"]}}",{{ $chart[14]["left_point"]}},{{ $chart[14]["right_point"]}},{{ $chart[14]["total_lv"]}},{{ $chart[14]["total_rv"]}})'
															class="btn btn-info btn-circle added"><i
																class="fa fa-book"></i></a>
														@else

														<img data-username="{{ $chart[14]['username']}}"
															src="/images/package/empty.png" style="width:70px"></img>
														<p></p>
														<!-- <button onclick="click_choose(this.value,'B')"
															value="{{ $chart[6]['username']}}"
															class="btn btn-success btn-circle added" data-jid="aaaaa"><i
																class="fa fa-plus"></i></button> -->

														@endif
													</li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						<div class="col-md-12" align="center">
							<div id="chart" class="orgChart"></div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<div id="myModal" class="modal" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content" style="width:100%">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						<center>
							<h2 id='name'>Details</h2>
						</center>
					</div>
					<div class="modal-body">
						<center>
						<p id='fullname' style="font-size:25px"></p>
						<p id='package' style="font-size:20px;color:black"></p>
							<table class="table table-bordered" id='detail_table'>



								<tr>
									<th>
										<p> Left PV : <span id='left_point'> </span> </p>
									</th>
									<th>
										<p> Right PV : <span id='right_point'> </span> </p>
									</th>
								</tr>
								<tr>
									<th>
										<p> Total PV : <span id='total_lv'> </span> </p>
									</th>
									<th>
										<p> Total PV : <span id='total_rv'> </span> </p>
									</th>
								</tr>



							</table>
						</center>
					</div>

				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
		<!--form id="next_placement" method="GET" action="/web/team/node">
			<input type="hidden" id="search_uid" name="search_uid"></input>
			<input type="hidden" id="search_uid" name="uid" value='{$current}'></input>
		</form-->



		@stop
		@section('script')
		<script src="/template/material-vertical-2/assets/js/jquery.min.js"></script>
		<script src="/assets/chart/jquery.jOrgChart4.js"></script>
		<script type="text/javascript">
			var lan = "{$lan}";
			function click_choose(jid, group) {
				console.log(jid);
				location.replace("{{ route('webMemberRegister')}}?jid="+jid+"&group_type="+group);
				$(window.parent.document).find("#jid").val(jid);
				$(window.parent.document).find("#group_type").val(group);
				$(window.parent.document).find("#close_screen").click();
			}

			jQuery(document).ready(function () {
				var parent_url = window.parent.location.pathname;

				if (parent_url == "/Platform/Dashboard/register") {


				}

				//alert($(window.parent.document).find("#group_type").val($type));
				$(".input-group-btn>button").height($('.form-control').height());
				$("button").click(function () {
					if ($(this).attr('id') == 'info') {
						var param = jQuery.trim($(this).text());
						parent.info(param);
					}
					if ($(this).attr('id') == 'search_user') {
						$("#formtree").submit();
					}
					if ($(this).attr('id') == 'up_level') {
						var a = '{$up_line}';
						$("#input").val(a);
						$("#formtree").submit();
					}
					if ($(this).attr('id') == 'refresh') {
						$("#formtree").submit();
					}
				})
			});
		</script>

		<script>
			var modal = document.getElementById("myModal");
			var span = document.getElementsByClassName("close")[0];

			function check_user(parrent){
				window.location.replace("/web/team/node?parent="+parrent);

			}

			function show_detail(userid,user,package_name,left_point,right_point,total_lv,total_rv) {
		 		console.log(userid,user,package,left_point,right_point,total_lv,total_rv);
				 modal.style.display = "block";
				 document.getElementById("fullname").innerHTML = user;
				 document.getElementById("package").innerHTML = package_name;
				 document.getElementById("left_point").innerHTML = left_point;
				 document.getElementById("right_point").innerHTML = right_point;
				 document.getElementById("total_lv").innerHTML = total_lv;
				 document.getElementById("total_rv").innerHTML = total_rv;
				 span.onclick = function() {
					modal.style.display = "none";
				}
				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = "none";
					}
				}
					// jQuery.ajax({
					// 	type: "GET",
					// 	url: "direct_detail?userid=" + userid,
					// 	dataType: 'json',
					// 	success: function (data) {

					// 		document.getElementById("name").innerHTML = data.username;
					// 		document.getElementById("fullname").innerHTML = data.fullname;
					// 		document.getElementById("add_time").innerHTML = data.add_time;
					// 		document.getElementById("package_time").innerHTML = data.add_time;
					// 		var lan = '{$lan}';
					// 		if (lan == 'cn') {
					// 			document.getElementById("package").innerHTML = data.gname;
					// 		} else {
					// 			document.getElementById("package").innerHTML = data.gname_en;
					// 		}

					// 	}
					// });
			// 		jQuery.ajax({
			// 			type: "GET",
			// 			url: "get_package?userid=" + userid,
			// 			dataType: 'json',
			// 			success: function (data) {
			// 				if (data) {
			// 					for (i = 0; i < data.length; i++) {
			// 						var $tr = $('<tr/>');
			// 						$tr.append($('<td/>').html(data[i]['add_time']}));
			// 		var lan = '{$lan}';
			// 		if (lan == 'cn') {
			// 			$tr.append($('<td/>').html(data[i]['remark']}));
			// 	}else {
			// 		$tr.append($('<td/>').html(data[i]['remarken']}));
			// 					}

			// 	$('#detail_table tr:last').before($tr);
			// 			  }

			// 		}
			// 	}
			// });
			//$('#modal-sm').modal('show');
			}
		</script>
		<script>
			$(function () {
				$(".added").click(function () {
					alert($(this).data('jid'));
				});
				$('.sss').hover(function () {
					alert();
					$('.tip').show();
				}, function () {
					$('.tip').hide();
				})
			})
			jQuery(document).ready(function () {
				$("#org").jOrgChart({
					chartElement: '#chart',
					dragAndDrop: false,
					collapse: true
				});
			});
		</script>

		<script type="text/javascript">
			jQuery(document).ready(function () {

				$("button").click(function () {
					if ($(this).attr('id') == 'refresh') {
						$("#formtree").submit();
					}
					if ($(this).attr('id') == 'search_user') {
						$("#formtree").submit();
					}
					if ($(this).attr('id') == 'up_level') {
						var a = '{$up_line}';

						$("#search_uid").val(a);
						//$("#next_placement").submit();
					}
				})
			});
		</script>
		<script>

			jQuery(document).ready(function () {

				/* Custom jQuery for the example */
				$("#show-list").click(function (e) {
					e.preventinfo();

					$('#list-html').toggle('fast', function () {
						if ($(this).is(':visible')) {
							$('#show-list').text('Hide underlying list.');
							$(".topbar").fadeTo('fast', 0.9);
						} else {
							$('#show-list').text('Show underlying list.');
							$(".topbar").fadeTo('fast', 1);
						}
					});
				});

				$('#list-html').text($('#org').html());

				$("#org").bind("DOMSubtreeModified", function () {
					$('#list-html').text('');

					$('#list-html').text($('#org').html());

					prettyPrint();
				});
			});
		</script>

		@stop
