<div>
    <h2>Sign in</h2>
</div>
<form action="" method="post" style="margin-top: 10px;">

    <div class="mb-3">
        <label class="form-label" for="email">User Email </label>
        <input class="form-control" type="text" id="email" name="email" required>
        <?php if(isset($error)): ?>
            <span style="color: red;margin-left:5px"><?=$error?></span>
        <?php endif ?>
    </div>

    <div class="mb-3">
        <label class="form-label" for="password">User Password </label>
        <input class="form-control" type="password" id="password" name="password" required>
        <?php if(isset($credentialError)):?>
            <span style="color: red;"><?=$credentialError?></span>
        <?php endif ?>
    </div>

    <input class="btn btn-primary" type="submit" name="submit" value="Sign in">

    
    
</form>