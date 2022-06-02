<?php
	
    $title = "Quản Lý Đơn Hàng";
    $baseUrl = '../';
    require_once('../layouts/header.php');
    $sql = "select * from orders order by status asc, order_date desc";
    $data = executeResult($sql);
?>
<div class="row mt-3">
    <div class="col-md-12">
        <h3>Quản Lý Đơn Hàng</h3>
        
        <table class="table table-bordered table-hover mt-4">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ & Tên</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Nội Dung</th>
                    <th>Tổng Giá</th>
                    <th>Ngày Tạo</th>
                    <th style="width: 120px;"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $index = 0;
                    foreach($data as $item){
                        echo '<tr>
                            <td>'.(++$index).'</td>
                            <td><a href="detail.php?id='.$item['id'].'">'.$item['fullname'].'</a></td>
                            <td><a href="detail.php?id='.$item['id'].'">'.$item['phone_number'].'</a></td>
                            <td><a href="detail.php?id='.$item['id'].'">'.$item['email'].'</a></td>
                            <td>'.$item['address'].'</td>
                            <td>'.$item['note'].'</td>
                            <td>'.$item['total_money'].'</td>
                            <td>'.$item['order_date'].'</td>
                            <td>';

                           
                            if($item['status'] == 0){
                                echo '
                                    <button onclick="changeStatus('.$item['id'].', 1)" class="btn btn-success btn-sm">Approve</button>
                                    <button onclick="changeStatus('.$item['id'].', 2)" class="btn btn-success btn-sm mt-1">Cancel</button>
                                    ';

                            }else if($item['status'] == 1){
                                echo ' <label class="badge badge-success" for="">Approved</label>';
                            }else{
                                echo ' <label class="badge badge-danger" for="">Cancel</label>';

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
    function changeStatus(id, status){
       
        $.post('form_api.php', {
            'id': id,
            'status': status,
            'action': 'update_status'
        }, function(data){
             location.reload();
        })

    }
</script>
<?php
    require_once('../layouts/footer.php');
?>