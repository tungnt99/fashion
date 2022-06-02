<?php
  require_once('layouts/header.php');
  
?>
    
    <div class="container">

      <h1 class="section_title">Sản Phẩm Mới Nhất</h1>
      <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Thumbnail</th>
                    <th>Tiêu Đề</th>
                    <th>Giá</th>
                    <th>Số Lượng</th>
                    <th>Tổng Giá</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!isset($_SESSION['cart'])){
                    $_SESSION['cart'] = [];
                }
                $index = 0;
                $total = 0;
                    foreach($_SESSION['cart'] as $item){
                       $total += $item['discount'] * $item['num'];
                        echo '<tr>
                        <td>'.(++$index).'</td>
                        <td><img src="'.$item['thumbnail'].'" alt="" style="height: 80px;"></td>
                        <td>'.$item['title'].'</td>
                        <td>'.number_format($item['discount']).' VND</td>
                        <td style="display: flex;">
                            <button class="btn btn-light" style="border: 1px solid #42e3f5;" onclick="addMoreCart('.$item['id'].',-1)">-</button>
                            <input type="number" id="num_'.$item['id'].'" class="form-control text-center" value="'.$item['num'].'" style="width: 90px;" onchange="fixCartNum('.$item['id'].')">
                            <button class="btn btn-light" style="border: 1px solid #42e3f5;" onclick="addMoreCart('.$item['id'].',1)">+</button>

                        </td>
                        <td>'.number_format($item['discount'] * $item['num']).' VND</td>
                        <td><button class="btn btn-danger" onclick="updateCart('.$item['id'].', 0)">Xóa</button></td>
                    </tr>';
                    }
                ?>
                
            </tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <th>Tổng Tiền</th>
              <td><?=number_format($total)?> VND</td>
              <td></td>
            </tr>
        </table>
        <div class="button" >

          <a href="checkout.php"><button class="btn btn-success">Tiếp Tục Thanh Toán</button></a>
          <a href="#remove_cart"><button class="btn btn-secondary" onclick="removeAllCart()">Xóa Giỏ Hàng</button></a>
        </div>
        
      </div>
    </div>
    <script type="text/javascript">
        function addMoreCart(id, delta){
          num = parseInt($('#num_' + id).val());
          num += delta;
          if(num < 1) num = 1;
          
            $('#num_' + id).val(num);
          updateCart(id, num);
        }
        function fixCartNum(id){
          $('#num_' + id).val(Math.abs($('#num_' + id).val()));
          updateCart(id, $('#num_' + id).val());
            
        }
        function updateCart(productId, num){
          $.post('api/ajax_request.php', {
            'action': 'update_cart',
            'id': productId,
            'num': num
          }, function(data){
            location.reload();
          })
        }
        function removeAllCart(){
          option = confirm("Bạn có chắc chắn muốn xóa giỏ hàng?");
          if(option){
            $.post('api/ajax_request.php', {
              'action': 'remove_all_cart'
            }, function(data){
              location.reload();
            })
          }
        }
      </script>
      <!-- footer -->
<?php
  require_once('layouts/footer.php');
?>
      