<?php
    function get_items_by_category($category_id) {
        if(!$category_id) {
            return get_items();
        } else {
            global $db;
            $query = 'SELECT * FROM ToDoItems 
                  INNER JOIN categories 
                  ON categories.categoryID = ToDoItems.categoryID
                  WHERE ToDoItems.categoryID = :category_id
                  ORDER BY Title';
            $statement = $db->prepare($query);
            $statement->bindValue(':category_id', $category_id);
            $statement->execute();
            $items = $statement->fetchAll();
            $statement->closeCursor();
            return $items;
        }
        
    }

    function get_items() {
        global $db;
        $query = 'SELECT *
                FROM ToDoItems
                INNER JOIN categories 
                ON categories.categoryID = ToDoItems.categoryID
                ORDER BY ToDoItems.categoryID, Title';
        $statement = $db->prepare($query);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        return $items;
    }

    function delete_item($item_num) {
        global $db;
        $query = 'DELETE FROM ToDoItems
                    WHERE ItemNum = :item_num';
        $statement = $db->prepare($query);
        $statement->bindValue(':item_num', $item_num);
        $statement->execute();
        $statement->closeCursor();
        
    }

    function add_item($category_id, $title, $description) {
        global $db;
        $query = 'INSERT INTO ToDoItems (`categoryID`, `Title`, `Description`)
                    VALUES (:categoryID, :title, :description)';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $category_id);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':description', $description);
        $statement->execute();
        $statement->closeCursor();
    }
?>