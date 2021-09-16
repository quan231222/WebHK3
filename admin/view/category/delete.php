<?php
   if(is_submit("deletecat")){
       db_connect();
       $iddm = input_value("id");
       $sql = "delete from danhmucsanpham where iddm = :iddm";
       $params = [
           'iddm'=>$iddm
       ];
       if(!empty($iddm) && db_execute($sql,$params)){
            redirect(get_url('admin/.'));
       }
       db_disconnect();
   }
?>
<style>
   table, tr,td{
       padding: 0.5em;
   }
</style>
<h5>Xác nhận thông tin</h5>
<h6>Bạn có muốn xóa danh mục này không ?</h6>
<form action="" method="post">
    <table>
        <tr>
            <td>
                <input type="hidden" name="action" value="deletecat">
                <input type="submit" value="Chấp nhận">
            </td>
            <td>
                <a href="<?php echo get_url('admin/.'); ?>">Không</a>
            </td>
        </tr>
    </table>
</form>