<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li><a href=<?=base_url("admin/ajout/");?>>Nouveau Article</a></li>
                <li><a href=<?=base_url("admin/modifier/");?>>Modifier Article</a></li>
                <li><a href=<?=base_url("admin/media")?>>Gérer Media</a></li>
                <li class="active"><a href=<?=base_url("admin/choix/");?>>Consulter Choix</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Dashboard</h1>
            <h4>
                <span class="tool" data-toggle="tooltip" title="
                        <?=$etudiant->cin?>
                        <?=$etudiant->mail?>
                        <?=$etudiant->tel?>
                " data-placement="right">
                <?=ucwords(strtolower($etudiant->nom))?></span>
            </h4>
            <table class="table table-bordered table-hover">
                <?php
                foreach ($choix as $c)
                {
                    echo "<tr><td>{$c->libelle}</td><td>{$c->priorite}</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>

<script src=<?=js_url("jquery")?>></script>
<script src=<?=js_url("bootstrap.min")?>></script>
<script src=<?=js_url("bootstrap-switch")?>></script>
<script type="text/javascript">
    $(".tool").tooltip("hgiuh");
</script>
</body>
</body>
</html>