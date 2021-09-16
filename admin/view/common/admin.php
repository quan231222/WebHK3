<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Trị Hệ Thống</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <?php include_once('layout/header.php') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <?php include_once('layout/left.php') ?>
            </div>
            <div class="col-sm-9">
                <?php include_once('layout/main.php') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <?php include_once('layout/footer.php') ?>
            </div>
        </div>
    </div>
</body>
</html>