<?php
   if(is_submit('addcat')){
       db_connect();
       $tendm = input_value('tendm');
       $sql = "insert into danhmucsanpham(tendm) values(:tendm)";
       $params = [
           'tendm'=> $tendm
       ];
       if(!empty($tendm) && db_execute($sql,$params))
       {
          redirect(get_url('admin/.'));
       }
       db_disconnect();
   }
?>
<style>
    table,tr,td{
        padding:0.5em;
    }
</style>
<h5 class="text-primary">Thêm danh mục</h5>
<form action="" method="post">
<table>
    <tr>
        <td>Tên danh mục</td>
        <td>
            <input type="text" name="tendm" id="">
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="hidden" name="action" value="addcat">
            <input type="submit" value="Thêm danh mục">
        </td>
    </tr>
</table>
</form>
<p>
    <a href="<?php echo get_url('admin/.'); ?>">Quản lý danh mục</a>
</p>