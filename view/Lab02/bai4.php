<html>
    <head>
        <title>Nhận dạng mùa trong năm</title>
        <style>
            div {
                position: absolute;
                top: 100px;
                left: 525px;
                background-color: #3DED97;
                width: 500px;
                border-radius:25px;
            }
            h2, p {
                color: #ffa500;
                text-align: center;
                margin:0;
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
            $action= filter_input(INPUT_POST,'action');
            $kq = "";
            if(!empty($action)&&$action='mua') {
                $BIEN = filter_input(INPUT_POST,'bien');
                if($BIEN!==false) {
                    switch($BIEN) {
                        case 'x':
                            $kq = "Mùa xuân";
                            break;
                        case 'h':
                            $kq = "Mùa hạ";
                            break;
                        case 't':
                            $kq = "Mùa thu";
                            break;
                        case 'd':
                            $kq = "Mùa đông";
                            break;
                        default: $kq = "Bạn nên nhập giá trị thuộc 4 kí tự x, h, t, d!!!";
                    }
                }
            }
        ?>
        <div>
            <h2 class="text" style="color: #ffa500; margin-top: 10px">Mùa trong năm</h2>
            <hr style="color: #5DBB63;">
            <form action="<?php echo get_url('?v=Lab02&a=bai4')?>" method="post">
                <p>Nhập kí tự (x, h, t, d):</p>
                <input type="text" name="bien">
                <p>Kết quả</p>
                <textarea cols="50" rows="1" style="overflow: hidden;"><?php echo !empty($kq)?$kq:"";?></textarea>   
                <input type="hidden" name="action" value="mua"><br><br>
                <input type="submit" value="Giải" style="color: ffa500">
            </form>
        </div>
    </body>
</html>