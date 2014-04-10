<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href=<?=base_url("admin/ajout/");?>>Nouveau Article</a></li>
                <li><a href=<?=base_url("admin/modifier/");?>>Modifier Article</a></li>
                <li><a href=<?=base_url("admin/media")?>>Gérer Media</a></li>
                <li><a href=<?=base_url("admin/choix/");?>>Consulter Choix</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Dashboard</h1>
<form class="form" role="form" action='<?php echo base_url(); ?>admin/ajout' method='post'>
        <div class="col-md-6">
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" name="titre" id="titre">
            </div>

            <div class="form-group">
                <label for="alias">Alias</label>
                <input type="text" class="form-control" name="alias" id="alias">
            </div>

            <!--->
            <div class="form-group">
                 <label for="alias">Publier</label><br>
                 <input type="checkbox" name="pb" value="1" id="pb">
            </div>

            <!---->

            <div class="form-group">
                <label for="pb_par">Publier par</label>
                <input type="text" class="form-control" name="pb_par" disabled value=<?=$_SESSION['name'];?>>
            </div>
             <input type="submit" class="btn btn-info" value="Envoyer">
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="contenu">Contenu</label>
                <textarea cols="8" rows="10" class="form-control" name="contenu" id="contenu"></textarea>
            </div>
        </div>
    </form>
<?=validation_errors();?>
</div>
</div>
</div>

<script src=<?=js_url("jquery")?>></script>
<script src=<?=js_url("bootstrap.min")?>></script>
<script src=<?=js_url("bootstrap-switch")?>></script>


<script type="text/javascript">
    $("#pb").bootstrapSwitch();
</script>

</body>
</body>
</html>