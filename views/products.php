<div>
    <h2>Products</h2>
    <?php if($loggedIn): ?>
    <a class="btn btn-success" href="productForm.php" style="float:right">Create Product</a>
    <?php endif ?>
    <p>There are total <?=$totalProducts?> Products.</p>
</div>

<table class="table">
  <thead>
    <th>Product Name</th>
    <?php if($loggedIn): ?> <th>Actions</th> <?php endif ?>
  </thead>
  <tbody>
  <?php foreach ($products as $product): ?>
    <tr>
        <td><?=htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8')?></td>

        <?php if($loggedIn): ?>
        <td>
            <form class="form-inline" action="" method="post"> 
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a class="btn btn-primary" href="productForm.php?id=<?=$product['id']?>" role="button">Edit</a>
                
                    <input type="hidden" name="ProductID" value="<?=$product['id']?>">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </td>
        <?php endif ?>
    </tr>
    <?php endforeach ?>

  </tbody>
</table>
