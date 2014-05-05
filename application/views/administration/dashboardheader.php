<!doctype html>
<html>
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href=<?=css_url("bootstrap.min");?>>
    <link rel="stylesheet" href=<?=css_url("dashboard");?>>
    <link rel="stylesheet" href=<?=css_url("semantic");?>>

    <link rel="stylesheet" href=<?=css_url("bootstrap-switch");?>>
    <link rel="stylesheet" href=<?=css_url("alertify.bootstrap");?>>
    <link rel="stylesheet" href=<?=css_url("alertify.core");?>>
    <link rel="stylesheet" href=<?=css_url("alertify.default");?>>
    <link rel="stylesheet" href=<?=css_url("slider");?>>
    <link rel="stylesheet" href=<?=zoombox_css();?>>


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
            <a class="navbar-brand" href=<?=base_url('admin/dashboard')?>>Administration</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href=<?=base_url('admin/dashboard')?>>Dashboard</a></li>
                <li><a href=<?=base_url()."admin/profile";?>>Profile</a></li>
                <li><a href=<?=base_url()."admin/logout";?>>Déconexion</a></li>
            </ul>
        </div>
    </div>
</div>
