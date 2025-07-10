<?php 
    session_start();
    unset($_SESSION['is_login']);
    echo '<script>window.location.href="../index.php"</script>';
?>