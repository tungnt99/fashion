<?php
	
    $title = "Quản Lý Danh Mục Sản Phẩm";
    $baseUrl = '../';
    require_once('../layouts/header.php');
    
    require_once('form_save.php');
    $id = $name = '';
     if(isset($_GET['id'])){
         $id = getGet('id');
         $sql = "select * from Category where id = $id";
         $data = executeResult($sql, true);
         if($data != null){
             $name = $data['name'];
         }
     }

    $sql = "select * from Category ";
    $data = executeResult($sql);
?>
<div class="row mt-3">
    <div class="col-md-12">

        <h3 style="margin-bottom: 20px;">Quản Lý Danh Mục Sản Phẩm</h3>
    </div>
    <div class="col-md-6">
        <form action="?" method="post" onsubmit="return validateForm();">
            <div class="form-group">
                <label for="" style="font-weight: bold;">Tên danh mục</label>
                <input required="true" type="text" class="form-control" name="name" id="name" placeholder="Nhập tên danh mục" value="<?=$name?>">
                <input type="text" name="id" value="<?=$id?>" hidden="true">
            </div>
            <div class="form-group">
                <button class="btn btn-success">Lưu</button>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        
        <table class="table table-bordered table-hover mt-4">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Danh Mục</th>
                    
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
                            <td>'.$item['name'].'</td>
                            
                            <td style="width: 50px;">
                                <a href="?id='.$item['id'].'" ><button class="btn btn-warning">Sửa</button></a>
                            </td>

                            <td style="width: 50px">
                            
                                <button onclick="deleteCategory('.$item['id'].');" class="btn btn-danger">Xóa</button>
                            </td>
                         
                            
                        </tr>';
                        
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    function deleteCategory(id){
        option = confirm('Bạn có chắc chắn muốn xóa?');
        if(!option) return;

        $.post('form_api.php', {
            'id': id,
            'action': 'delete'
        }, function(data){
            if(data != null && data != ''){
                alert(data);
                return;
            }
             location.reload();
        })

    }
</script>
<?php
    require_once('../layouts/footer.php');
?>