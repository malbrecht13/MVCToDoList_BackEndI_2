<?php
    require('model/database.php');
    require('model/category_db.php');
    require('model/item_db.php');

    
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if($action == NULL) {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if ($action == NULL) {
            $action = 'list_items';
        }
    }

    switch($action) {
        case 'list_items':
            try {
                $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
                 $items = get_items_by_category($category_id);
                if(!$category_id) $category_id = 0;
                $categories = get_categories();
                include('view/item_list.php');
            } catch(Exception $e) {
                include('view/error.php');
                break;
            }
            break;
        case 'delete_item':
            try {
                $item_num = filter_input(INPUT_POST, 'itemNum', FILTER_VALIDATE_INT);
            if($item_num) {
                delete_item($item_num);
                header('Location: .?action=list_items');
            } } catch(Exception $e) {
                include('view/error.php');
                break;
            }
            break;
        case 'add_item':
            try {
                $categories = get_categories();
                include('view/add_item_form.php');
            } catch(Exception $e) {
                include('view/error.php');
                break;
            }
            break;
        case 'edit_categories':
            try {
                $categories = get_categories();
                include('view/category_list.php'); 
            } catch(Exception $e) {
                include('view/error.php');
                break;
            }
            break;
        case 'add_category_name':
            try {
                $name = filter_input(INPUT_POST, 'cat_name', FILTER_SANITIZE_STRING);
                add_category($name);
                header('Location: .?action=edit_categories');
            } catch (Exception $e) {
                include('view/error.php');
                break;
            }
            break;
        case 'insert_item':
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
            $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
            try {
                add_item($category_id, $title, $description);
            } catch (Exception $e) {
                include('view/error.php');
                break;
            }
            header('Location: .?action=list_items');
            break;
        case 'delete_category':
            $category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
            try {
                delete_category($category_id);
            } catch(Exception $e) {
                include('view/error.php');
                break;
            }
            header('Location: .?action=edit_categories');
            break;
        default:
            $category_id = 0;
            include('.');
            break;
    }
?>