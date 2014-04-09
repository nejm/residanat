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
                 <input type="checkbox" name="pb" id="pb">
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
                <textarea cols="8" rows="10" class="form-control" name="contenu" id="contenu"></textarea>
            </div>
        </div>
    </form>
<?=validation_errors();?>

