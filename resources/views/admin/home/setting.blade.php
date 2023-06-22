@extends('admin.layouts.header')
@section('subtitle')
    <li class="breadcrumb-item active ">Welcome back to your <span class="f-w-600 color-light-job">Dashboard</span>!</li>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <form method="post" action="/admin/do_setting">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Exchange Rate</label>
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" name="rate" value="{{ $rate->key_value }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- <div class="form-group"> -->
                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest" style="display: block;">
                            <button class="btn btn-gradient-primary px-4 float-right mt-0 mb-3" style='background: #008cf9;' type="submit"><i class="mdi mdi-plus-circle-outline mr-2"></i>UPDATE</button>
                        </div>
                        <!-- </div> -->
                    </div>
                </form>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
@stop

@section('script')
    <script>
        
    </script>
@stop

