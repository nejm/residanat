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
<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Num</th>
        <th>CIN</th>
        <th>Nom & Prénom</th>
        <th>Nationalité</th>
        <th>Résultat</th>
        <th>Rang</th>
    </tr>
    </thead>
    <?php
        foreach ($etudiants as $etudiant)
        {
            echo "<tr><td>{$etudiant->id}</td>
                      <td>{$etudiant->num}</td>
                      <td>{$etudiant->cin}</td>
                      <td>".ucwords(strtolower($etudiant->nom))."</td>
                      <td>".ucfirst(strtolower($etudiant->nationalite))."</td>
                      <td>".round($etudiant->moyenne,2)."</td>
                      <td>{$etudiant->rang}</td>
                      </tr>";
        }
    ?>
</table>
<?php
    echo $links;?>




</div>
</div>
</div>

<script src=<?=js_url("jquery")?>></script>
<script src=<?=js_url("bootstrap.min")?>></script>
<script src=<?=js_url("bootstrap-switch")?>></script>

</body>
</body>
</html>