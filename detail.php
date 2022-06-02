<?php
  require_once('layouts/header.php');
  $product_id = getGet('id');
  $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id where product.id = $product_id";
  $product = executeResult($sql, true);
  
  $category_id = $product['category_id'];
  $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id where product.category_id = $category_id order by product.updated_at desc limit 0,4";
$lastestItems = executeResult($sql);
?>
<style>
    .breadcrumb{
        background-color: transparent;
        margin-bottom: 20px;
        padding: 0px;
    }
    .breadcrumb li {
        margin-right: 10px;
        
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="<?=$product['thumbnail']?>" style="width: 100%;" alt="">
        </div>
        <div class="col-md-6">
            <ul class="breadcrumb">
                <li><a href="index.php">Trang Chủ</a></li>
                <li><a href="category.php?id=<?=$product['category_id']?>">><?=$product['category_name']?></a></li>
                <li>><?=$product['title']?></li>
            </ul>
            <h2><?=$product['title']?></h2>
            <!-- Đánh giá sao và số lượng bán -->
            <ul style="display: flex; list-style-type: none; margin: 0px; padding: 0px;">
                <li style="color: orange; font-size: 13pt; padding-top: 2px; margin-right: 5px;">5.0</li>
                <li style="color: orange; padding: 2px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                </svg>
                </li>
                <li style="color: orange; padding: 2px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                </svg>
                </li>
                <li style="color: orange; padding: 2px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                </svg>
                </li>
                <li style="color: orange; padding: 2px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                </svg>
                </li>
                <li style="color: orange; padding: 2px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                </svg>
                </li>
                <li style="margin-left: 20px; border-left: solid #dad7d7 1px; font-size: 13pt; padding-top: 3px; padding-left: 20px;">2,468 Đã Bán</li>
            </ul>
            <!-- Giá sản phẩm -->
            <p style="color: red;font-weight: bold; margin: 15px 0"><?=number_format($product['discount'])?> VND</p>
            <p style="color: grey;font-weight: bold; margin: 15px 0;text-decoration: line-through;"><?=number_format($product['discount'])?> VND</p>
            <!-- Chọn số lượng -->
            <div style="display: flex;">
                <button class="btn btn-light" style="border: 1px solid #42e3f5;" onclick="addMoreCart(-1)">-</button>
                <input type="number" name="num" class="form-control" step="1" value="1" style="max-width: 80px; text-align: center; margin: 0 5px;" onchange="fixCartNum()">
                <button class="btn btn-light" style="border: 1px solid #42e3f5;" onclick="addMoreCart(1)">+</button>
            </div>
            <button class="btn btn-success" style="margin-top: 20px;" onclick="addCart(<?=$product['id']?>, $('[name=num]').val())">Thêm Vào Giỏ Hàng</button>
            <button class="btn btn-danger" style="margin-top: 20px; display: block;">Xem Giỏ Hàng</button>

        </div>
        <div class="col-md-12">
            <h3>Chi Tiết Sản Phẩm</h3>
            <?=$product['description']?>
        </div>
    </div>
</div>
    
    <div class="container">

      <h1 class="section_title">Sản Phẩm Liên Quan</h1>
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
                    <p style="color: red;font-weight: bold; text-decoration: underline;">'.number_format($item['discount']).' VND</p>
                    <p><button class="btn btn-success" onclick="addCart('.$item['id'].', 1)" style="width: 100%">Thêm Giỏ Hàng</button></p>
                    </div>
                
              </div>';
            }
            ?>
            
      </div>
    </div>
      
      <!-- footer -->
      <script type="text/javascript">
        function addMoreCart(delta){
          num = parseInt($('[name=num]').val());
          num += delta;
          if(num < 1) num = 1;
          
            $('[name=num]').val(num);
          
        }
        function fixCartNum(){
          
          $('[name=num]').val(Math.abs($('[name=num]').val()));
        }
       
      </script>
<?php
  require_once('layouts/footer.php');
?>
      