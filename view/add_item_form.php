<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- Bootstrap 4.5.2 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
    <link rel="stylesheet" href="view/css/main.css">
</head>
<body class="container-fluid">
    <header><h1 id="header-title" class="text-left text-primary">To Do </h1></header>
    <main>
    <h2 class="text-center text-primary">Add Item</h2>
    <div class="container-fluid">
        <form action="./index.php" method="post">
            <input type="hidden" name="action" value="insert_item">
            <div class="add-item-div" id="add-item-box">
                <div class="add_item_element">
                    <label for="select-box">Category:</label>
                    <select name="category_id" id="select-box" required>
                        <option value="" disabled selected>Choose a category</option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['categoryID'] ?>">
                                <?= $category['categoryName'] ?>
                            </option>
                        <?php endforeach; ?>    
                    </select>
                </div>
                <div class="add_item_element">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" maxlength="20" required>
                </div>
                <div class="add_item_element">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" maxlength="30" required>
                </div>
                <button class="btn btn-primary" type="submit">Add Item</button>
            </div>
        </form>
    </div>
    <div class="link-div container">
        <a class="text-center" href=".?action=list_items">View To Do List</a><br>
        <a class="text-center" href=".?action=edit_categories">View/Edit Categories</a>
    </div>
    

<?php include('footer.php'); ?>