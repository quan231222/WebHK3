<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
</head>

<body>
    <form action="http://localhost:80/CodePHP/?v=test&a=kq" method="post">
        <table>
            <tr>
                <td>Fullname</td>
                <td><input type="text" name="fullname" id=""></td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type=hidden name="action" value="gui">
                    <input type="submit" value="Gui">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>