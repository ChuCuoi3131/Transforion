<?php
    if (isset($_POST['login'])) {
        require("model/connectdb.php");
        require("model/identifydb.php");

        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");

        if (!empty($email) && !empty($password)) {
            $account = get_account_by_email_password($email, $password);
            if (!empty($account)) {
                foreach ($account as $acc) {
                    if ($acc['VaiTro'] == "Khách") {
                        $_SESSION['username'] = $acc['Name'];
                        $_SESSION['vaitro'] = $acc['VaiTro'];
                        $_SESSION['matkhauungdung'] = $acc['MatKhauUngDung'];
                        setcookie("username", $_SESSION['username'], time() + 3600);
                        setcookie("vaitro", $_SESSION['vaitro'], time() + 3600);
                        setcookie("matkhauungdung", $_SESSION['matkhauungdung'], time() + 3600);
                        echo "<script>alert('Đăng nhập thành công!'); location.href='index.php'; </script>";
                        // header("Location: index.php");
                    }
                }
            } else {
                echo "<script>alert('Đăng nhập thất bại!'); location.href='login.php';</script>";
            }
        }
}
