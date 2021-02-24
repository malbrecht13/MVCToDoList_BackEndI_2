<?php include('header.php'); ?>
    
    <form action="." method="post">
        <input type="hidden" name="action" value="list_items">
        <div id="category-select-div">
            <label for="select-box">Category</label>
                <select name="category_id" id="select-box">
                    <option value="0">View All Categories</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['categoryID'] ?>">
                            <?= $category['categoryName'] ?>
                        </option>
                    <?php endforeach; ?>      
                </select>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <div id="table-div">
    <table class="table table-bordered">
        <tr class="bg-primary text-center">
            <th>Title</th>
            <th>Description</th>
            <th>Category</th>
            <th>&nbsp;</th>
        </tr>
        <tbody>
            <?php foreach ($items as $item) : ?>
                <tr>
                    <td><?= $item['Title']; ?></td>
                    <td><?= $item['Description']; ?>
                    <td><?= $item['categoryName']; ?>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_item">
                            <input type="hidden" name="itemNum" value="<?= $item['ItemNum']; ?>">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <div class="link-div container">
        <a class="text-center" href="?action=add_item">Add Another Item To List</a><br>
        <a class="text-center" href="?action=edit_categories">View/Edit Categories</a>
     </div>
    
    

<?php include('footer.php'); ?>