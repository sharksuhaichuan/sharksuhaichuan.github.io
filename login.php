<!-- login.php -->
<?php
// 登录处理
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

// 从文件读取用户数据
$users = file('users.txt');
$login_success = false;

foreach ($users as $user) {
    list($stored_user, $stored_pass) = explode(':', trim($user));
    if ($stored_user === $username && password_verify($password, $stored_pass)) {
        $_SESSION['username'] = $username;
        $login_success = true;
        break;
    }
}

if ($login_success) {
    echo "登录成功！欢迎 $username";
    // 可以跳转到受保护页面
} else {
    echo "登录失败！<a href='login.html'>重试</a>";
}
?>
