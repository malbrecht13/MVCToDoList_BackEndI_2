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
    <h2 class="text-center text-primary">Category List</h2>
    <?= $message ?>
    <table class="table table-bordered" id="cat-table">
        <thead>
            <tr class="bg-primary text-center">
                <th>Name</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category) : ?>
                <tr class="text-center">
                    <td><?= $category['categoryName']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_category">
                            <input type="hidden" name="category_id"
                                value="<?= $category['categoryID']; ?>">
                            <button type="submit" class="btn btn-danger">
                                Delete Category
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2 id="cat-h2" class="text-center text-primary">Add Category</h2>
    <form id="category-form" action="." method="post">
        <input type="hidden" name="action" value="add_category_name">
        <div class="add-item-div" id="add-cat-div">
            <div class="add_item_element">
                <label for="cat_name">Name:</label>
                <input type="text" id="cat_name" name="cat_name" maxlength="20" required>
            </div>
            <button id="add-cat-btn" type="submit" class="btn btn-primary">
                Add Category
            </button>
        </div>
    </form>
    <div class="link-div container">
        <a class="text-center" href=".?action=list_items">View To Do List</a><br>
    </div>

<?php include('footer.php'); ?>

