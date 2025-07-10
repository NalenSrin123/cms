<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/style/theme.css">
</head>
<body>
    <div class="content-login">
        <form method="post">
            <label>Email</label>
            <input type="text" class="box" name="email">
            <label>Password</label>
            <input type="password" class="box" name="password">
            <div class="wrap-btn">
                <a href="register.php" class="btn">Register?</a>&ensp;
                <input type="submit" class="btn" name="btn_login" value="LOGIN">
            </div>
        </form>
    </div>
</body>
</html>
<?php 
    include '../connection.php';
    global $con;
    session_start();
    if(isset($_POST['btn_login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $login="SELECT `email`,`password`,`role` FROM `tbusers` WHERE `email`='$email'";
        $res=$con->query($login);
        if($res->num_rows>0){
            $user=$res->fetch_assoc();
            if(password_verify($password,$user['password'])){
                $_SESSION['is_login']=$email;
                $_SESSION['role']=$user['role'];
                if($_SESSION['role']==0){
                    echo '<script>window.location.href="../article/index.php"</script>';
                }else{
                    echo '<script>window.location.href="index.php"</script>';
                }
            }
            
        }
    }
?>