<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Healthly Living Now For The Future">
<meta property="og:title" content="{{ config('sys_config.project_name') }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="https://rifineria.com/" />
<meta property="og:image:url" content="{{asset( config('sys_config.icon')) }}" />
<meta property="og:description" content="Healthly Living Now For The Future" />
<meta name="author" content="Healthly Living Now For The Future">
<title>{{ config('sys_config.project_name') }}</title>
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/font-awesome.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/bootstrap.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/animate.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/waves.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/layout.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/components.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/plugins.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/common-styles.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/pages.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/responsive.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/matmix-iconfont.css') }}" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,500italic" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" type="text/css">
</head>
<style>
.form-control{
    border-radius:25px!important;
    border:1px solid grey!important;
    padding-left:5px!important;
}
@media only screen and (min-width: 600px) {
    body.login-page{
        background-color:#e9faff;
    }
}
@media only screen and (max-width: 600px) {
    body.login-page{
       background-color:#e9faff;
    }
    .login-container {
        margin-top:50%!important;
        width:90%!important;
    }
    .col-md-6.english{
        float: left;
        width: 50%;
    }
    .col-md-6.chinese{
        float: right;
        width: 50%;
    }
}
</style>
<body class="login-page">

        <div class="login-container" style="margin-top:5%;border-radius:20px;width:400px">
        <img class="login-img-card" src="{{asset( config('sys_config.icon')) }}" style="margin-top:-75px;width:135px;height:170px;border-radius:0px!important;" alt="login thumb" />
			<p style="margin-bottom:20px;color:#a4abc5 !important">Reset Password</p>
            <form id="loginform"  class="form-signin" action="{{ route('dologinPage') }}" method='POST' >
            {{ csrf_field() }}
                <label style="color:grey">{{ __('site.Username') }}</label>


                <div class="input-group iconic-input">
                    <span class="input-group-addon">
                    <span class="input-icon"><i class="fa fa-envelope"></i></span>
                    </span>
                    <input type="text"  name="username" id="username" class="form-control" style="padding-left: 35px!important;" required>

                </div>
				<div onclick="start()" id= "gameStart" style="background-color: #980102;border-color: #980102;color:white;border-radius:25px;position:absolute;padding:8px;font-size:13px">
				Send Verification Code
				</div>

				<div id= "countdown" style="background-color: #980102;border-color: #980102;color:white;border-radius:25px;position:absolute;padding:8px;font-size:13px;display:none">
				</div>


				<label style="color:grey;margin-top:40px">Verification Code</label>
                <div class="input-group iconic-input">
                    <span class="input-group-addon">
                    <span class="input-icon"><i class="fa fa-check"></i></span>
                    </span>
                    <input type="text"  name="password" id="passcode" class="form-control" style="padding-left: 35px!important;" required>
                </div>

                <label style="color:grey">{{ __('site.New_Pwd') }}</label>
                <div class="input-group iconic-input">
                    <span class="input-group-addon">
                    <span class="input-icon"><i class="fa fa-lock"></i></span>
                    </span>
                    <input type="password"  name="password" id="password" class="form-control" style="padding-left: 35px!important;" required>
                </div>

				<label style="color:grey">{{ __('site.Confirm_New_Pwd') }}</label>
                <div class="input-group iconic-input">
                    <span class="input-group-addon">
                    <span class="input-icon"><i class="fa fa-lock"></i></span>
                    </span>
                    <input type="password"  name="password" id="c_password" class="form-control" style="padding-left: 35px!important;" required>
                </div>

                <button class="btn btn-primary btn-block btn-signin" type="button" onclick='submit_form()' style="background-color: #980102;border-color: #980102;color:white;border-radius:25px;margin:auto;margin-top:25px;margin-bottom:25px;">{{ __('site.Submit') }}</button>
            </form>
			<a href="/web" class="forgot-password" style="text-align:center">
                   Back To Login Page
                </a>
            <div style="clear:both"></div>
                 <!-- @if(!$errors->isEmpty())
                    <div class="alert alert-red">
                        <ul class="list-unstyled">
                            @foreach($errors->all() as $err)
                                <li><font color=red>{{ $err }}</font></li>
                            @endforeach
                        </ul>
                    </div>
                @endif -->
                <!-- <p style="margin-top:10px;margin-bottom:20px;text-align:right">{{ __('site.Forgot Password') }}</p> -->

                <!-- <div class="row show-grid" style="margin-top:10px">
					<div class="col-md-6 english">
                        <a href="/lang/en">English</a>

					</div>
					<div class="col-md-6 chinese">
                        <a href="/lang/cn">中文</a>
					</div>

				</div> -->

        </div>

        <!-- <div class="create-account">
            <a href="#">
                Create Account
            </a>
        </div>

        <div class="login-footer">
            Crafted with<i class="fa fa-heart"></i>by <a href="#">westilian</a>

        </div> -->

    </div>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/jRespond.min.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/nav-accordion.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/hoverintent.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/waves.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/switchery.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/jquery.loadmask.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/icheck.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/bootbox.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/animation.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/colorpicker.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/floatlabels.js') }}"></script>

    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/smart-resize.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/layout.init.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/matmix.init.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/retina.min.js') }}"></script>
    @yield('script')
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/template/material-vertical-2/assets/js/jquery.min.js"></script>
<script>

$( document ).ready(function() {
	$("#loginform").validate({
		rules: {
			username: {
				required: true,
			},
			password: {
				required: true,
			},
		},
		errorPlacement: function(error, element) {
            error.appendTo( element.parent().next("div") );
        }
	});
});

function start() {
	document.getElementById("gameStart").addEventListener("click", function(){
        request_otp();
		var timeleft =60;
		document.getElementById("gameStart").style.display = "none";
		document.getElementById("countdown").style.display = "block";
		var downloadTimer = setInterval(function function1(){
		document.getElementById("countdown").innerHTML = timeleft +
		"&nbsp"+"s";

		timeleft -= 1;
		if(timeleft <= 0){
			clearInterval(downloadTimer);
			document.getElementById("gameStart").style.display = "block";
			document.getElementById("countdown").style.display = "none";
		}
		}, 1000);

		console.log(countdown);
	});
}

function request_otp() {

	var fd = new FormData();
	fd.append('username',document.getElementById("username").value);
    console.log(fd);
	fd.append('_token',"{{ csrf_token() }}");
	$.ajax({
			type: "POST",
			url: '/api/auth/requestEmailOtp',
			data:  fd, // serializes the form's elements.
			processData: false,
			contentType: false,
			success: function(data)
			{
                console.log(data);
				if(data.code==0){
					alert('OTP is send to email if the email is registered');
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
function submit_form() {

var fd = new FormData();
fd.append('username',document.getElementById("username").value);
fd.append('passcode',document.getElementById("passcode").value);
fd.append('password',document.getElementById("password").value);
fd.append('c_password',document.getElementById("c_password").value);
fd.append('_token',"{{ csrf_token() }}");
$.ajax({
        type: "POST",
        url: '/api/auth/reset-password',
        data:  fd, // serializes the form's elements.
        processData: false,
        contentType: false,
        success: function(data)
        {
            console.log(data);
            if(data.code==0){
                alert('Password Reset successful,Please login');
                window.location.href='/web/';
            }else{
                alert(data.message);

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
</html>
