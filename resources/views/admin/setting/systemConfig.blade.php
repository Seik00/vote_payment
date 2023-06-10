@extends('admin.layouts.header')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('saveConfig') }}" method="POST">
					{{ csrf_field() }}
					
					@if(!$errors->isEmpty())
						<div class="alert alert-danger">
							<ul class="list-unstyled mb-0">
								@foreach($errors->all() as $err)
									<li>{{ $err }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					
					@if ($message = Session::get('success'))
						<div class="alert alert-success alert-block">
							{{ $message }}
						</div>
					@endif
					<div class="row">
						<div class="col-12"><h4></h4></div>
					</div>
					<div class="row">
						<div class="col-5 text-right" style="margin-top:10px;">Special Bonus Button :</div>
						<div class="col-7">
							<select id='BONUS_SWITCH' name="BONUS_SWITCH" class="form-control">
								<option value="1">Running</option>
								<option value="0">Stop</option>
							</select>
							
						</div>
					</div>
					<div class="row">
						<div class="col-5 text-right" style="margin-top:10px;">Special Bonus Amount(USD) :</div>
						<div class="col-7">
							<input class="form-control" type="number" min="0.00" name="SPECIAL_BONUS" value="{{ $key_value['SPECIAL_BONUS'] }}" />
						</div>
					</div>
					
					<div class="row mt-3">
						<div class="col-3"></div>
						<div class="col-9">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
<script>
$(document).ready(function(){
	$("#BONUS_SWITCH").val("{{ $key_value['BONUS_SWITCH'] }}") ;

});

</script>   
@stop