<?php
$fullname = $email = $msg = '';
if(!empty($_POST)){
    $fullname = getPost('fullname');
    $email = getPost('email');
    $password = getPost('password');

    if(empty($fullname) || empty($email) || empty($password) || strlen($password) < 6){
        
    }else{
        // validate thành công
        $userExist = executeResult("SELECT * FROM user WHERE email = '$email'", true);
        if($userExist != null){
            $msg = 'Email đã được đăng ký';
        }else{
            $created_at = $updated_at = date('Y-m-d H:i:s');
            $password = getMD5Security($password);
            $sql = "insert into user(fullname, email, password, role_id, created_at, updated_at, deleted) values('$fullname', '$email', '$password', 2, '$created_at', '$updated_at', 0)";
            execute($sql);
            header('Location: login.php');
            die();
        }
    }

}
