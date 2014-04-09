
<form class="form" role="form" action='<?php echo base_url(); ?>admin/update' method='post'>
    <div class="col-md-6">
        <input type="hidden" name="id" value=<?=$article[0]->id?>>
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" name="titre" id="titre" value="<?=$article[0]->titre;?>">
        </div>

        <div class="form-group">
            <label for="alias">Alias</label>
            <input type="text" class="form-control" name="alias" id="alias" value=<?=$article[0]->alias;?>>
        </div>

        <!--->
        <div class="form-group">
            <label for="pb">Publier</label><br>
            <?php
                if ($article[0]->etat==1)
                    echo "<input type='checkbox' name='etat' value='1' id='pb' checked>";
                else
                    echo "<input type='checkbox' name='etat' value='1' id='pb'>";
            ?>
        </div>

        <!---->

        <div class="form-group">
            <label for="pb_par">Publier par</label>
            <input type="text" class="form-control" name="pb_par" disabled value=<?=$_SESSION['name'];?>>
        </div>
        <input type="submit" class="btn btn-primary" value="Envoyer">
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="contenu">Contenu</label>
            <textarea cols="8" rows="10" class="form-control" name="contenu" id="contenu"><?=$article[0]->contenu;?></textarea>
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