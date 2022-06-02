<div class="footer">
  <?php
    if(!isset($_SESSION['cart'])){
      $_SESSION['cart'] = [];
    }
    $count = 0;
    foreach($_SESSION['cart'] as $item){
      $count += $item['num'];
    }
  ?>
        <h1>Đây là phần footer tự phát triển sau</h1>
        
        <!-- Cart start -->
        <span class="cart_icon">
          <span class="cart_count"><?=$count?></span>
          <a href="cart.php"><img src="https://gokisoft.com/img/cart.png" alt=""></a>
        </span>
        <!-- Cart stop -->
      </div>
      <script type="text/javascript">
        function addCart(productId, num){
          $.post('api/ajax_request.php', {
            'action': 'cart',
            'id': productId,
            'num': num
          }, function(data){
            location.reload();
          })
        }
  </script>
</body>
</html>

