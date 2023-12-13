<?php
    function get_nhanvat() {
        global $db;
        $query = 'SELECT * FROM nhanvat';
        $statement = $db->prepare($query);
        $statement->execute();
        $nv_list = $statement->fetchAll();
        $statement->closeCursor();
        return $nv_list;
    }

    function get_nv_by_id($nv_id) {
        global $db;
        $query = 'SELECT * FROM nhanvat
                  WHERE IDnv = :idnv';
        $statement = $db->prepare($query);
        $statement->bindValue(':idnv', $nv_id);
        $statement->execute();
        $nv = $statement->fetchAll();
        $statement->closeCursor();
        return $nv;
    }
?>