<?php
if(!empty($_POST)){
    $id = getPost('id');
    $category_id = getPost('category_id');
    $thumbnail = moveFile('thumbnail');
    $title = getPost('title');
    $price = getPost('price');
    $discount = getPost('discount');
    $description = getPost('description');
    $created_at = $updated_at = date('Y-m-d H:i:s');

    if($id > 0){
        // update
            if($thumbnail != ''){
                $sql = "update product set thumbnail = '$thumbnail', title = '$title', price = '$price', discount = '$discount', description = '$description', category_id = '$category_id', updated_at = '$updated_at' where id = '$id'";
            }else{
                $sql = "update product set title = '$title', price = '$price', discount = '$discount', description = '$description', category_id = '$category_id', updated_at = '$updated_at' where id = '$id'";
            }
            execute($sql);
            header('Location: index.php');
            die();
    }else{
        // insert
        $sql = "insert into product(thumbnail, title, price, discount, description, updated_at, created_at, deleted, category_id) values('$thumbnail', '$title', '$price', '$discount', '$description', '$updated_at', '$created_at', 0, '$category_id')";
        execute($sql);
        header('Location: index.php');
        die();
    }
        
    
}