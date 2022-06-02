<?php
	
    $title = "Thông Tin Đơn Hàng";
    $baseUrl = '../';
    require_once('../layouts/header.php');
    $orderId = getGet('id');
    $sql = "select order_details.*, product.title, product.thumbnail from order_details left join product on product_id = order_details.product_id where order_details.order_id = $orderId";
    $data = executeResult($sql);

    $sql = "select * from orders where id = $orderId";
    // $sql = "select * from orders where id = $id";
    $orderItem = executeResult($sql, true);
?>
<div class="row mt-3">
    
        <div class="col-md-12">
            <h3>Thông Tin Đơn Hàng</h3>

        </div>
        <div class="col-md-8 table-responsive">

            <table class="table table-bordered table-hover mt-4">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Thumbnail</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Tổng Giá</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $index = 0;
                        foreach($data as $item){
                            echo '<tr>
                                <td>'.(++$index).'</td>
                                <td><img src="'.fixUrl($item['thumbnail']).'" style="height: 120px;"></td>
                               
                                <td>'.$item['title'].'</td>
                                <td>'.$item['price'].'</td>
                                <td>'.$item['num'].'</td>
                                <td>'.$item['total_money'].'</td>
                              
                            </tr>';
    
                               
                            
                        }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Tổng Tiền</td>
                        
                        <td>
                            <?php $orderItem['total_money']
                            ?>
                        </td>
                        <!-- đặt tạm như vậy để dễ hình dung được phần tổng tiền -->
                    </tr>
                </tbody>
            </table>
        </div>
   <div class="col-md-4">
       <table class="table table-bordered mt-4">
            
                <tr>
                    <th>Họ & Tên:</th>
                    <td><?=$orderItem['fullname']?></td>

                </tr>
                <tr>
                    <th>Số Điện Thoại:</th>
                    <td><?=$orderItem['phone_number']?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?=$orderItem['email']?></td>

                </tr>
                <tr>
                    <th>Địa Chỉ:</th>
                    <td> <?=$orderItem['address']?></td>

                </tr>
                <tr>
                    <th>Ngày Đặt Hàng:</th>
                    <td><?=$orderItem['order_date']?></td>

                </tr>
            
            
       </table>
        
   </div>
</div>

<?php
    require_once('../layouts/footer.php');
?>