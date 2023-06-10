@extends('admin.layouts.header')

@section('content')

<?php
$f_trust = request('f_trust');

if ($f_trust == '') {
    $f_trust = '-1';
}
?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action='{{  Request::url() }}' method='GET'>

				</form>
				<button  onclick='get_info(0)' class="btn btn-gradient-primary btn-sm px-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">
										{{ __('site.Create') }}
						</button>
			</div>
		</div>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="mt-0 header-title"></h4>
				<div class="table-responsive">
					<table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
							<th>
								ID
								</th>
								<th>Malay</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>
								{{ __('site.CREATE_TIME') }}
								</th>

								<th>{{ __('site.REMARK') }}</th>
							</tr>
						</thead>
						<tbody>
							@if ( count($record) > 0 )

								@foreach ($record as $records)
								<tr>
									<td>{{ $records->id}}</td>
									<td>{{ $records->product_name}}</td>
									<td>{{ $records->product_name_en}}</td>

									<td>{{ $records->price}}</td>
									<td><a href="{{ $records->public_image_path}}">{{ $records->public_image_path}}</a></td>

									<td>{{ $records->created_at}}</td>
									<td>
									<button  onclick='get_info({{ $records->id}})' class="btn btn-gradient-primary btn-sm px-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">
										{{ __('site.EDIT') }}
										</button>
									</td>
								</tr>
								@endforeach
							@else
								<tr>
									<td colspan="6">{{ __('site.NO_RECORD') }}</td>
								</tr>
							@endif
						</tbody>
					</table>
					{{ $record->appends(request()->except('page'))->links()}}
				</div>
			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
<div class="toast" data-delay="1000" style="position:fixed;top:80px;right:10px;" >
	<div class="toast-body"></div>
</div>
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0" id="exampleModalLabel">{{ __('site.EDIT') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group row">
				<input class="form-control" name='product_id' id='product_id' type="hidden" value="">
					<label for="promotion_rate" class="col-sm-4 col-form-label text-right">Product Name(Malay)</label>
					<div class="col-sm-8">
						<input class="form-control" name='name' id='product_name' type="text" value="">
					</div>
				</div>
				<div class="form-group row">
				<input class="form-control" name='video_id' id='video_id' type="hidden" value="">
					<label for="promotion_rate" class="col-sm-4 col-form-label text-right">Product Name</label>
					<div class="col-sm-8">
						<input class="form-control" name='name' id='product_name_en' type="text" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">Price</label>
					<div class="col-sm-8">
					<input class="form-control" name='price' id='price' type="text" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">PV</label>
					<div class="col-sm-8">
					<input class="form-control" name='pv' id='pv' type="number" value="">
					</div>
				</div>

				<!--input class="form-control" name='price' id='price' type="hidden" value="0"-->
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">Voucher needed</label>
					<div class="col-sm-8">
					<input class="form-control" name='voucher' id='voucher' type="number" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">Product Image</label>
					<div class="col-sm-8">
					<input type="file" id="tumbnail" name="tumbnail" class="form-control" accept="image/*" />
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">Display</label>
					<div class="col-sm-8">
						<select id='is_display' name="is_display" class="form-control">
								<option value="1">On</option>
								<option value="0">Off</option>
						</select>
					</div>
				</div>

				<button class="btn btn-danger btn-sm px-3" data-dismiss="modal" aria-label="Close">{{ __('site.CLOSE') }}</button>
					<button onclick='submit_request()' class="btn btn-gradient-primary btn-sm px-3">{{ __('site.Submit') }}</button>

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<style>
.toast-success {
	color: #155724;
	background-color: #d4edda !important;
	border-color: #c3e6cb  !important;
}
.toast-danger {
	color: #721c24;
	background-color: #f8d7da !important;
	border-color: #f5c6cb !important;
}
</style>
@stop

@section('script')
<script>
function get_info(id) {
	if(id){
		$.ajax({
			type: "GET",
			url: 'productInfo',
			data: {"_token": "{{ csrf_token() }}",'id': id}, // serializes the form's elements.
			success: function(data)
			{

				document.getElementById("product_id").value = data.id;
				document.getElementById("product_name").value = data.product_name;
				document.getElementById("product_name_en").value = data.product_name_en;
				document.getElementById("price").value = data.price;
				document.getElementById("pv").value = data.pv;
				document.getElementById("is_display").value = data.is_display;
				document.getElementById("voucher").value = data.voucher;

			},error:function(error)
				{
					if(error.status === 401){
						if(!alert('Unauthorized action.')){window.location.reload()};
				}
				}
		});
	}else{
		document.getElementById("product_id").value = '';
		document.getElementById("product_name").value = '';
		document.getElementById("product_name_en").value = '';
		document.getElementById("price").value = '0';
		document.getElementById("pv").value = '0';
		document.getElementById("is_display").value = 1;
		document.getElementById("voucher").value = 1;
	}

}
function submit_request() {

	var fd = new FormData();
	var tumbnail = $('#tumbnail')[0].files[0];
	fd.append('tumbnail',tumbnail);
	fd.append('product_name',document.getElementById("product_name").value);
	fd.append('product_name_en',document.getElementById("product_name_en").value);
	fd.append('price',document.getElementById("price").value);
	fd.append('pv',document.getElementById("pv").value);
	fd.append('is_display',document.getElementById("is_display").value);
	fd.append('id',document.getElementById("product_id").value);
	fd.append('voucher',document.getElementById("voucher").value);
	fd.append('_token',"{{ csrf_token() }}");
	$.ajax({
			type: "POST",
			url: 'productControl',
			data:  fd, // serializes the form's elements.
			processData: false,
			contentType: false,
			success: function(data)
			{
				if(data.success==true){
					swal({
						type: 'success',
						title: 'Operation Success',
						type: "success"
					}).then(function() {
						location.reload();
					});
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
</script>
@stop
