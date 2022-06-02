<?php
  require_once('layouts/header.php');
  if(!empty($_POST)){
      $firstname = getPost('firstname');
      $lastname = getPost('lastname');
      $email = getPost('email');
      $phone_number = getPost('phone_number');
      $subject_name = getPost('subject_name');
      $note = getPost('note');
      $created_at = $updated_at = date('Y-m-d H:i:s');

      $sql = "insert into Feedback (firstname, lastname, email, phone_number, subject_name, note, status, created_at, updated_at) values('$firstname', '$lastname', '$email', '$phone_number', '$subject_name', '$note', 0, '$created_at', '$updated_at')";
      execute($sql);
  }
  
?>
    
    <div class="container">

      <h1 class="section_title">Phản Hồi</h1>
      <form action="" method="post" >
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input required type="text" class="form-control" id="firstname" name="firstname" placeholder="Nhập Tên">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input required type="text" class="form-control" id="lastname" name="lastname" placeholder="Nhập Họ">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <input required type="email" class="form-control" name="email" id="email" placeholder="Nhập Eamil">
                </div>
                <div class="form-group">
                    <input required type="tel" class="form-control" name="phone_number" id="phone_number" placeholder="Nhập SĐT">
                </div>
                <div class="form-group">
                    <input required type="text" class="form-control" name="subject_name" id="subject_name" placeholder="Nhập Chủ Đề">
                </div>
                <div class="form-group">
                    <label for="note">Nội Dung:</label>
                    <textarea name="note" id="note" class="form-control" cols="30" rows="3"></textarea>
                </div>
                <a href=""><button class="btn btn-success" style="width: 100%;">Gửi Phản Hồi</button></a>
            </div>
            <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6131996233603!2d105.7081978147311!3d21.00813668600957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313453ed4252233b%3A0x9952f8a5236a6ca6!2zMzEgxJDGsOG7nW5nIFBow7ogQ8aw4budbmcsIEFuIFBow7osIEhvw6BpIMSQ4bupYywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1653622674898!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </form>
    </div>
    
      <!-- footer -->
<?php
  require_once('layouts/footer.php');
?>
      