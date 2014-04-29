<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-pills nav-stacked">
                <li><a href=<?=base_url("admin/ajout/");?>>Nouveau Article</a></li>
                <li class="active"><a href=<?=base_url("admin/modifier/");?>>Modifier Article</a></li>
                <li><a href=<?=base_url("admin/media");?>>Gérer Media</a></li>
                <li><a href=<?=base_url("admin/choix/");?>>Liste Etudiant</a></li>
                <li><a href=<?=base_url("admin/etudiant/")?>>Ajouter Etudiant</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Modifier un article</h1>
            <form class="form" role="form" action='<?php echo base_url(); ?>admin/update' method='post'>
                <div class="col-md-6">
                    <input type="hidden" name="id" value=<?=$article[0]->id?>>
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" class="form-control" name="titre" id="titre" value="<?=$article[0]->titre;?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="alias">Alias</label>
                        <input type="text" class="form-control" name="alias" id="alias" value=<?=$article[0]->alias;?>>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pb">Publier</label><br>
                        <?php
                            if ($article[0]->etat==1)
                                echo "<input type='checkbox' name='etat' value='1' id='pb' checked>";
                            else
                                echo "<input type='checkbox' name='etat' value='1' id='pb'>";
                        ?>
                    </div>
                </div>

                    <!---->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pb_par">Publier par</label>
                        <input type="text" class="form-control" name="pb_par" disabled value=<?=$_SESSION['name'];?>>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="contenu">Contenu</label>
                        <textarea cols="8" rows="10" class="form-control" name="contenu" id="contenu"><?=$article[0]->contenu;?></textarea>
                    </div>
                <input type="submit" class="btn btn-primary" value="Envoyer">
            </form>
<?=validation_errors();?>
</div>
</div>
</div>
<?php
$data = "";
foreach ($imgs as $i)
{

    $data.= "{title: '".$i['nom']."', ";
    $data.= "value: '".$i['real']."'},";
}
substr($data,0,-1);
?>
<script src=<?=js_url("jquery")?>></script>
<script src=<?=js_url("bootstrap.min")?>></script>
<script src=<?=js_url("bootstrap-switch")?>></script>
<script src=<?=js_url("tinymce/tinymce.min")?>></script>
<script type="text/javascript">
    tinymce.init({
        convert_urls : false,
        selector: "textarea",
        theme: "modern",
        plugins: [
            "advlist autolink link image lists charmap print preview hr",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor"
        ],
        document_root:'http://localhost/residanat/assets/img/',
        image_list: [
            <?=$data?>
        ]
    });
    $("#pb").bootstrapSwitch();
</script>

</body>
</html>