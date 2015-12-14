<?php
include('common.php');
if (!empty($_POST) && $_POST['sesspk'] === $_SESSION['login']) {
    $name = $_POST['name'];
    $pass = md5($_POST['psword']);
    try {
        $smtp = $dbh ->prepare("select id, name, email from `my_user` where (name = :name or email = :email) and psword = :pass limit 1");
        $smtp ->execute(array(':name' => $name, 'email' => $name, ':pass' => $pass));
        $smtp->setFetchMode(2);
        $result = $smtp ->fetch();
        if(!empty($result))
        {
            $up_sql = $dbh ->prepare('update my_user set session = :session where id = :id');

            $pk = md5($result['id'].$result['name'].time());
            $up = $up_sql ->execute(array(':session' =>$pk, ':id' =>$result['id']));
            $_SESSION['pk']    = $pk;
            $_SESSION['name']  = $result['name'];
            $_SESSION['email'] = $result['email'];
            setcookie('pk', $pk, time()+6000);
            header('location:index.php');
        }
    } catch (Exception $e) {
        var_dump($e);
    }
} else {
    echo "登录失败";
}
