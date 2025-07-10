<?php 
    session_start();
        if($_SESSION['role']==0){
            echo '<script>window.location.href="./article/index.php"</script>';
        }else{
            if(empty($_SESSION['is_login'])){
                echo '<script>window.location.href="./admin/login.php"</script>';
            }
            echo '<script>window.location.href="./admin/index.php"</script>';
            echo "Hello";
        }
    
?>