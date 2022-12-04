<div class="mb-4">
    <h2><?=isset($category['CategoryID']) ? 'Edit' : 'Create'?> Category</h2>
    <a class="btn btn-success" href="categories.php" style="float:right">View all</a>
</div>
<form action="" method="post" style="margin-top: 10px;">

    <input type="hidden" name="CategoryID" value="<?=$category['CategoryID'] ?? ''?>">

    <div class="mb-4">
        <label class="form-label" for="CategoryName">Category Name </label>
        <input class="form-control" type="text" id="CategoryName" name="CategoryName" value="<?=$category['CategoryName'] ?? ''?>" required>
    </div>

    <div class="mb-4">
        <label class="form-label" for="Description">Product Description </label>
        <input class="form-control" type="text" id="Description" name="Description" value="<?=$category['Description'] ?? ''?>" required>
    </div>
    <input class="btn btn-primary" type="submit" name="submit" value="Save">
</form>