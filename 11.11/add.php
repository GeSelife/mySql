<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加信息</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-offset-2">
            <!--提交地址 提交方式  提交类型/内容-->
            <form action="./addInsert.php" method="post" enctype="application/x-www-form-urlencoded">
                <div class="form-group">
                    <label for="exampleInputEmail1">姓名</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="姓名" name="names">
                </div>
                <div class="form-group">
                    <label>性别</label>
                    <input type="radio" name="sex" value="男"> 男
                    <input type="radio" name="sex" value="女"> 女
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">年龄</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="年龄" name="age">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">岗位</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="岗位" name="job">
                </div>
                <button type="submit" class="btn btn-info">添加</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
