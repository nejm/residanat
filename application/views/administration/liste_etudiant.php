<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-pills nav-stacked">
                <li><a href=<?=base_url("admin/ajout/");?>>Nouveau Article</a></li>
                <li><a href=<?=base_url("admin/modifier/");?>>Modifier Article</a></li>
                <li><a href=<?=base_url("admin/media")?>>Gérer Media</a></li>
                <li class="active"><a href=<?=base_url("admin/choix/");?>>Liste Etudiant</a></li>
                <li><a href=<?=base_url("admin/user/")?>>Ajouter Utilisateur</a></li>
                <li><a href=<?=base_url("admin/etudiant/")?>>Chercher Etudiant</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Liste des étudiants</h1>
            <div class="">
            <a href='<?=base_url("admin/exporter")?>' class="btn btn-default" target="_blank" id="export">Exporter la liste des étudiants</a>
            </div>
            <hr />
            <table class="table table-bordered table-hover" id="tableau_filtre">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Num</th>
                    <th>CIN</th>
                    <th>Nom & Prénom</th>
                    <th>Nationalité</th>
                    <th>Moyenne</th>
                    <th>Résultat</th>
                    <th>Rang</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($etudiants as $etudiant)
                    {
                        echo "<tr><td>{$etudiant->id_res}</td>
                                  <td>{$etudiant->num}</td>
                                  <td>{$etudiant->cin}</td>
                                  <td>".ucwords(strtolower($etudiant->nom))."</td>
                                  <td>".ucfirst(strtolower($etudiant->nationalite))."</td>
                                  <td>".round($etudiant->moyenne,2)."</td>
                                  <td>{$etudiant->resultat}</td>
                                  <td>{$etudiant->rang}</td></tr>";


                    }
                ?>
                </tbody>
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
</html>