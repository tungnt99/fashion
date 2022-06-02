<?php
  require_once('layouts/header.php');
  $category_id = getGet('id');
  if($category_id == null || $category_id == ''){
    $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id order by product.updated_at desc limit 0,12";
    
  }else{

      $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id where product.category_id = $category_id order by product.updated_at desc limit 0,12";
  }
$lastestItems = executeResult($sql);
?>
    
    <div class="container">

      <h1 class="section_title">Sản Phẩm Mới Nhất</h1>
      <div class="row">
        <?php
            foreach($lastestItems as $item){
              echo '
              <div class="col-md-3 col-6 product-item">
                
                    <div class="product-item-content">
                    <div class="product-item-img">
                      <a href="detail.php?id='.$item['id'].'">

                        <img src="'.$item['thumbnail'].'" alt="" style="width: 100%; height: 300px; ">
                      </a>
                    </div>
                    <p style="color: #333;">'.$item['category_name'].'</p>
                    <a href="detail.php?id='.$item['id'].'">
                      <p style="font-weight: bold;color: #333;">'.$item['title'].'</p>
                    </a>
                    <p style="color: red;font-weight: bold;">'.number_format($item['discount']).' VND</p>
                    <p><button class="btn btn-success" onclick="addCart('.$item['id'].', 1)" style="width: 100%">Thêm Giỏ Hàng</button></p>

                    </div>
                
              </div>';
            }
            ?>
            
      </div>
    </div>
  
      <!-- footer -->
<?php
  require_once('layouts/footer.php');
?>
      