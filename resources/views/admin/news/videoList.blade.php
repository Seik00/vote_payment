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
								<th>视频标题</th>
								<th>
								视频
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
									<td>{{ $records->video_name}}</td>
									<td><a href="{{ $records->video_link}}">{{ $records->video_link}}</a></td>

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
				<h5 class="modal-title mt-0" id="exampleModalLabel">{{ __('site.ADJUST_WALLET') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group row">
				<input class="form-control" name='video_id' id='video_id' type="hidden" value="">
					<label for="promotion_rate" class="col-sm-4 col-form-label text-right">中文</label>
					<div class="col-sm-8">
						<input class="form-control" name='video_name' id='video_name' type="text" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="promotion_rate" class="col-sm-4 col-form-label text-right">英文</label>
					<div class="col-sm-8">
						<input class="form-control" name='video_name' id='video_name_en' type="text" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="promotion_rate" class="col-sm-4 col-form-label text-right">泰文</label>
					<div class="col-sm-8">
						<input class="form-control" name='video_name' id='video_name_th' type="text" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="promotion_rate" class="col-sm-4 col-form-label text-right">越南文</label>
					<div class="col-sm-8">
						<input class="form-control" name='video_name' id='video_name_vn' type="text" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="promotion_rate" class="col-sm-4 col-form-label text-right">印尼文</label>
					<div class="col-sm-8">
						<input class="form-control" name='video_name' id='video_name_in' type="text" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">视频首页图</label>
					<div class="col-sm-8">
					<input type="file" id="tumbnail" name="tumbnail" class="form-control" accept="image/*" />
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">视频上传</label>
					<div class="col-sm-8">
					<input type="file" id="file" name="file" class="form-control" accept="video/*" />
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">显示</label>
					<div class="col-sm-8">
						<select id='is_display' name="is_display" class="form-control">
								<option value="1">打开</option>
								<option value="0">关闭</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
                    <label class="col-md-4 my-2 control-label text-right">配套</label>
                        <div class="col-md-8">
							@foreach ($package as $records)
								<div class="checkbox my-2">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="package_{{ $records->id}}"  value = '{{ $records->id}}' data-parsley-multiple="groups" data-parsley-mincheck="2">
										<label class="custom-control-label" for="package_{{ $records->id}}">{{ $records->package_name}}</label>
									</div>
								</div>
							@endforeach
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
			url: 'videoInfo',
			data: {"_token": "{{ csrf_token() }}",'id': id}, // serializes the form's elements.
			success: function(data)
			{
				$('input[type="checkbox"]').attr('checked', false);
				document.getElementById("video_id").value = data.id;
				document.getElementById("video_name").value = data.video_name;
				document.getElementById("video_name_en").value = data.video_name_en;
				document.getElementById("video_name_in").value = data.video_name_in;
				document.getElementById("video_name_vn").value = data.video_name_vn;
				document.getElementById("video_name_th").value = data.video_name_th;
				document.getElementById("is_display").value = data.is_display;
				var queryRes = data.hashtag;
				if(queryRes){
					// split string result by ';' char
					var resArray = queryRes.split(',');

					// Iterate splite items
					resArray.forEach(function(item){
						$('input[type="checkbox"][value="' + item + '"]').attr('checked', true);
					});
				}

			},error:function(error)
				{
					if(error.status === 401){
						if(!alert('Unauthorized action.')){window.location.reload()};
				}
				}
		});
	}else{
		$('input[type="checkbox"]').attr('checked', false);
		document.getElementById("video_id").value = '';
		document.getElementById("video_name").value = '';
		document.getElementById("video_name_en").value = '';
		document.getElementById("video_name_in").value = '';
		document.getElementById("video_name_vn").value = '';
		document.getElementById("video_name_th").value = '';
		document.getElementById("is_display").value = 1;
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
	var tumbnail = $('#tumbnail')[0].files[0];
	fd.append('tumbnail',tumbnail);
	fd.append('file',files);
	fd.append('video_name',document.getElementById("video_name").value);
	fd.append('video_name_th',document.getElementById("video_name_th").value);
	fd.append('video_name_vn',document.getElementById("video_name_vn").value);
	fd.append('video_name_in',document.getElementById("video_name_in").value);
	fd.append('video_name_en',document.getElementById("video_name_en").value);
	fd.append('is_display',document.getElementById("is_display").value);
	fd.append('id',document.getElementById("video_id").value);
	fd.append('hashtag',array);
	fd.append('_token',"{{ csrf_token() }}");
	$.ajax({
			type: "POST",
			url: 'videoControl',
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
