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
            $dk = 0.0001;
            $kq = "";
            if(!empty($action)&&$action='tamgiac') {
                $A = filter_input(INPUT_POST,'a');
                $B = filter_input(INPUT_POST,'b');
                $C = filter_input(INPUT_POST,'c');
                if($A+$B>$C&&$B+$C>$A&&$A+$C>$B) {
                    if($A == $B && $B == $C) 
                    {
                        $kq = "Đây là tam giác đều";
                    }
                    else if ($A == $B || $B == $C || $A == $C) 
                    {
                        if (      abs($A*$A+$B*$B-$C*$C) <= 0 
                                ||abs($A*$A-$B*$B+$C*$C) <= 0 
                                ||abs(-$A*$A+$B*$B+$C*$C) <= 0 )
                        {
                            $kq = "Đây là  tam giác vuông cân";
                        }
                        else
                        {
                            $kq = "Đây là tam giác cân";
                        }

                    }
                    else if (     abs($A*$A+$B*$B-$C*$C) <= 0 
                                ||abs($A*$A-$B*$B+$C*$C) <= 0 
                                ||abs(-$A*$A+$B*$B+$C*$C) <= 0 ) 
                    {
                        $kq = "Đây là tam giác vuông";
                    }
                }
                else {
                    $kq = "Đây không phải là tam giác";
                }
            }
        ?>
                                            <!-- Giao dien -->
        <div>
            <h2 class="text" style="color: #ffa500; margin-top: 10px">Kiểm tra loại tam giác</h2>
            <hr style="color: #5DBB63;">
            <form action="<?php echo get_url('?v=Lab02&a=bai5') ?> " method="post">
                
                <p>Độ dài cạnh AB: </p>
                <input type="text" name="a" align="center">
                <p>+</p>

                <p>Độ dài cạnh BC: </p>
                <input type="text" name="b">
                <p>+</p>
                
                <p>Độ dài cạnh AC: </p>
                <input type="text" name="c">
                <p>=</p>
                <p>Kết quả</p> <br>
                <textarea cols="50" rows="3" style="overflow: hidden;"><?php echo !empty($kq)?$kq:"";?></textarea>   
                <input type="hidden" name="action" value="tamgiac"><br><br>
                <input type="submit" value="Giải" style="color: ffa500">
            </form>
        </div>
    </body>
</html>