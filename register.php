<!-- register.php -->
<?php
// 注册处理
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // 密码哈希

// 保存到文件
$data = "$username:" . $password . "\n";
file_put_contents('users.txt', $data, FILE_APPEND);

echo "注册成功！<a href='login.html'>立即登录</a>";
?>