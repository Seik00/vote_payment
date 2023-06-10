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
                @if (session('error_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form method="post" action="/admin/do_setting">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                        <label>Start Time</label>
                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                            <input type="datetime-local" value="{{ $settings->where('global_key', 'START_TIME')->pluck('key_value')->first() }}" class="form-control datetimepicker-input" data-target="#reservationdatetime" name="start_time" required>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label>End Time</label>
                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                            <input type="datetime-local" value="{{ $settings->where('global_key', 'END_TIME')->pluck('key_value')->first() }}" class="form-control datetimepicker-input" data-target="#reservationdatetime" name="end_time" required>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label>Site Status</label>
                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                            <select class="form-control" id="exampleFormControlSelect1" required name="site">
                                <option value="0" {{ $settings->where('global_key', 'SITE_STATUS')->pluck('key_value')->first() == 0 ? 'selected' : '' }}>ON</option>
                                <option value="1" {{ $settings->where('global_key', 'SITE_STATUS')->pluck('key_value')->first() == 1 ? 'selected' : '' }}>OFF</option>
                            </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                        <!-- <div class="form-group"> -->
                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest" style="display: block;">
                            <button class="btn btn-gradient-primary px-4 float-right mt-0 mb-3" style='background: #008cf9;' type="submit"><i class="mdi mdi-plus-circle-outline mr-2"></i>Submit</button>
                        </div>
                        <!-- </div> -->
                    </div>
                </form>                                      
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col-->      
</div>

<div class="row"> 
<div class="col-12">
            <div class="card">
                <div class="card-body">
                @if (session('add_users_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('add_users_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('error_add_users_message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error_add_users_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form method="post" action="/admin/do_add_users">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label>Wallet Address</label>
                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" name="wallet_address" required>
                        </div>
                        </div>
                    </div>
                </div>
                    <div class="col-md-12">
                        <!-- <div class="form-group"> -->
                        <div class="input-group date" id="reservationdatetime" data-target-input="nearest" style="display: block;">
                            <button class="btn btn-gradient-primary px-4 float-right mt-0 mb-3" style='background: #008cf9;' type="submit"><i class="mdi mdi-plus-circle-outline mr-2"></i>Add</button>
                        </div>
                        <!-- </div> -->
                    </div>
                </form>                                      
            </div><!--end card-body--> 
        </div><!--end card--> 
    </div> <!--end col-->      
</div>
@stop

@section('script')
    <script>
        
    </script>
@stop

