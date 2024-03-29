<?php
    function get_account() {
        global $db;
        $query = 'SELECT * FROM taikhoan';
        $statement = $db->prepare($query);
        $statement->execute();
        $account_list = $statement->fetchAll();
        $statement->closeCursor();
        return $account_list;
    }

    // sửa đổi
    // function get_account_by_email_password($email, $password) {
    //     global $db;
    //     $query = 'SELECT taikhoan.*, khach.IDK
    //               FROM taikhoan
    //               JOIN khach ON taikhoan.email = khach.email
    //               WHERE taikhoan.Email = :email AND taikhoan.Password = :password';
    //     $statement = $db->prepare($query);
    //     $statement->bindValue(":email", $email);
    //     $statement->bindValue(":password", $password);
    //     $statement->execute();
    //     $account = $statement->fetchAll();
    //     $statement->closeCursor();
    //     return $account;
    // }

    function get_account_by_email_password($email, $password) {
        global $db;
        $query = 'SELECT * FROM taikhoan
                  WHERE Email = :email AND Password = :password';
        $statement = $db->prepare($query);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":password", $password);
        $statement->execute();
        $account = $statement->fetchAll();
        $statement->closeCursor();
        return $account;
    }

    function add_account($email, $name, $password, $vaitro, $matkhauungdung) {
        global $db;
        $query = 'INSERT INTO taikhoan
                     (Email, Name, Password, VaiTro, MatKhauUngDung)
                  VALUES
                     (:email, :name, :password, :vaitro, :matkhauungdung)';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':vaitro', $vaitro);
        $statement->bindValue(':matkhauungdung', $matkhauungdung);
        $statement->execute();
        $statement->closeCursor();
    }

    function get_acc_type_number(){
        global $db;
        $query = 'SELECT VaiTro, COUNT(*) AS SoLuongLoaiTaiKhoan FROM taikhoan GROUP BY VaiTro';
        $statement = $db->prepare($query);
        $statement->execute();
        $acc_type_number = $statement->fetchAll();
        $statement->closeCursor();
        return $acc_type_number;
    }
?>