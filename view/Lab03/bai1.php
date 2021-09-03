<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kiểm tra thời gian sử dụng thẻ</title>
</head>

<body>
    <?php
    $action = filter_input(INPUT_POST, 'action');
    $message = "";
    if (!empty($action) && $action == 'validation') {
        $date1 = filter_input(INPUT_POST, 'date1');
        $date2 = filter_input(INPUT_POST, 'date2');
        if ($date1 !== false && $date2 !== false) {
            $now = new DateTime($date1);
            $exp = new DateTime($date2);
            $diff = $now->diff($exp);
            // Display a message
            $result = $diff->format('%y năm, %m tháng, và %d ngày');
            if ($diff->format('%R') == '-') {
                $message .= '<h3 style="color:red">Thẻ của bạn đã hết hạn cách đây: ' . $result . '.</h3>';
            } else {
                $message .= '<h3 style="color:red">Thẻ của bạn còn thời hạn: ' . $result . '.</h3>';
            }
        }
    }
    ?>
    <h3 style="color:blue">Kiểm Tra Thời Gian Sử Dụng Thẻ Và Hiển Thị Thông Báo</h3>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        Chọn ngày đăng ký thẻ:
        <input type="date" name="date1" value="<?php if (isset($date1)) echo $date1; ?>"> <br /><br />
        Chọn ngày hết hạn thẻ:
        <input type="date" name="date2" value="<?php if (isset($date2)) echo $date2; ?>"> <br /><br />
        <input type="hidden" name="action" value="validation">
        <input type="submit" value="Kiểm Tra">
        <h2>Kết quả:</h2>
        <?php !empty($message) ? print($message) : ""; ?>
    </form>