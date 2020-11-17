<?php
include "../../lib/db.php";
/*
 * 导航展示
 *  分页
 *  url格式 index.php?page=1&limit=10
 *        index.php?page=1&limit
 *        index.php?page=1
 *  1.向上取整ceil(总数/当前页的数据数量limit) ==>点击按钮选择页码 => 页码
 *  2.当前页的数据page == page页的limit条数据
 *
 * 前台: 请求要查的page页的limit条  按钮数量由后台确定
 *       /index.php?page=2&limit=2
 * 后台: 响应=>某一页的若干条 --> 返回数据总数||总页数
 *
 */

//获取数据
$data = $_GET;

//分页 页码page  条数limit
//1.对分页条件进行初始化
if(isset($data['page']) && !empty($data['page'])){
    $page = $data['page'];
}else{
    $page = 1;
}
if(isset($data['limit']) && !empty($data['limit'])){
    $limit = $data['limit'];
}else{
    $limit = 3;
}
//获取页数
$countSql = "select count(*) as num from nav";
$countResult=$mysql->query($countSql)->fetch_assoc();
$total = $countResult['num'];
$totalPage=ceil($total/$limit);

//当前页的limit条  n=>limit (n-1)*limit,limit  --->偏移量
$offset = ($page - 1) * $limit;

$sql = "select * from nav order by nsort asc limit $offset,$limit";

$data = $mysql->query($sql)->fetch_all(MYSQLI_ASSOC);

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>导航</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        .hidden{
            display: none;
        }
    </style>
</head>
<body>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>序号</th>
            <th>名称</th>
            <th>地址</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody class="<?php echo empty($data)?'hidden':'';?>">
        <?php
            foreach ($data as $key=>$value) {
        ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td><?php echo $value['nnames']; ?></td>
            <td><?php echo $value['nurl']; ?></td>
            <td>
                <a href="./read.php?id=<?php echo $value['id']?>" class="btn btn-info">修改</a>
                <a href="./delete.php?id=<?php echo $value['id']?>" class="btn btn-danger">删除</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
    <tbody class="<?php echo empty($data)?'':'hidden';?>">
        <tr colspan="4">
            <td>暂无数据</td>
        </tr>
    </tbody>
</table>
<!--分页-->
<nav aria-label="Page navigation">
    <ul class="pagination">
        <li>
            <a href="index.php?page=<?php echo $page<=1?1:$page-1;?>&limit=<?php echo $limit;?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php for ($i=0 ; $i<$totalPage ; $i++){?>
        <li><a href="./index.php?page=<?php echo $i+1;?>&limit=<?php echo $limit;?>"><?php echo $i+1;?></a></li>
        <?php } ?>
        <li>
            <a href="./index.php?page=<?php echo $page>=$totalPage?$totalPage:$page+1;?>&limit=<?php echo $limit;?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        <li style="margin-left: 20px">
            <button class="btn btn-info">添加</button>
        </li>
    </ul>
</nav>
</body>
</html>