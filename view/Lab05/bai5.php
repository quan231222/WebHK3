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
    <body>                                                <!-- PHP -->
        <?php
            $action = filter_input(INPUT_POST,'action');
            if(!empty($action)&&$action='click') {
                $A = filter_input(INPUT_POST,'a');
                $B = filter_input(INPUT_POST,'b');
                $C = filter_input(INPUT_POST,'c');
                function ketqua ($A, $B, $C) {
                    $type_triangle = type_triangle($A, $B, $C);
                    $C_triangle = "Chu vi của tam giác: " . C_triangle($A, $B, $C);
                    $S_triangle ="Diện tích của tam giác: " . S_triangle($A, $B, $C);
                    $tonghop = $type_triangle."\n" . $C_triangle."\n" . $S_triangle;
                    return $tonghop;
                }
                $kq = ketqua($A, $B, $C);
            }

            function check_triangle ($A, $B, $C) {
                if($A+$B>$C&&$B+$C>$A&&$A+$C>$B)
                    return true;
                else  
                    return false; 
            }

            function C_triangle ($A, $B, $C) {
                if(check_triangle ($A, $B, $C)) {
                    $chuvi = $A + $B + $C;
                    return $chuvi;
                }
            }

            function S_triangle ($A, $B, $C) {
                if(check_triangle ($A, $B, $C)) {
                    $chuvi = C_triangle($A, $B, $C);
                    $p = $chuvi/2;
                    $dientich = sqrt($p*($p-$A)*($p-$B)*($p-$C));
                    return $dientich;
                }
            }
            
            function type_triangle ($A, $B, $C) {
                if(check_triangle ($A, $B, $C)) {
                    if($A == $B && $B == $C) {
                        return "Đây là tam giác đều";
                    }
                    else if ($A == $B || $B == $C || $A == $C) {
                        if (      abs($A*$A+$B*$B-$C*$C) <= 0 
                                ||abs($A*$A-$B*$B+$C*$C) <= 0 
                                ||abs(-$A*$A+$B*$B+$C*$C) <= 0 )
                        {
                            return "Đây là  tam giác vuông cân";
                        }
                        else
                        {
                            return "Đây là tam giác cân";
                        }

                    }
                    else if (     abs($A*$A+$B*$B-$C*$C) <= 0 
                                ||abs($A*$A-$B*$B+$C*$C) <= 0 
                                ||abs(-$A*$A+$B*$B+$C*$C) <= 0 ) 
                    {
                        return "Đây là tam giác vuông";
                    }
                    else {
                        return "Đây không phải là tam giác";
                    }
                }
            }
        ?>
                                            <!-- Giao dien -->
        <div>
            <h2 class="text" style="color: #ffa500; margin-top: 10px">Kiểm tra loại tam giác</h2>
            <hr style="color: #5DBB63;">
            <form action="<?php echo get_url('?v=Lab05&a=bai5') ?> " method="post">
                
                <p>Độ dài cạnh thứ nhất: </p>
                <input type="text" name="a" align="center">
                <p>+</p>

                <p>Độ dài cạnh thứ hai: </p>
                <input type="text" name="b">
                <p>+</p>
                
                <p>Độ dài cạnh thứ ba: </p>
                <input type="text" name="c">
                <p>=</p>
                <p>Kết quả</p> <br>
                <textarea cols="50" rows="3" style="overflow: hidden;"><?php echo !empty($kq)?$kq:"";?></textarea>   
                <input type="hidden" name="action" value="click"><br><br>
                <input type="submit" value="Giải" style="color: ffa500">
            </form>
        </div>
    </body>
</html>