<?php
    session_start();
    require_once('utils/utility.php');
    require_once('database/dbhelper.php');
    
    $sql = "select * from category";
    $menuItems = executeResult($sql);

    $sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id order by Product.updated_at desc limit 0,8";
    $lastestItems = executeResult($sql);
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="icon" href="./assets/photo/UNIQLO_logo.svg.png">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="./assets/css/user/home.css">
<style>
   
</style>
</head>
<body>
    <!-- Menu start -->
    <div class="container">

        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php"><img src="./assets/photo/logo_uniqlo.gif" alt="" style="height: 80px;"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Trang Chủ</a>
            </li>
            <?php
                foreach($menuItems as $item){
                    echo '<li class="nav-item">
                        <a class="nav-link" href="category.php?id='.$item['id'].'">'.$item['name'].'</a>
                    </li>';
                }
                
            ?>
          
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Liên Hệ</a>
            </li> 
            
        </ul>
  </div>

    <!-- Menu Stop -->