<?php
    db_connect();
    if(is_submit('addcat')) {
        $tendm = input_value('tendm');
        $sql = "insert into danhmucsanpham(tendm) values(:tendm)";
        $params = [
            'tendm' => $tendm
        ];
        if(!empty($tendm) && db_execute($sql,$params)) {
            redirect(get_url('admin/.'));
        }
    }
    db_disconnect();
?>
<h5>Thêm danh mục</h5>
<form action="" method="post">
    <table>
        <tr>
            <td>
                Tên danh mục sản phẩm
            </td>
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