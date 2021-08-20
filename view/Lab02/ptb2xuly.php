<?php
    $action = filter_input(INPUT_POST,'action');
    $kq = "";
    if(!empty($action)&&$action=='gpt') {
        $a = filter_input(INPUT_POST,'a',FILTER_VALIDATE_FLOAT);
        $b = filter_input(INPUT_POST,'b',FILTER_VALIDATE_FLOAT);
        $c = filter_input(INPUT_POST,'c',FILTER_VALIDATE_FLOAT);
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
    $kq = nl2br($kq);
?>