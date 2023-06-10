<!-- <h1>{{ $user->username }}</h1> -->
@extends('layouts.header')

@section('content')

<?php
$f_trust = request('f_trust');

if ($f_trust == '') {
    $f_trust = '-1';
}
?>
		<div class="main-container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="box-widget widget-module">
							<div class="widget-container">
								<div class=" widget-block">
									<div class="page-header">
										<h2>{{ __('site.Purchase_Product') }}</h2>
									</div>
									<form class="form-horizontal" autocomplete="off">
									{{ csrf_field() }}
										<div class="form-group">
											<label class="col-md-2 control-label"></label>
											<div class=" col-md-10">
												<div class="form-group">
													<ul class="new">
													@foreach ($product as $products)
													<li class="new2" >
														<input  type="checkbox"  id="cb{{ $products->id}}" name="check" onclick="onlyOne({{ $products->id}})"/>
														<label class="new-label" for="cb{{ $products->id}}">
														<input type="hidden" id="price" value="{{ $products->price}}" style="display:none"/>
														<input type="hidden" id="answer" value="{{ $products->id}}"/>
														<p style="text-align: center;" >@if ( Config::get('app.locale') == 'en')
															{{ $products->product_name_en}}
															@else
															{{ $products->product_name}}
															@endif
														</p>
														<!--div style="text-align: center;">{{ $products->price}}</div><br/--><img src="{{ $products->public_image_path }}" /></label>
													</li>
													@endforeach

													</ul>
												</div>

											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Registration Wallet {{ __('site.Balance') }}</label>
											<div class="col-md-10">
												<input type="text" placeholder="" value="$ {{ $info->point3}}" class="form-control" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Activation Wallet {{ __('site.Balance') }}</label>
											<div class="col-md-10">
												<input type="text" placeholder="" value="$ {{ $info->pin}}" class="form-control" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.quantity') }}</label>
											<div class="col-md-10">
												<input type="number" id="quantity" placeholder="" value="1" oninput="handleValueChange()" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Amount') }}</label>
											<div class="col-md-10">
												<input type="text" id="total" class="form-control" readonly>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Pay_Method') }}</label>
											<div class=" col-md-10">
												<select class="form-control" name="pay_type" id="pay_type">

													<option value="point3">{{ __('site.Point3') }} 100%</option>
													<option value="point3&pin">{{ __('site.Point3') }} 50% & {{ __('site.Pin') }} 50%</option>

												</select>

											</div>
										</div>
										<!--div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Point2') }} {{ __('site.Balance') }}</label>
											<div class="col-md-10">
												<input type="text" name="username" id="username" placeholder="" value="$ {{ $info->point2}}" class="form-control" readonly>
											</div>
										</div-->
										<!-- <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Voucher') }} {{ __('site.Number') }}</label>
											<div class="col-md-10">
												<input type="text" name="username" id="username" placeholder="" value="{{ $voucher}}" class="form-control" readonly>
											</div>
										</div> -->
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Pick_Up_Method') }}</label>
											<div class=" col-md-10">
												<select class="form-control" name="delivery_type" id="delivery_type">
													<option value="pick_up">{{ __('site.Pick_Up') }} </option>
													<option value="delivery">{{ __('site.Delivery') }} </option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Security_Password') }}</label>
											<div class="col-md-10">
												<input type="password" id="sec_password" class="form-control" placeholder="" autocomplete="nope">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">&nbsp;</label>
											<div class="col-md-8">
												<div class="form-actions">
													<button type="button" onclick='submit_request()' class="btn btn-primary">{{ __('site.Submit') }}</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<style>
	ul.new {
  list-style-type: none;
}

li.new2 {
  display: inline-block;
}

input[type="checkbox"][id^="cb"] {
  display: none;
}

label.new-label {
  border: 1px solid #fff;
  padding: 10px;
  display: block;
  position: relative;
  margin: 10px;
  cursor: pointer;
}

label.new-label:before {
  background-color: white;
  color: white;
  content: " ";
  display: block;
  border-radius: 50%;
  border: 1px solid grey;
  position: absolute;
  top: -5px;
  left: -5px;
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 28px;
  transition-duration: 0.4s;
  transform: scale(0);
}

label.new-label img {
  height: 100px;
  width: 100px;
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
}

:checked + label.new-label {
  border-color: #ddd;
}

:checked + label.new-label:before {
  content: "✓";
  background-color: grey;
  transform: scale(1);
}

:checked + label.new-label img {
  transform: scale(0.9);
  box-shadow: 0 0 5px #333;
  z-index: -1;
}

</style>
@stop

 @section('script')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/template/material-vertical-2/assets/js/jquery.min.js"></script>
<script src="/assets/jstree/dist/jstree.min.js"></script>
<script>
$(document).ready(function(){


$('[type="checkbox"]').change(function(){

  if(this.checked){
	 $('[type="checkbox"]').not(this).prop('checked', false);
  }
});

});
</script>

<script>
	$( document ).ready(function() {
		document.getElementById("total").value = document.getElementById("quantity").value * document.getElementById("price").value;
	});
	
	function handleValueChange(){
		document.getElementById("total").value = document.getElementById("quantity").value * document.getElementById("price").value;
	}
</script>
<script  type="text/javascript">
var product_id;
function onlyOne(checkbox) {
	document.getElementById("answer").value = checkbox;
	product_id = checkbox;

	return product_id;
}

function submit_request() {
	if(document.getElementById("quantity").value<1){
		swal({
			title: 'Quantity must not be less than 1',
			timer: 1500,
			type: "error",
			showConfirmButton: false
		});
	}else{
		var fd = new FormData();
		fd.append('product_id',product_id);
		fd.append('pay_type',document.getElementById("pay_type").value);
		fd.append('quantity',document.getElementById("quantity").value);
		fd.append('delivery_type',document.getElementById("delivery_type").value);
		fd.append('sec_password',document.getElementById("sec_password").value);
		fd.append('_token',"{{ csrf_token() }}");
		$.ajax({
				type: "POST",
				url: 'dopurchaseProduct',
				data:  fd, // serializes the form's elements.
				processData: false,
				contentType: false,
				success: function(data)
				{
					console.log(data);
					if(data.code==0){
						swal({title: "Operation Success", type: "success"},
							function(){
								location.reload();
							}
						);
					}else{
						swal({
							title: data.message,
							timer: 1500,
							type: "error",
							showConfirmButton: false
						});
					}
				},error:function(error)
				{
					if(error.status === 401){
					if(!alert('Unauthorized action.')){window.location.reload()};
				}
				}
			});
	}
	
}
</script>
@stop