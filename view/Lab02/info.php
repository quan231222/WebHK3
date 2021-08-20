<?php
   if(is_submit('dangky')){
       $hoten = input_value('hoten');
       $gioitinh = input_value('gioitinh');
       $ngaysinh = input_value('ngaysinh');
       $email = input_value('email',FILTER_VALIDATE_EMAIL);
       $honnhan = input_value('honnhan');
       $sothich = input_value('sothich',FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);
   }
?>
    <h4>Thông tin cá nhân bạn đã đăng ký</h4>
    Ho ten: <?php echo !empty($hoten)?$hoten:""; ?> <br>
    Gioi tinh: <?php echo  !empty($gioitinh)?$gioitinh:""; ?> <br>
    Ngay sinh: <?php echo !empty($ngaysinh)?$ngaysinh:""; ?> <br>
    Email: <?php echo  !empty($email)?$email:""; ?> <br>
    Hon nhan: <?php echo !empty($honnhan)?$honnhan:""; ?> <br>
    <h5>So thich:</h5>
<?php 
   if(!empty($sothich))
   {
       foreach ($sothich as $value){
           echo $value . " | ";
       }
   }
