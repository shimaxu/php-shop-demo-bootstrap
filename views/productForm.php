<div class="mb-4">
    <h2><?=isset($product['ProductID']) ? 'Edit' : 'Create'?> Product</h2>
    <a class="btn btn-success" href="products.php" style="float:right">View all</a>
</div>
<form action="" method="post" style="margin-top: 10px;">
    <input type="hidden" name="ProductID" value="<?=$product['ProductID'] ?? ''?>">

    <div class="mb-3">
        <label class="form-label" for="ProductName">Product Name </label>
        <input class="form-control" type="text" id="ProductName" name="ProductName" value="<?=$product['ProductName'] ?? ''?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="Unit">Product Unit </label>
        <input class="form-control" type="text" id="Unit" name="Unit" value="<?=$product['Unit'] ?? ''?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="Price">Product Price </label>
        <input class="form-control" type="number" id="Price" name="Price" value="<?=$product['Price'] ?? ''?>" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="SupplierID">Supplier </label>
        <select class="form-select" id="SupplierID" name="SupplierID" required>
            <option selected>Select Supplier</option>
            <?php foreach ($supplier->getSuppliers() as $supplier): ?>
                <option <?=$supplier['SupplierID'] ==  ($product['SupplierID'] ?? '') ? 'selected' : ''?> value="<?=$supplier['SupplierID']?>"> <?=$supplier['SupplierName']?></option>
            <?php endforeach ?>
        </select>
    </div>
    
    <div class="mb-3">
        <label class="form-label" for="CategoryID">Category </label>
        <select class="form-select" id="CategoryID" name="CategoryID" required>
            <option selected>Select Category</option>
            <?php foreach ($category->getCategories() as $category): ?>
                <option <?=$category['CategoryID'] == ($product['CategoryID'] ?? '') ? 'selected' : ''?> value="<?=$category['CategoryID']?>"> <?=$category['CategoryName']?></option>
            <?php endforeach ?>
        </select>
    </div>

    
    <input class="btn btn-primary" type="submit" name="submit" value="Save">
</form>