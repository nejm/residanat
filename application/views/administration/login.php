<!doctype html>
<html>
<head>
    <title>Log in</title>
    <!--<link rel="stylesheet" href=<?=css_url("bootstrap.min");?>>-->
    <link rel="stylesheet" href=<?=css_url("login");?>>
    <link rel="stylesheet" href=<?=css_url("alertify.bootstrap");?>>
    <link rel="stylesheet" href=<?=css_url("alertify.core");?>>
    <link rel="stylesheet" href=<?=css_url("alertify.default");?>>
</head>
<body>
<div class="container">
        <div class="wrapper">
            <!--<h1>Connexion</h1>-->
            <div class="content">
                <div id="form_wrapper" class="form_wrapper">
                    <form class="login active" action='<?php echo base_url(); ?>admin/' method='post'>
                        <h3>Connexion</h3>
                        <div>
                            <label>Username:</label>
                            <input type="text" name="login" required/>
                        </div>
                        <div>
                            <label>Password:
                            <!--<a href="forgot_password.html" rel="forgot_password" class="forgot linkform">
                            Forgot your password?</a>--></label>
                            <input type="password" name="pass" required/>
                        </div>
                        <div class="bottom">
                            <div class="remember"><input type="checkbox" /><span>Keep me logged in</span></div>
                            <input type="submit" value="Login">
                            <!--<a href="register.html" rel="register" class="linkform">You don't have an account yet?
                            Register here</a>-->
                            <div class="clear"></div>
                        </div>
                    </form>
                   <!-- <form class="forgot_password">
                        <h3>Forgot Password</h3>
                        <div>
                            <label>Username or Email:</label>
                            <input type="text" />
                            <span class="error">This is an error</span>
                        </div>
                        <div class="bottom">
                            <input type="submit" value="Send reminder">
                            <!--<a href="index.html" rel="login" class="linkform">Suddenly remebered? Log in here</a>
                            <div class="clear"></div>
                        </div>
                    </form>-->
                </div>
                <div class="clear"></div>
            </div>
        </div>


        <!--<input type="text" class="form-control" placeholder="Login" name="login" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="pass" required>

        <label class="checkbox">
            <input type="checkbox" value="remember-me">Remember me
        </label>

        <input type="submit" value="Sign in" class="btn btn-lg btn-primary btn-block">
    </form>-->

</div>
<script src=<?=js_url("jquery");?>></script>
<script src=<?=js_url("bootstrap.min");?>></script>
<script src=<?=js_url("alertify.min");?>></script>
<script>
    <?php if(isset($msg)):?>
        alertify.error("Mot de passe ou Nom d'utilisateur invalide");
    <?php endif ?>
</script>
</body>
</html>