<?php
    if (isset($_POST['signup'])){
        require("model/connectdb.php");
        require("model/identifydb.php");
        require("model/guestdb.php");

        $email = filter_input(INPUT_POST, "email");
        $name = filter_input(INPUT_POST, "username");

        $password = filter_input(INPUT_POST, "password");
        $re_password = filter_input(INPUT_POST, "re-password");

        if (!empty($email) && !empty($name) && !empty($password) && !empty($re_password) && ($password == $re_password)){
            add_account($email, $name, $password, "Khách", "");
            add_guest("", $name, "", "", "", $email, "");
            echo "<script>alert('Đăng ký thành công!'); location.href='login.php';</script>";
        } else {
            echo "<script>alert('Đăng ký thất bại!'); location.href='login.php';</script>";
        }
    }
?>
