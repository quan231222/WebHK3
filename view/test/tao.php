<?php
    setcookie('name', 'Teo', strtotime('+1 years'), '/');
    echo $_COOKIE['name'];
?>