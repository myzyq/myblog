<?php
    if (!empty($_COOKIE['pk']))
    {
        header('location:main.php');
    } else {
        session_start();
        $_SESSION['login'] = md5(time());
    }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>用户登录测试</title>
        <link rel="stylesheet" href="./css/bootstrap.css">
    </head>
    <body>
        <div class="container">
            <form  class="form-horizontal container-fluid" style="width:360px" action="login_check.php" method="post">
                <div class="form-group">
                    <legend>用户登录</legend>
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                    <input type="text" class="form-control" name="name" value="" placeholder="请填写您的用户名">
                </div>
                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control"  name="psword" value="" placeholder="请填写您的用户密码">
                </div>
                <input type="hidden" class="form-control"  name="sesspk" value="<?php echo $_SESSION['login'] ?>" placeholder="请填写您的用户密码">
                <div class="form-group">
                    <button type="submit" class="btn btn-default">登录</button>
                    <button type="button" class="btn btn-danger">取消</button>
                </div>
            </form>
        </div>
    </body>
</html>