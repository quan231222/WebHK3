<?php
  //$content = Helper::input_value('c');
  $content = input_value('c');
  if(!empty($content))
  {
     switch($content)
     {
         case "addcat":
            include_once("view/category/add.php");
            break;
         case "deletecat":
            include_once("view/category/delete.php");
            break;
         case "editcat":
            include_once("view/category/edit.php");
            break;      
     }
  }
  else
      include_once("view/category/list.php");    
?>