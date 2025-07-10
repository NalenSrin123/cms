<?php 
    try{
        $con=new mysqli('localhost','root','','db_project_9_10',3308);
    }catch(Exception $e){
        echo 'Connection failed :'.$e;
    }
?>