<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>后台登录</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="/admin/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/admin/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/admin/assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="/admin/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="/admin/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="/admin/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/admin/assets/img/favicon.png">
	<script type="text/javascript" src="/admin/js/jquery-3.3.1.min.js"></script>
</head>

<body>
	
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="/admin/assets/img/logo-dark.png" alt="Klorofil Logo"></div>
								<p class="lead">后台登录</p>
							</div>
							<form class="form-auth-small" action="/admin/dologin" method="get">
								{{ csrf_field() }}
								<div class="form-group">
									<input type="text" class="form-control" id="aname" name="aname" placeholder="用户名"><span></span>
								</div>
								<div class="form-group">
									<input type="password" class="form-control" id="apwd" name="apwd" placeholder="密码"><span></span>
								</div>
								<button type="submit" class="btn btn-primary btn-lg btn-block">登录</button>

								<div class="bottom">
									<span>asdsa1</span>
								</div>

								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock"></i> <a href="#">忘记密码?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Free Bootstrap dashboard template</h1>
							<p>by The Develovers</p>
						</div>
					</div>
					<div class="clearfix"></div>
				
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
	<script type="text/javascript">
		$(function(){

			$('#aname').focus(function(){
				$('span');
			});

		});
	</script>
</body>

</html>