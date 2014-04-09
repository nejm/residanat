<!doctype html>
<html>
<head>
    <link rel="stylesheet" href=<?=css_url("bootstrap.min");?>>
    <link rel="stylesheet" href=<?=css_url("dashboard");?>>
    <link rel="stylesheet" href=<?=css_url("flat-ui");?>>
    <link rel="stylesheet" href=<?=css_url("bootstrap-switch");?>>


</head>
<body style="">

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Administration</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href=<?=base_url('admin/dashboard')?>>Dashboard</a></li>
                <li><a href="http://getbootstrap.com/examples/dashboard/#">Settings</a></li>
                <li><a href="http://getbootstrap.com/examples/dashboard/#">Profile</a></li>
                <li><a href=<?=base_url()."admin/logout";?>>Déconexion</a></li>
            </ul>
            <form class="navbar-form navbar-right">
                <input type="text" class="form-control" placeholder="Search...">
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href=<?=base_url("admin/ajout/");?>>Nouveau Article</a></li>
                <li><a href=<?=base_url("admin/modifier/");?>>Modifier Article</a></li>
                <li><a href="">Gérer Media</a></li>
                <li><a href="">Consulter Choix</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Dashboard</h1>