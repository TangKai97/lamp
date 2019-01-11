
<!doctype html>
<html lang="en">

<head>
	<title>请先说你好</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="/admin/assets/vendor/bootstrap/css/bootstrap.min.css">
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
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="/admin/assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="lnr lnr-user"> </i><span>管理员</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="/admin/user/login"><i class="lnr lnr-exit"></i> <span>退出</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="#downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-user"></i> <span>管理员</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="/admin/user" class="">管理员列表</a></li>
									<li><a href="/admin/user/create" class="">管理员添加</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPabc" data-toggle="collapse" class="collapsed"><i class="lnr lnr-sun"></i> <span>前台用户管理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPabc" class="collapse ">
								<ul class="nav">
									<li><a href="/admin/huser" class="">前台用户管理中心</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPage" data-toggle="collapse" class="collapsed"><i class="lnr lnr-bookmark"></i> <span>类别管理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>

							<div id="subPage" class="collapse ">
								<ul class="nav">
									<li><a href="/admin/cate" class="">类别列表</a></li>
									<li><a href="/admin/cate/create" class="">类别添加</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPag" data-toggle="collapse" class="collapsed"><i class="lnr lnr-cart"></i> <span>商品管理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPag" class="collapse ">
								<ul class="nav">
									<li><a href="/admin/goods" class="">商品列表</a></li>
									<li><a href="/admin/goods/create" class="">商品添加</a></li>
								</ul>
							</div>
						</li>
                        <li>
							<a href="#subPagm" data-toggle="collapse" class="collapsed"><i class="lnr lnr-heart"></i> <span>轮播图管理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPagm" class="collapse ">
								<ul class="nav">
									<li><a href="/admin/banner" class="">轮播图列表</a></li>
									<li><a href="/admin/banner/create" class="">轮播图添加</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPagmn" data-toggle="collapse" class="collapsed"><i class="lnr lnr-heart"></i> <span>广告管理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPagmn" class="collapse ">
								<ul class="nav">
									<li><a href="/admin/nfos" class="">广告列表</a></li>
									<li><a href="/admin/nfos/create" class="">广告添加</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPagmnx" data-toggle="collapse" class="collapsed"><i class="lnr lnr-heart"></i> <span>评论管理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPagmnx" class="collapse ">
								<ul class="nav">
									<li><a href="/admin/comment" class="">评论列表</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPagmnxc" data-toggle="collapse" class="collapsed"><i class="lnr lnr-heart"></i> <span>订单管理</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPagmnxc" class="collapse ">
								<ul class="nav">
									<li><a href="/admin/orders" class="">订单列表</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			@if (session('success'))
			    <div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>{{ session('success') }}</strong> 
				</div>
			@endif
			@if (session('error'))
			    <div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>{{ session('error') }}</strong> 
				</div>
			@endif
			@section('content')

			@show
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>

	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="/admin/assets/vendor/jquery/jquery.min.js"></script>
	<script src="/admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/admin/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="/admin/assets/scripts/klorofil-common.js"></script>
</body>
</html>
