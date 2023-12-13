<?php
    function get_news() {
        global $db;
        $query = 'SELECT * FROM news';
        $statement = $db->prepare($query);
        $statement->execute();
        $news_list = $statement->fetchAll();
        $statement->closeCursor();
        return $news_list;
    }

    function get_news_by_id($news_id) {
        global $db;
        $query = 'SELECT * FROM news
                  WHERE newsID = :idtt';
        $statement = $db->prepare($query);
        $statement->bindValue(':idtt', $news_id);
        $statement->execute();
        $news = $statement->fetchAll();
        $statement->closeCursor();
        return $news;
    }
?>