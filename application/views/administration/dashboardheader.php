<!doctype html>
<html>
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href=<?=css_url("bootstrap.min");?>>

    <link rel="stylesheet" href=<?=css_url("bootstrap-switch");?>>
    <link rel="stylesheet" href=<?=css_url("alertify.bootstrap");?>>
    <link rel="stylesheet" href=<?=css_url("alertify.core");?>>
    <link rel="stylesheet" href=<?=css_url("alertify.default");?>>
    <link rel="stylesheet" href=<?=css_url("sb-admin");?>>
    <link rel="stylesheet" href=<?=css_url("font-awesome");?>>
    <link rel="stylesheet" href=<?=zoombox_css();?>>


</head>
<body style="">

<!--<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
</div>-->


<div id="wrapper">

    <!-- Sidebar -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Administration</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down">
                        </i> Article <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href=<?=base_url("admin/ajout")?>>Nouveau</a></li>
                        <li><a href=<?=base_url("admin/modifier")?>>Edit/Supprimer</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down">
                        </i> Administrateur <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href=<?=base_url("admin/user")?>>Nouveau</a></li>
                        <li><a href=<?=base_url("admin/user")?>>Supprimer</a></li>
                    </ul>
                </li>

                <li><a href="charts.html"><i class="fa fa-bar-chart-o"></i> Media</a></li>
                <li><a href="tables.html"><i class="fa fa-table"></i> Etudiants</a></li>
                <li><a href="forms.html"><i class="fa fa-edit"></i> Choix</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right navbar-user">
                <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href=<?=base_url()."admin/profile";?>><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href=<?=base_url()."admin/logout";?>><i class="fa fa-power-off"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>

