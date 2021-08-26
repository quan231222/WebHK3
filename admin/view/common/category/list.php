<?php
    db_connect();
    $sql = "SELECT * FROM danhmucsanphan";
    $dmsp = db_get_list($sql);
    db_disconnect();
?>
<h5>Danh mục sản phẩm</h5>
<table>
    <tr>
        <th>Mã danh mục</th>
        <th>Ten danh mục</th>
        <th>Hành động</th>
    </tr>
    <?php 
        if(!empty($dmsp)) :
            foreach($dmsp as $dm):
    ?>

    <tr>
        <td><?php echo $dm['iddm']; ?></td>
        <td><?php echo $dm['tendm']; ?></td>
        <td>
            <a href="<?php echo get_url('admin/?c=editcat&id=' . $dm['iddm']) ?>">Sửa</a> | 
            <a href="<?php echo get_url('admin/?c=deletecat&id=' . $dm['iddm']) ?>">Xóa</a>
        </td>
    </tr>

    <?php endforeach; endif; ?>
</table>
<p>
<a href="<?php echo get_url('admin/?c=deletecat&id=' . $dm['iddm']) ?>">Thêm danh mục</a>
</p>