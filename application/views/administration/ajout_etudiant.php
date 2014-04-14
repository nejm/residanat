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
                        <label for="cin">CIN</label>
                        <input type="number" class="form-control" name="cin" id="cin">
                    </div>

                    <div class="form-group">
                        <label for="conv">CIN</label>
                        <input type="number" class="form-control" name="conv" id="conv">
                    </div>

                    <div class="form-group">
                        <label for="nom">Nom & Prénom</label>
                        <input type="text" class="form-control" name="nom" id="nom">
                    </div>

                    <div class="form-group">
                        <label for="nationalite">Nationalité</label>
                        <input type="text" class="form-control" name="nationalite" id="nationalite">
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