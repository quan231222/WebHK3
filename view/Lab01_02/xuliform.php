<html>
    <head>
        <title>Xử lí form</title>
    </head>
    </body>
        <?php
            if(!empty(filter_input(INPUT_POST,'action'))
                && filter_input(INPUT_POST,'action') == 'demo')
                {
                    $ten = filter_input(INPUT_POST,'ten');
                    $xuat_ten = "Chào bạn " . $ten;
                }
        ?>

        <form action="<?php echo get_url('?v=Lab01_02&a=xuliform') ?>" method="post">
            <input type="hidden" name="action" value="demo">
            <table style="margin: 25px; width: 400px;">
                <tr>
                    <td colspan="2">In lời chào</td>
                </tr>
                <tr>
                    <td>Họ tên của bạn</td>
                    <td><input type="text" name="ten" value="<?php if(!empty($ten)) echo $ten?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label>
                            <?php if(!empty($xuat_ten)) echo $xuat_ten; ?>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="chao" value="Xuất"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
