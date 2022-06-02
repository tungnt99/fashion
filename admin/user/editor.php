<?php
	
    $title = "Thêm/Sửa Tài Khoản Người Dùng";
    $baseUrl = '../';
    require_once('../layouts/header.php');
    $id = $msg = $fullname = $email = $phone_number = $address = $role_id = '';

    require_once('form_save.php');
    $id = getGet('id');
    if($id != '' && $id > 0){
        $sql = "select * from user where id = $id";
        $userItem = executeResult($sql, true);
        if($userItem != null){
            
            $fullname = $userItem['fullname'];
            $email = $userItem['email'];
            $phone_number = $userItem['phone_number'];
            $address = $userItem['address'];
            $role_id = $userItem['role_id'];
        }else{
            $id = 0;
        }
    }else{
        $id = 0;
    }
    $sql = "select * from role";
    $roleItems = executeResult($sql);
   
?>
<div class="row mt-3">
    <div class="col-md-12">
        <h3>Thêm/Sửa Tài Khoản Người Dùng</h3>
        <div class="panel panel-primary ">
			<div class="panel-heading">
				
                <h3 style="color: red" class="text-center"><?=$msg?></h3>
			</div>
			<div class="panel-body">
				<form method="POST" onsubmit="return validateForm();">
                    <div class="form-group">
				        <label for="role_id">Role:</label>
				        <select class="form-control" name="role_id" id="role_id" required>
                            <option value="">--Chọn--</option>
                            <?php
                            foreach($roleItems as $role){
                                if($role['id'] == $role_id){
                                    echo '<option selected value="'.$role['id'].'">'.$role['name'].'</option>';

                                }else{

                                    echo '<option value="'.$role['id'].'">'.$role['name'].'</option>';
                                }
                            }
                            ?>
                        </select>
                        <input type="text" name="id" value="<?=$id?>" hidden>
				    </div>
                    <div class="form-group">
				        <label for="usr">Họ & Tên:</label>
				        <input required type="text" class="form-control" id="usr" name="fullname" value="<?= $fullname ?>">
				    </div>
				    <div class="form-group">
				        <label for="email">Email:</label>
				        <input required type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
				    </div>
                    <div class="form-group">
                        <label for="phone_number">Số Điện Thoại:</label>
				        <input required type="tel" class="form-control" id="phone_number" name="phone_number" value="<?= $phone_number ?>">
				    </div>
                    
                    <div class="form-group">
                        <label for="address">Địa Chỉ:</label>
                        <input required type="text" class="form-control" id="address" name="address" value="<?= $address ?>">
                    </div>
				    <div class="form-group">
				        <label for="pwd">Mật Khẩu:</label>
				        <input <?=($id > 0?'':'required')?> type="password" class="form-control" id="pwd" minlength="6" name="password">
				    </div>
				    <div class="form-group">
				        <label for="confirmation_pwd">Xác Minh Mật Khẩu:</label>
				        <input <?=($id > 0?'':'required')?> type="password" class="form-control" id="confirmation_pwd" minlength="6" name="confirm_pwd">
				    </div>
				    
				    <button class="btn btn-success">Đăng Ký</button>
                </form>
                        
			</div>
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
<?php
    require_once('../layouts/footer.php');
?>