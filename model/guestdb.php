<?php
    function get_guest() {
        global $db;
        $query = 'SELECT * FROM khach';
        $statement = $db->prepare($query);
        $statement->execute();
        $guest_list = $statement->fetchAll();
        $statement->closeCursor();
        return $guest_list;
    }

    function add_guest($guest_id, $guest_name, $gender, $email, $phone) {
        global $db;
        $query = 'INSERT INTO khach
                     (IDK, TenK, GioiTinh , Email, SDT)
                  VALUES
                     (:guest_id, :guest_name, :gender, :email, :phone)';
        $statement = $db->prepare($query);
        $statement->bindValue(':guest_id', $guest_id);
        $statement->bindValue(':guest_name', $guest_name);
        $statement->bindValue(':gender', $gender);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->execute();
        $statement->closeCursor();
    }

    function get_guest_number(){
        global $db;
        $query = 'SELECT COUNT(*) AS SoLuongKhach FROM khach';
        $statement = $db->prepare($query);
        $statement->execute();
        $guest_number = $statement->fetchAll();
        $statement->closeCursor();
        return $guest_number;
    }
?>