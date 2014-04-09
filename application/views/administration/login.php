<!doctype html>
<html>
<head>
    <title>Log in</title>
    <link rel="stylesheet" href=<?=css_url("bootstrap.min");?>>
    <link rel="stylesheet" href=<?=css_url("signin");?>>
</head>
<body>
<div class="container">
    <form class="form-signin" role="form" action='<?php echo base_url(); ?>admin/' method='post' role="form">



        <h2 class="form-signin-heading">Connexion</h2>

        <input type="text" class="form-control" placeholder="Login" name="login" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="pass" required>

        <label class="checkbox">
            <input type="checkbox" value="remember-me">Remember me
        </label>

        <input type="submit" value="Sign in" class="btn btn-lg btn-primary btn-block">
    </form>

</div>
<script src=<?=js_url("jquery");?>></script>
<script src=<?=js_url("bootstrap.min");?>></script>
</body>
</html>