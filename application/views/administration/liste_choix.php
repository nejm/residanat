<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-pills nav-stacked">
                <li><a href=<?=base_url("admin/ajout/");?>>Nouveau Article</a></li>
                <li><a href=<?=base_url("admin/modifier/");?>>Modifier Article</a></li>
                <li><a href=<?=base_url("admin/media");?>>Gérer Media</a></li>
                <li class="active"><a href=<?=base_url("admin/etudiant/");?>>Liste Etudiant</a></li>
                <li><a href=<?=base_url("admin/user/")?>>Ajouter Utilisateur</a></li>
                <li><a href=<?=base_url("admin/chercher/")?>>Chercher Etudiant</a></li>
                <li><a href=<?=base_url("admin/choix/")?>>List choix</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-8 col-md-offset-2 main">
            <h1 class="page-header">Les Choix</h1>
            <h4>
                <?php if($choix==false) echo "Etudiant Introuvable";else{?>
                <?=ucwords(strtolower($etudiant->nom))?>
            </h4>
                <?php
                if($choix !== false)
                {?>
                    <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Libelle</th>
                        </tr>
                    </thead>
                    <tbody>
                <?php
                    foreach ($choix as $c)
                    {
                        echo "<tr><td>{$c->id}</td><td>{$c->libelle}</td></tr>";
                    }
                echo "</tbody>";
                }else
                {
                    echo "Cet étudiant n'a pas encore fait son choix";
                }
                ?>
            </table>
            <?php }?>
        </div>
    </div>
</div>

<script src=<?=js_url("jquery")?>></script>
<script src=<?=js_url("bootstrap.min")?>></script>
<script src=<?=js_url("bootstrap-switch")?>></script>
<script type="text/javascript">
</script>
</body>
</body>
</html>