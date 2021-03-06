<?php
    session_start();

    if(!isset($auth)){
        if (!isset($_SESSION['Auth']['id'])){
            header('Location:'. WEBROOT .'login.php');
            die();
        }
    }

    if (!isset($_SESSION['csrf'])){
        $_SESSION['csrf'] = md5(time()+rand());
    }

    function csrf(){
        return 'csrf='.$_SESSION['csrf'];
    }

    function chekCsrf(){
        if(
            (!isset($_GET['csrf']) && $_GET['csrf'] == $_SESSION['csrf']) ||
            ((!isset($_POST['csrf']) && $_POST['csrf'] == $_SESSION['csrf']))
            ){
            return true;
        }
        header('Location:'.WEBROOT.'csrf.php');
        die();
    }

