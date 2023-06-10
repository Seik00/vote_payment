@extends('layouts.login_template')

@section('content')
        <div class="row vh-100 " style="background: #1f1f23">
            <div class="col-12 align-self-center">
                <div class="auth-page">
                    <div class="card auth-card shadow-lg" style="background-color: #212529">
                        <div class="card-body">
                            <div class="px-3">
                                <div class="auth-logo-box">
                                    <a class="logo logo-admin"><img src="{{asset( config('sys_config.new_icon')) }}" alt="logo" class="auth-logo" style=";border-radius:0px;margin-top:-50px;width:135px;height:170px;background:transparent;box-shadow:none;"></a>
                                </div><!--end auth-logo-box-->
                                                
                                <form class="form-horizontal auth-form my-4" action="{{ $postRoute }}" method='POST' style="padding-top:4rem">
                                 {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="auth-form-icon" style="background: transparent;">
                                                <i class="dripicons-user"></i> 
                                            </span>                                                                                                              
                                            <input type="text" style="background: transparent; color: #f7f7f7;" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Username" required>
                                        </div>                                    
                                    </div><!--end form-group--> 
        
                                    <div class="form-group">
                                         <div class="input-group mb-3"> 
                                            <span class="auth-form-icon" style="background: transparent;">
                                                <i class="dripicons-lock"></i> 
                                            </span>                                                       
                                            <input type="password" style="background: transparent; color: #f7f7f7;" class="form-control" name="password" placeholder="Password" class="form-control" required>
                                        </div>                               
                                    </div><!--end form-group--> 
        
                                    <div class="form-group row mt-4">
                                       
                                        <!-- <div class="col-sm-12 text-right">
                                            <a href="{{route('user_forgot_password')}}" class="text-muted font-13"><i class="dripicons-lock"></i> Forgot password?</a>                                    
                                        </div> -->
                                    </div><!--end form-group--> 
        
                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-2">
                                            <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit" style='background: #008cf9;'>Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                        </div><!--end col--> 
                                    </div> <!--end form-group-->                           
                                </form><!--end form-->
                                <div style="clear:both"></div>
                                    @if(!$errors->isEmpty())
                                        <div class="alert alert-red">
                                            <ul class="list-unstyled">
                                                @foreach($errors->all() as $err)
                                                    <li><font color=red>{{ $err }}</font></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                </div><!--end /div-->
                            
                            <!--div-- class="m-3 text-center text-muted">
                                <p class="">Don't have an account ?  <a href="../authentication/auth-register.html" class="text-primary ml-2">Free Resister</a></p>
                            </!--div-->
                        </div><!--end card-body-->
                    </div><!--end card-->
                   
                </div><!--end auth-page-->
            </div><!--end col-->           
        </div><!--end row-->

@endsection
