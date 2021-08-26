<html>
    <head>
        <title>Giải phương trình bậc hai</title>
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
                                                <!-- PHP -->
        <?php
            $action = filter_input(INPUT_POST,'action');
            $kq = "";
            if(!empty($action)&&$action=='gpt') {
                $a = filter_input(INPUT_POST,'a');
                $b = filter_input(INPUT_POST,'b');
                $c = filter_input(INPUT_POST,'c');
                if($a!== false && $b!== false && $c!== false){
                    if($a==0)
                        if($b==0)
                            if($c==0) {
                                $kq = "Phương trình vô số nghiệm!";
                            }
                            else {
                                $kq = "Phương trình vô nghiệm!";
                            }
                        else {
                            $x = -$c/$b;
                            $kq = "Phương trình có 1 nghiệm: $x";
                        }
                    else {
                        $delta = pow($b,2)-4*$a*$c;
                        if($delta>0) {
                            $x1 = (-$b + sqrt($delta)) / (2 * $a);
                            $x2 = (-$b - sqrt($delta)) / (2 * $a);
                            $kq = "Phương trình có 2 nghiệm: 
                                            x1 = $x1;
                                            x2 = $x2;";
                        }
                            elseif ($delta == 0) {
                                $x = -$b / (2*$a);
                                $kq = "Phương trình có nghiệm kép
                                        x1 = x2 = $x";
                            }
                                else {
                                    $kq = "Phương trình vô nghiệm!";
                                }
                    }
                }
            }
            $kq = ($kq);
        ?>
                                            <!-- Giao dien -->
        <div>
            <h2 class="text" style="color: #ffa500; margin-top: 10px">Giải phương trình bậc 2</h2>
            <hr style="color: #5DBB63;">
            <form action="<?php echo get_url('?v=Lab02&a=bai2') ?> " method="post">
                
                <p>Hệ số a: </p>
                <input type="text" name="a" align="center">
                <p>+</p>

                <p>Hệ số b: </p>
                <input type="text" name="b">
                <p>+</p>
                
                <p>Hệ số c: </p>
                <input type="text" name="c">
                <p>=</p>
                <p>Kết quả</p> <br>
                <textarea cols="50" rows="3" style="overflow: hidden;"><?php echo !empty($kq)?$kq:"";?></textarea>   
                <input type="hidden" name="action" value="gpt"><br><br>
                <input type="submit" value="Giải" style="color: ffa500">
            </form>
        </div>
    </body>
</html>