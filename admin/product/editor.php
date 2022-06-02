<?php
	
    $title = "Thêm/Sửa Sản Phẩm";
    $baseUrl = '../';
    require_once('../layouts/header.php');
    $id = $thumbnail = $title = $price = $discount = $category_id = $description = '';

    require_once('form_save.php');
     $id = getGet('id');
     if($id != '' && $id > 0){
         $sql = "select * from product where id = '$id' and deleted = 0";
         $categoryItems = executeResult($sql, true);
         if($categoryItems != null){
            $thumbnail = $categoryItems['thumbnail'];
            $title = $categoryItems['title'];
            $price = $categoryItems['price'];
            $discount = $categoryItems['discount'];
            $category_id = $categoryItems['category_id'];
            $description = $categoryItems['description'];
             
         }else{
             $id = 0;
         }
     }else{
         $id = 0;
     }
    $sql = "select * from Category";
    $categoryItems = executeResult($sql);
   
?>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>


<div class="row mt-3">
    <div class="col-md-12">
        <h3>Thêm/Sửa Sản Phẩm</h3>
        <div class="panel panel-primary ">
			
			<div class="panel-body">
				<form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-9 col-12" >
                        <div class="form-group">
                            <label for="title">Tên Sản Phẩm:</label>
                            <input required type="text" class="form-control" id="title" name="title" value="<?= $title ?>">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Thông Tin Sản Phẩm:</label>
                            <textarea required class="form-control" id="description" name="description"><?= $description ?></textarea>
                        </div>

                            <button class="btn btn-success">Lưu Sản Phẩm</button>

                    </div>
                    <div class="col-md-3 col-12" style="border: 1px solid #333; padding: 10px ">
                        <div class="form-group">
                            <label for="thumbnail">Hình Ảnh:</label>
                            <input required type="file" class="form-control" id="thumbnail" name="thumbnail" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" >
                            <img id="thumbnail_img" style="max-height: 160px; margin: 5px 0 15px 0;" src="<?=fixUrl($thumbnail)?>" alt="">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Danh Mục:</label>
                            <select class="form-control" name="category_id" id="category_id" required>
                                <option value="">--Chọn--</option>
                                <?php
                                foreach($categoryItems as $category){
                                    if($category['id'] == $category_id){
                                        echo '<option selected value="'.$category['id'].'">'.$category['name'].'</option>';

                                    }else{

                                        echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
                                    }
                                }
                                ?>
                            </select>
                            <input type="text" name="id" value="<?=$id?>" hidden>
                        </div>

                        
                        <div class="form-group">
                            <label for="price">Giá Cũ:</label>
                            <input required type="number" class="form-control" id="price" name="price" value="<?= $price ?>">
                        </div>
                    
                        <div class="form-group">
                            <label for="discount">Giá Mới:</label>
                            <input required type="number" class="form-control" id="discount" name="discount" value="<?= $discount ?>">
                        </div>
                    
                    </div>
                </div>
                    
				    
				   
                </form>
                        
			</div>
		</div>
    </div>
</div>
<script type="text/javascript">
    function updateThumbnail(){
        $('#thumbnail_img').attr('src', $('#thumbnail').val());
    }
</script>
<script>
    $('#description').summernote({
        placeholder: 'Nhập Thông Tin Sản Phẩm',
        tabsize: 2,
        height: 300,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
</script>
<?php
    require_once('../layouts/footer.php');
?>