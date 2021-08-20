<?php
    if(isset($_POST['action']) && $_POST['action'] == 'gui') {
        $fullname = isset($_POST['fullname'])?$_POST['fullname']:'';
        echo "Xin chao ban: " . $fullname;
    }
?>
