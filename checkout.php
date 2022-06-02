<?php
  require_once('layouts/header.php');
  
?>
    
    <div class="container">

      <h1 class="section_title">Thanh Toán</h1>
      <form action="" method="post" onsubmit="return completeCheckout();">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="fullname">Họ & Tên:</label>
                    <input required type="text" class="form-control" id="fullname" name="fullname">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input required type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label for="phone_number">SĐT:</label>
                    <input required type="tel" class="form-control" name="phone_number" id="phone_number">
                </div>
                <div class="form-group">
                    <label for="address">Địa Chỉ:</label>
                    <input required type="text" class="form-control" name="address" id="address">
                </div>
                <div class="form-group">
                    <label for="note">Nội Dung:</label>
                    <textarea name="note" id="note" class="form-control" cols="30" rows="3"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                
                                <th>STT</th>
                                <th>Tiêu Đề</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Tổng Giá</th>
                                
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
                                    <td>'.$item['title'].'</td>
                                    <td>'.number_format($item['discount']).' VND</td>
                                    <td>'.$item['num'].'</td>
                                    <td>'.number_format($item['discount'] * $item['num']).' VND</td>
                                
                                </tr>';
                                }
                            ?>
                        </tbody>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Tổng Tiền</th>
                                <th><?=number_format($total)?> VND</th>
                                
                            </tr>
                    </table>
                    <a href=""><button class="btn btn-success" style="width: 100%;">Thanh Toán</button></a>
            </div>
        </div>
    </form>
    </div>
    <script type="text/javascript">
        function completeCheckout(){
            $.post('api/ajax_request.php', {
                'action': 'checkout',
                'fullname': $('[name = fullname]').val(),
                'email': $('[name = email]').val(),
                'phone_number': $('[name = phone_number]').val(),
                'address': $('[name = address]').val(),
                'note': $('[name = note]').val()
            }, function(){
                window.open('complete.php', '_self');
            })
            return false;
        }
    </script>
      <!-- footer -->
<?php
  require_once('layouts/footer.php');
?>
      