<?php

session_start();

if(isset($_SESSION['username'])){
    header("location:view/main.php");
}else{
    header("location:login.php");
}
