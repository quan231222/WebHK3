<?php
  //$content = Helper::input_value('c');
  $content = filter_input(INPUT_GET,'c');
  if(!empty($content))
  {
     switch($content)
     {
         case "":
            include_once("");
            break;      
     }
  }
  else
      include_once("view/common/home.php");    
?>