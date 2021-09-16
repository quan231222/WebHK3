<?php
   db_connect();
   $iddm = input_value('id');
   if(!empty($iddm))
   {
      $sql = "select * from danhmucsanpham where iddm=:iddm";
      $params = [
          'iddm'=>$iddm
      ];
      $dmsp = db_get_row($sql,$params);
   }
      
   if(is_submit('editcat')){
       $tendm = input_value('tendm');
       $sql = "update danhmucsanpham set tendm=:tendm where iddm=:iddm";
       $params = [
           'iddm'=> $iddm,
           'tendm'=> $tendm
       ];
       if(!empty($tendm) && db_execute($sql,$params))
       {
          redirect(get_url('admin/.'));
       }
       redirect(get_url('admin/.'));
   }
   db_disconnect();
?>
<style>
    table,tr,td{
        padding:0.5em;
    }
</style>
<h5 class="text-primary">Sửa danh mục</h5>
<form action="" method="post">
<table>
    <tr>
        <td>Tên danh mục</td>
        <td>
            <input type="text" name="tendm" id="" value="<?php if(!empty($dmsp)) echo $dmsp['tendm']; ?>">
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="hidden" name="action" value="editcat">
            <input type="submit" value="Sửa danh mục">
        </td>
    </tr>
</table>
</form>
<p>
    <a href="<?php echo get_url('admin/.'); ?>">Quản lý danh mục</a>
</p>