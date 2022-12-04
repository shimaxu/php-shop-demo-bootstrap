<div>
    <h2>Categories</h2>
    <?php if($loggedIn): ?>
    <a class="btn btn-success" href="categoryForm.php" style="float:right">Create Category</a>
    <?php endif ?>
    <p>There are total <?=$totalCategories?> Categories.</p>
</div>

<table class="table">
  <thead>
    <th>Category Name</th>
    <?php if($loggedIn): ?> <th>Actions</th> <?php endif ?>
  </thead>
  <tbody>
  <?php foreach ($categories as $category): ?>
    <tr>
        <td><?=htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8')?></td>
        <?php if($loggedIn): ?>
        <td>
            <form class="form-inline" action="" method="post"> 
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a class="btn btn-primary" href="categoryForm.php?id=<?=$category['id']?>" role="button">Edit</a>
                
                    <input type="hidden" name="CategoryID" value="<?=$category['id']?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </td>
        <?php endif ?>
    </tr>
    <?php endforeach ?>

  </tbody>
</table>
