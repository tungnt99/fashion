<?php
$fullname = $email = $msg = '';
if(!empty($_POST)){
    $email = getPost('email');
    $password = getPost('password');
    $password = getMD5Security($password);

    $sql = "select * from user where email = '$email' and password = '$password'";
    $userExist = executeResult($sql, true);
    if($userExist == null){
        $msg = 'Email hoặc mật khẩu không đúng';
    }else{
        // validate thành công
        // $_SESSION['user'] = $userExist;
        $token = getMD5Security($userExist['email'].time());
        setcookie('tooken', $token, time() + 7 * 24 * 60 * 60 ,'/');
        $created_at = date('Y-m-d H:i:s');
        $_SESSION['user'] = $userExist;
        $userId = $userExist['id'];
        $sql = "insert into Tokens(user_id, token, created_at) values('$userId', '$token', '$created_at')";
        execute($sql);
        header('Location: ../');
        die();
    }
}