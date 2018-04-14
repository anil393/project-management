<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <form action="<?=APP_URL.'/login'?>" method="POST">
        <input type="email" name="email" placeholder="Email">
        <input type="text" name="password" placeholder="Password">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
