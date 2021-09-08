<?php
    session_set_cookie_params(86400 + '/'); //set them time cho coookie
    session_start();
    $fullname = $_SESSION['fullname'];

    echo "Fullname: " . $fullname;
?>