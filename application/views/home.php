<!DOCTYPE html>
<html>
<head>
    <title>User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href=<?=css_url("jquery.mobile-1.4.2.min");?>>
    <link rel="stylesheet" type="text/css" href=<?=css_url("jquery-ui-1.10.4.custom.min");?>>

    <style type="text/css">
        ol { margin: 0; padding: 1em 0 1em 3em; height: 500px}
    </style>

    <script type="text/javascript" src=<?=js_url("jquery");?>></script>
    <script type="text/javascript" src=<?=js_url("jquery.mobile-1.4.2.min");?>></script>
    <script type="text/javascript" src=<?=js_url("jquery-ui-1.10.4.custom.min");?>></script>

    <script type="text/javascript" src=<?=js_url("specialite");?>></script>

</head>
<body>
<div data-role="page">
    <div data-role="header"  class="ui-bar-a">
        <h1>Header</h1>
    </div>
    <div data-role="main"  class="ui-content">
        <!--<div data-role="navbar" class="nav-glyphish-example">
            <ul>
                <li><a href="login" id="login">Login</a></li>
            </ul>
        </div>-->
        <div class="ui-grid-a">
            <div class="ui-block-a">
                <div class="ui-bar ui-bar-a" id="spec">
                    <ul id="specialite">
                        <?php
                            foreach ($spec as $row)
                            {
                                echo '<li>'.$row->nom.'</li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="ui-block-b">
                <div class="ui-bar ui-bar-a" id="spec2">
                    <ol id="choix">
                    </ol>
                </div>
            </div>

        </div>

    </div>
</div>
</body>
</html>