<?php


?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>导航添加</title>
    <style>
        form div{
            padding: 10px;
        }
    </style>
</head>
<body>
<form action="./save.php" method="post" enctype="application/x-www-form-urlencoded">
    <div class="form-group">
        <label for="exampleInputEmail1">导航名称</label>
        <input type="text" class="form-control" name="nnames" id="exampleInputEmail1" placeholder="请输入导航名称">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">导航地址</label>
        <input type="text" class="form-control" name="nurl" id="exampleInputPassword1" placeholder="请输入导航地址">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">导航排序</label>
        <input type="text" class="form-control" name="nsort" id="exampleInputPassword1" placeholder="请输入数字排序">
    </div>
    <button type="submit" class="btn btn-info">提交</button>
</form>

</body>
</html>
