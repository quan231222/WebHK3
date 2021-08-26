<html>
    <head>
        <title>S, C hình tròn</title>
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
            define("pi",3.14);
            if(!empty($action)&&$action='circle') {
                $R = filter_input(INPUT_POST,'R');
                if($R!==false) {
                    if($R>0) {
                        $r =  "Bán kính hình tròn: " . $R;
                        $C =  "Chu vi hình tròn: " . 2*pi*$R;
                        $S =  "Diện tích hình tròn: " . pi*pow($R,2);
                        $kq = "$r 
                                $C 
                                $S";
                    }
                    else {
                        $kq = "Bạn nên nhập R có giá trị lớn hơn 0!!!";
                    }
                }
            }
        ?>
        <div>
            <h2 class="text" style="color: #ffa500; margin-top: 10px">Tính chu vi và diện tích của hình tròn</h2>
            <hr style="color: #5DBB63;">
            <form action="<?php echo get_url('?v=Lab02&a=bai3')?>" method="post">
                <p>Nhập bán kính của hình tròn:</p>
                <input type="text" name="R">
                <p>Kết quả</p>
                <textarea cols="50" rows="3" style="overflow: hidden;"><?php echo !empty($kq)?$kq:"";?></textarea>   
                <input type="hidden" name="action" value="circle"><br><br>
                <input type="submit" value="Giải" style="color: ffa500">
            </form>
        </div>
    </body>
</html>