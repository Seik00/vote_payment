<!DOCTYPE html>
<html>
<head>
	<title>{{ config('sys_config.project_name') }}</title>
	<link rel="shortcut icon" href="{{asset( config('sys_config.icon')) }}">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/template/youtube/css/bootstrap.css">

	<link rel="stylesheet" type="text/css" href="/template/youtube/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="/template/youtube/css/fontawesome.css"> 
	<link rel="stylesheet" type="text/css" href="/template/youtube/css/style.css">
</head>
<body style=" background: url('/images/WeChat Image_20210324235417.png') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
	<!-- Top navbar -->
	<nav class="container-fluid fixed-top bg-white pt-2" id="top_nav" style='background-image: linear-gradient(to bottom right, #9819b8, #5b0079);'>
		<div class="row">
			<div class="col-4 pl-4">
				<a class="navbar-brand" ><img src="{{asset( config('sys_config.logo')) }}" style='width: 50px;'></a>
			</div>
			
		</div>
	</nav>
	<!-- Top navbar -->

	<!-- mobile top navbar -->
	<nav class="container-fluid fixed-top bg-white pt-3" id="top_nav_mobile">
		<div class="row">
			<div class="col-3 pl-4">
				<a class="navbar-brand" href="index.html"><img src="{{asset( config('sys_config.logo')) }}" style='width: 40px;'class="mb-2"></a>
			</div>
		</div>
	</nav>
	<!-- mobile top navbar -->

<!-- sidebar -->
 
<!-- sidebar -->
	

	<!-- main content -->
	<div class="container-fluid watch_video">
		<div class="row pt-4">
			<div class="col-md-8 video_box">
				<video width="100%" heith='400px' controls>
					<source src="{{$video->public_path}}" type="video/mp4">
					<source src="{{$video->public_path}}" type="video/ogg">
				</video>
				<div class="p-1 pt-3">
					<div class="title" style="color:#fcf8f8;">{{$video->video_name}}</div>
					<div class="row mt-2 border-bottom">
						<div class="col-7">
							<div style="color:#fcf8f8;">{{$video->created_at}}</div>
						</div>
						
					</div>
					
					
				</div>
			</div>
			<div class="col-md-4">
				<h2 style="color:#fcf8f8;">其他视频</h2>
				@foreach ($video_list as $records)
					<div class="container-fluid video_list">
						<a href="{{ $records->video_link}}">
							<div class="card">
								<div class="row p-0">
									<div class="col-md-5">
										<img class="video_list_responsive" src="{{ $records->public_image_path}}" alt="image" width="100%" height="94" />
									</div>
									<div class="col-md-7 p-0" style='opacity: 0.5;'>
											<p class="mb-1 title" title="{{ $records->video_name}}">{{ $records->video_name}}</p>
												<p style="color:#606060;">
													{{ $records->created_at}}
												</p>
									</div>
								</div>
							</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	
		<!-- main content -->

		<script src="/template/youtube/js/jquery-3.5.1.min.js"></script>
		<script src="/template/youtube/js/popper.min.js"></script>
		<script src="/template/youtube/js/bootstrap.min.js"></script>

		<script>
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();   
			});

function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "SHOW MORE"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "SHOW LESS"; 
    moreText.style.display = "inline";
  }
}


</script>
	</body>
	</html>