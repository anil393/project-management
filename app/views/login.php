<?php require APP_DIR.'/views/common/header.php';?>
<body>
    <form action="<?=APP_URL.'/login'?>" method="POST" novalidate>
    <div class="<?=getErrorClass($errors, 'email')?>">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" placeholder="Email" required value="<?=getViewData($data, 'email')?>">
            <label for="email"><?=getViewError($errors, 'email')?></label>
        </div>
        <div class="<?=getErrorClass($errors, 'password')?>">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" placeholder="Password" required value="">
            <label for="password"><?=getViewError($errors, 'password')?></label>
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
<?php require APP_DIR.'/views/common/footer.php';?>
