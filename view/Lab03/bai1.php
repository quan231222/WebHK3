<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kiểm tra thời gian sử dụng thẻ</title>
    <style>
        div {
            position: absolute;
            top: 100px;
            left: 525px;
            background-color: #3DED97;
            width: 500px;
            border-radius: 25px;
        }

        h2, h3, p {
            color: #ffa500;
            text-align: center;
            margin: 0;
        }

        input, textarea {
            display: block;
            margin: auto;
            background-color: #98FB98;
            border-radius: 10px;
            border-color: #ADFF2F;
        }
    </style>
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
                $message .= '<h3 style="color:#ffa500">Thẻ của bạn đã hết hạn cách đây: ' . $result . '.</h3>';
            } else {
                $message .= '<h3 style="color:#ffa500">Thẻ của bạn còn thời hạn: ' . $result . '.</h3>';
            }
        }
    }
    ?>
    <div>
        <h3>Kiểm Tra Thời Gian Sử Dụng Thẻ Và Hiển Thị Thông Báo</h3> <br>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <p>Chọn ngày đăng ký thẻ:</p>
            <input type="date" name="date1" style="color: #ffa500;" value="<?php if (isset($date1)) echo $date1; ?>"> <br /><br />
            <p>Chọn ngày hết hạn thẻ:</p>
            <input type="date" name="date2" style="color: #ffa500;" value="<?php if (isset($date2)) echo $date2; ?>"> <br /><br />
            <input type="hidden" name="action" value="validation">
            <input type="submit" value="Kiểm Tra" style="color: #ffa500;">
            <h2>Kết quả:</h2>
            <?php !empty($message) ? print($message) : ""; ?>
        </form>
    </div>  
</body>
</html>