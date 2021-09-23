<html>

<head>
    <title>Kiểm tra tam giác</title>
    <style>
        div {
            position: absolute;
            top: 100px;
            left: 525px;
            background-color: #3DED97;
            width: 500px;
            border-radius: 25px;
        }

        h2,
        p {
            color: #ffa500;
            text-align: center;
            margin: 0;
        }

        input,
        textarea {
            display: block;
            margin: auto;
            background-color: #98FB98;
            border-radius: 10px;
            border-color: #ADFF2F;
        }
    </style>
</head>

<body>
    <!-- PHP -->
    <?php
    $action = filter_input(INPUT_POST, 'action');
    if (!empty($action) && $action = 'click') {
        $kq = tong();
    }

    function tong()
    {
        $i = 1;
        $tong = 0;
        do {
            $tong = $tong + $i;
            $i++;
        } while ($i < 100);
        return $tong;
    }
    ?>
    <!-- Giao dien -->
    <div>
        <h2 class="text" style="color: #ffa500; margin-top: 10px">Tổng các số tự nhiên từ 1 đến 100</h2>
        <hr style="color: #5DBB63;">
        <form action="<?php echo get_url('?v=Lab05&a=bai1') ?> " method="post">
            <textarea cols="50" rows="3" style="overflow: hidden;"><?php echo !empty($kq) ? $kq : ""; ?></textarea>
            <input type="hidden" name="action" value="click"><br><br>
            <input type="submit" value="Hiển thị" style="color: ffa500">
        </form>
    </div>
</body>

</html>