<?php foreach ($categories as $category) : ?>
    <option value="<?= $category['categoryID'] ?>">
        <?= $category['categoryName'] ?>
    </option>
<?php endforeach; ?>    