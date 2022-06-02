<?php
  require_once('layouts/header.php');
  // $sql = "select Product.*, Category.name as category_name from Product left join Category on Product.category_id = Category.id order by Product.updated_at desc limit 0,8";
  //   $lastestItems = executeResult($sql);
?>
    <!-- banner start -->
    <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./assets/photo/uniqlo1.jpg" alt="Los Angeles">
    </div>
    <div class="carousel-item">
      <img src="./assets/photo/uniqlo2.jpg" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img src="./assets/photo/uniqlo3.jpg" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
    <!-- banner stop -->
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
      <!-- Danh Mục Sản Phẩm -->
      <?php
      $count = 0;
      foreach($menuItems as $item){
        $sql = "select product.*, category.name as category_name from product left join category on product.category_id = category.id where product.category_id = ".$item['id']." order by product.updated_at desc limit 0,4";
        $items = executeResult($sql);
        if($items == null || count($items) < 4) continue;
        ?>
        <div style="background-color: <?=($count++%2 == 0)?'#f7f9fa':''?>;">
      
          <div class="container">
            
            <h1 class="section_title"><?=$item['name']?></h1>
            <div class="row">
                    <?php
                        foreach($items as $productItem){
                          echo '
                          <div class="col-md-3 col-6 product-item">
                            
                              <div class="product-item-content">
                                <div class="product-item-img">
                                <a href="detail.php?id='.$productItem['id'].'">
                                  <img src="'.$productItem['thumbnail'].'" alt="" style="width: 100%; height: 300px; ">
                                </a>


                                  </div>
                                <p style="color: #333;">'.$productItem['category_name'].'</p>
                                <a href="detail.php?id='.$productItem['id'].'">

                                  <p style="font-weight: bold;color: #333;">'.$productItem['title'].'</p>
                                </a>
                                <p style="color: red;font-weight: bold;">'.number_format($productItem['discount']).' VND</p>
                                <p><button class="btn btn-success" onclick="addCart('.$item['id'].', 1)" style="width: 100%">Thêm Giỏ Hàng</button></p>

                                </div>
                            
                          </div>';
                        }
                        ?>
                        
                  </div>
                </div>
          </div>
        <?php
      }
      ?>
       
      <!-- Danh Mục Sản Phẩm -->
      <!-- footer -->
<?php
  require_once('layouts/footer.php');
?>
      