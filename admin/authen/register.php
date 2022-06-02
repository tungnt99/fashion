<?php
	session_start();

    require_once('../../utils/utility.php');
    require_once('../../database/dbhelper.php');
    require_once('process_form_register.php');
	$user = getUserToken();

    if($user != null){
		header('Location: ../');
		die();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng Kí</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://cdn.w600.comps.canstockphoto.com/fashion-logo-design-badge-for-clothes-clip-art-vector_csp52184664.jpg" >
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <style>
        .panel-primary{
            width: 480px;
            margin: 0px auto;
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 3px 3px #03d7fc;
        }
        body{
             background-image: url("../../assets/photo/background_register2.webp"); 
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body >
	<div class="container">
		<div class="panel panel-primary mt-5">
			<div class="panel-heading">
				<h2 class="text-center">Đăng kí tài khoản</h2>
                <h3 style="color: red" class="text-center"><?=$msg?></h3>
			</div>
			<div class="panel-body">
				<form method="POST" onsubmit="return validateForm();">
                    <div class="form-group">
				        <label for="usr">Họ & Tên:</label>
				        <input required type="text" class="form-control" id="usr" name="fullname" value="<?= $fullname ?>">
				    </div>
				    <div class="form-group">
				        <label for="email">Email:</label>
				        <input required type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
				    </div>
				
				    <div class="form-group">
				        <label for="pwd">Mật Khẩu:</label>
				        <input required type="password" class="form-control" id="pwd" minlength="6" name="password">
				    </div>
				    <div class="form-group">
				        <label for="confirmation_pwd">Xác Minh Mật Khẩu:</label>
				        <input required type="password" class="form-control" id="confirmation_pwd" minlength="6" name="confirm_pwd">
				    </div>
				    <p>
                        <a class="text-decoration-none" href="login.php">Bạn đã có tài khoản</a>
                    </p>
				    <button class="btn btn-success">Đăng Ký</button>
                </form>
                        
			</div>
		</div>
	</div>
    <script type="text/javascript">
        function validateForm(){
            $pwd = $('#pwd').val();
            $confirmPwd = $('#confirmation_pwd').val();

            if($pwd != $confirmPwd){
                alert('Mật khẩu không trùng khớp');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>