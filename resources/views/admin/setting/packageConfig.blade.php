@extends('admin.layouts.header')

@section('content')
<div class="row">

	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="mt-0 header-title"></h4>
				<div class="table-responsive">
					<table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
							<th>ID</th>
								<th>Chinese</th>
								<th>English</th>
								<th>Package Image</th>

								<th></th>
							</tr>
						</thead>
						<tbody>
							@if ( count($record) > 0 )

								@foreach ($record as $records)
								<tr>
									<td>{{ $records->id}}</td>
									<td>{{ $records->package_name}}</td>
									<td>{{ $records->package_name_en}}</td>
									<td>
										@if ( $records->public_image_path)
										<a target="_blank" href="{{ $records->public_image_path }}"> <img src="{{ $records->public_image_path }}" width="100px" height="100px"></a>
										@endif
									</td>
									<td>
									<button  onclick='get_info({{ $records->id }})' class="btn btn-gradient-primary btn-sm px-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">
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
				<h5 class="modal-title mt-0" id="exampleModalLabel">{{ __('site.ADJUST_WALLET') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group row">
				<input class="form-control" name='package_id' id='package_id' type="hidden" value="">
					<label for="promotion_rate" class="col-sm-4 col-form-label text-right">Chinese</label>
					<div class="col-sm-8">
						<input class="form-control" name='video_name' id='package_name' type="text" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="promotion_rate" class="col-sm-4 col-form-label text-right">English</label>
					<div class="col-sm-8">
						<input class="form-control" name='video_name' id='package_name_en' type="text" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">Package Name</label>
					<div class="col-sm-8">
					<input type="file" id="file" name="file" class="form-control" accept="image/*" />
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
		var package = {!! json_encode($record->toArray()) !!};
		document.getElementById("package_id").value = id;
		document.getElementById("package_name").value = package[id-1].package_name;
		document.getElementById("package_name_en").value = package[id-1].package_name_en;
	}else{

		document.getElementById("package_id").value = '';
		document.getElementById("package_name").value = '';
		document.getElementById("package_name_en").value = '';

	}

}
function submit_request() {
	var array = []
		var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

		for (var i = 0; i < checkboxes.length; i++) {
			array.push(checkboxes[i].value)
		}
	var fd = new FormData();
	var files = $('#file')[0].files[0];
	fd.append('file',files);
	fd.append('package_id',document.getElementById("package_id").value);
	fd.append('package_name',document.getElementById("package_name").value);
	fd.append('package_name_en',document.getElementById("package_name_en").value);
	fd.append('_token',"{{ csrf_token() }}");

	$.ajax({
			type: "POST",
			url: 'savePackage',
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
