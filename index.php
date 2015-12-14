<?php
if (version_compare(PHP_VERSION, '5.3.0', '<')) {
    die('require PHP > 5.3.0 !');
}
include('common.php');
if (!@$_COOKIE['pk']) {
    echo "<script>alert('您还没有登录')</script>";
    header('location:login.php');
} else {
    $model  = $_GET['s'];
    $action = $_GET['a'];
    if(!empty($model) && !empty($action))
    {
        include("$model/$action.php");
    } else {
        header('location:index.php?s=.&a=main');
    }
}