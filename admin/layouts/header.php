<?php
    session_start();
    require_once($baseUrl.'../utils/utility.php');
    require_once($baseUrl.'../database/dbhelper.php');
    
	$user = getUserToken();
	if($user == null){
		header('Location: '.$baseUrl.'authen/login.php');
		die();
	}
    // else if($user['role'] != 1){
    //     header('Location: ../'.$baseUrl.'index.php');
    //     die();
    // }

?>
<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://cdn.w600.comps.canstockphoto.com/fashion-logo-design-badge-for-clothes-clip-art-vector_csp52184664.jpg" >
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$baseUrl?>../assets/css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
</head>
<body >
	<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><?=$user['fullname']?></a>
        <input type="text" class="form-control form-control-dark w-100" placeholder="Tìm kiếm" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a href="<?=$baseUrl?>authen/logout.php" class="nav-link">Thoát</a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="<?=$baseUrl?>" class="nav-link active">
                            <i class="bi bi-house"></i>
                            Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=$baseUrl?>category" class="nav-link">
                            <i class="bi bi-folder-fill"></i>
                            Danh mục sản phẩm
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=$baseUrl?>product" class="nav-link">
                            <i class="bi bi-file-earmark-fill"></i>
                             Sản phẩm
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=$baseUrl?>order" class="nav-link">
                            <i class="bi bi-minecart"></i>
                             Quản Lý Đơn Hàng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=$baseUrl?>feedback" class="nav-link">
                            <i class="bi bi-question-circle-fill"></i>
                             Quản Lý Phản Hồi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=$baseUrl?>user" class="nav-link">
                            <i class="bi bi-people-fill"></i>
                            Quản Lý Người Dùng
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                