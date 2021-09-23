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
    const PI = '3.14';

    if (!empty($action) && $action = 'click') {
        $R = filter_input(INPUT_POST, 'r');
        $C_circle = "Chu vi của hình tròn: " . C_circle($R);
        $S_circle = "Diện tích của hình tròn: " . S_circle($R);
        $kq = $C_circle . "\n" . $S_circle;
    }

    function C_circle($R)
    {
        $chuvi = 2 * PI * $R;
        return $chuvi;
    }

    function S_circle($R)
    {
        $dientich = PI * $R * $R;
        return $dientich;
    }


    ?>
    <!-- Giao dien -->
    <div>
        <h2 class="text" style="color: #ffa500; margin-top: 10px">Chu vi và diện tích hình tròn</h2>
        <hr style="color: #5DBB63;">
        <form action="<?php echo get_url('?v=Lab05&a=bai2') ?> " method="post">
            <p>Bán kính hình tròn: </p>
            <input type="text" name="r" align="center">
            <p>Kết quả</p> <br>
            <textarea cols="50" rows="3" style="overflow: hidden;"><?php echo !empty($kq) ? $kq : ""; ?></textarea>
            <input type="hidden" name="action" value="click"><br><br>
            <input type="submit" value="Giải" style="color: ffa500">
        </form>
    </div>
</body>

</html>