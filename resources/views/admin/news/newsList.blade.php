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
					<div class="row">
						<div class="col-6 mb-2">
						{{ __('site.Username') }}
							<input class="form-control" type="text" name="username" value="{{ request('username') }}" />
						</div>

					</div>
					<div>
						<div class="col-12 text-right">
							<button  type='submit' class="btn btn-gradient-primary btn-sm px-3">{{ __('site.SEARCH') }}</button>

                        </div>
					</div>
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
								<th>{{ __('site.TITLE') }}</th>
								<th>
								image
								</th>
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
									<td>{{ $records->title}}</td>
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
				<h5 class="modal-title mt-0" id="exampleModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group row">
					<label for="promotion_rate" class="col-sm-4 col-form-label text-right">{{ __('site.TITLE') }}</label>
					<div class="col-sm-8">
						<input class="form-control" name='title' id='title' type="text" value="">
						<input class="form-control" name='id' id='id' type="hidden" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">Image</label>
					<div class="col-sm-8">
					<input type="file" id="file" name="file" class="form-control" accept="image/*" />
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">Type</label>
					<div class="col-sm-8">
						<select id='news_type' name="news_type" class="form-control">
								<option value="1">{{ __('site.NOTIC') }}</option>
								<option value="2">{{ __('site.DOWNLOAD') }}</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">Language</label>
					<div class="col-sm-8">
						<select id='language' name="language" class="form-control">
								<option value="cn">{{ __('site.Chinese') }}</option>
								<option value="en">{{ __('site.English') }}</option>
								<option value="my">Melayu</option>
								<option value="vn">Vietnam</option>
								<option value="in">Indonesia</option>
								<option value="th">Thailand</option>
						</select>
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
				<div class="form-group row">
					<div class="col-sm-12">
						<label for="sort_order" class=" text-right">{{ __('site.CONTENT') }}</label><br>
						<textarea id='remark' class="form-control" style='height: 300px;'></textarea>
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
			url: 'newsInfo',
			data: {"_token": "{{ csrf_token() }}",'id': id}, // serializes the form's elements.
			success: function(data)
			{
				document.getElementById("id").value =  data.id;
				document.getElementById("title").value =  data.title;
				document.getElementById("language").value =  data.language;
				document.getElementById("news_type").value =  data.news_type;
				document.getElementById("remark").value =  data.description;
				document.getElementById("is_display").value =  data.is_display;
			},error:function(error)
				{
					if(error.status === 401){
						if(!alert('Unauthorized action.')){window.location.reload()};
				}
				}
		});
	}else{
		document.getElementById("id").value = '';
		document.getElementById("title").value = '';
		document.getElementById("language").value = 'cn';
		document.getElementById("news_type").value = '1';
		document.getElementById("remark").value = '';
		document.getElementById("is_display").value = 1;
	}

}
function submit_request() {
	var fd = new FormData();
	var files = $('#file')[0].files[0];

	fd.append('file',files);
	fd.append('id',document.getElementById("id").value);
	fd.append('title',document.getElementById("title").value);
	fd.append('is_display',document.getElementById("is_display").value);
	fd.append('language',document.getElementById("language").value);
	fd.append('news_type',document.getElementById("news_type").value);
	fd.append('description',document.getElementById("remark").value);
	fd.append('_token',"{{ csrf_token() }}");
	$.ajax({
			type: "POST",
			url: 'newsControl',
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
