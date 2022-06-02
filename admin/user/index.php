<?php
	
    $title = "Quản lý người dùng";
    $baseUrl = '../';
    require_once('../layouts/header.php');
    $sql = "SELECT user.*, role.name as role_name from user left join role on user.role_id = role.id where user.deleted = 0";
    $data = executeResult($sql);
?>
<div class="row mt-3">
    <div class="col-md-12">
        <h3>Quản Lý Người Dùng</h3>
        <a href="editor.php"><button class="btn btn-success">Thêm Tài Khoản</button></a>
        <table class="table table-bordered table-hover mt-4">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ & Tên</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa Chỉ</th>
                    <th>Quyền</th>
                    <th style="width: 50px;"></th>
                    <th style="width: 50px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $index = 0;
                    foreach($data as $item){
                        echo '<tr>
                            <td>'.(++$index).'</td>
                            <td>'.$item['fullname'].'</td>
                            <td>'.$item['email'].'</td>
                            <td>'.$item['phone_number'].'</td>
                            <td>'.$item['address'].'</td>
                            <td>'.$item['role_name'].'</td>
                            <td style="width: 50px;">
                                <a href="editor.php?id='.$item['id'].'" ><button class="btn btn-warning">Sửa</button></a>
                            </td>

                            <td style="width: 50px">';
                            if($user['id'] != $item['id'] ){
                                echo '<button onclick="deleteUser('.$item['id'].');" class="btn btn-danger">Xóa</button>';
                            }
                            echo '
                            </td>
                        </tr>';
                        
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    function deleteUser(id){
        option = confirm('Bạn có chắc chắn muốn xóa?');
        if(!option) return;

        $.post('form_api.php', {
            'id': id,
            'action': 'delete'
        }, function(data){
             location.reload();
        })

    }
</script>
<?php
    require_once('../layouts/footer.php');
?>