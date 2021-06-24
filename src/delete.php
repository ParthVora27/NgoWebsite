<?php
session_start();
require "config.php";

if(!isset($_GET['id']) && !isset($_GET['cid']) && !isset($_GET['bid'])){
    header('Location: admin.php');
    return;
}

else{
    $id = "";
    $table = "";
    $param = "";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $table = 'volunteers';
        $param = 'id';
    }
    else if(isset($_GET['cid'])){
        $id = $_GET['cid'];
        $table = 'campaigns';
        $param = 'c_id';
    }
    else if(isset($_GET['bid'])){
        $id = $_GET['bid'];
        $table = 'blogs';
        $param = 'b_id';
    }

    $stmt = mysqli_query($conn, "DELETE FROM $table WHERE $param = '$id'");
    if($stmt){
        if(isset($_GET['id']) || isset($_GET['cid'])){
            header('Location: admin.php');
            return;
        }
        else{
            header('Location: blogs.php');
            return;
        }
    }
    else{
        echo "Couldn't delete record";
    }
}
?>