<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-pills nav-stacked">
                <li><a href=<?=base_url("admin/ajout/");?>>Nouveau Article</a></li>
                <li><a href=<?=base_url("admin/modifier/");?>>Modifier Article</a></li>
                <li><a href=<?=base_url("admin/media")?>>Gérer Media</a></li>
                <li><a href=<?=base_url("admin/etudiant/");?>>Liste Etudiant</a></li>
                <li class="active"><a href=<?=base_url("admin/user/")?>>Ajouter Utilisateur</a></li>
                <li><a href=<?=base_url("admin/chercher/")?>>Chercher Etudiant</a></li>
                <li><a href=<?=base_url("admin/choix/")?>>List des choix</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-5 col-md-offset-2 main">
            <h1 class="page-header">Gérer les periodes</h1>
            <div class="col-sm-10 col-sm-offset-2">
                <div class="well">
                    <h2>Periode des résultats :</h2> <input type="checkbox" id="res">
                    <h2>Periode des choix :</h2> <input type="checkbox" id="choix">
                </div>
            </div>
        </div>
    </div>
</div>
<script src=<?=js_url("jquery")?>></script>
<script src=<?=js_url("bootstrap.min")?>></script>
<script src=<?=js_url("bootstrap-switch")?>></script>
<script>
    $("input[type=checkbox]").bootstrapSwitch({
         size : 'large',
        offText : 'Fermer',
        onText : 'Ouverte',
        onColor : 'success'
        });

</script>
</body>
</html>