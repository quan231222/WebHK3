<?php
   db_connect();
   $sql = 'select * from danhmucsanpham';
   $dmsp = db_get_list($sql);
   db_disconnect();
?>
<style>
    table, tr,td, th{
        border:1px solid black;
        border-collapse: collapse;
        padding:0.5em 1em;
    }
    table{
        margin:5px;
    }
</style>
<h5 class="text-primary">Danh mục sản phẩm:</h5>
<table>
    <tr>
        <th>Mã DM</th>
        <th>Tên Danh Mục</th>
        <th>Hành Động</th>
    </tr>
    <?php 
       if(!empty($dmsp)): 
          foreach($dmsp as $dm):
    ?>
    <tr>
        <td><?php echo $dm['iddm']; ?></td>
        <td><?php echo $dm['tendm']; ?></td>
        <td>
            <a href="<?php echo get_url("admin/?c=editcat&id=" . $dm['iddm']); ?>">Sửa</a> | 
            <a href="<?php echo get_url("admin/?c=deletecat&id=" . $dm['iddm']); ?>">Xóa</a>
        </td>
    </tr>
    <?php endforeach; endif;?>
</table>
<p>
    <a href="<?php echo get_url('admin/?c=addcat'); ?>">Thêm danh mục</a>
</p>
