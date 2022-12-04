<h2>Dashboard</h2>

<p>Welcome to the Shop Database</p>

<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Products</h5>
        <p class="card-text">There are <?=$productCount?> Products</p>
        <a href="products.php" class="btn btn-primary">View all products</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Categories</h5>
        <p class="card-text">There are <?=$categoryCount?> Categories</p>
        <a href="categories.php" class="btn btn-primary">View all categories</a>
      </div>
    </div>
  </div>
</div>
